package main

import (
	"fmt"
	"runtime"
	"sync"
)

func printTrace(id uint64, name, arrow string, indent int) {
    indents := ""
    for i := 0; i < indent; i++ {
        indents += "    "
    }
    fmt.Printf("g[%05d]:%s%s%s\n", id, indents, arrow, name)
}

var mu sync.Mutex
var m = make(map[uint64]int)

func Trace() func() {
    pc, _, _, ok := runtime.Caller(1)
    if !ok {
        panic("not found caller")
    }
	fn := runtime.FuncForPC(pc)
    name := fn.Name()
    gid := curGoroutineID()

    mu.Lock()
    indents := m[gid]    // 获取当前gid对应的缩进层次
    m[gid] = indents + 1 // 缩进层次+1后存入map
    mu.Unlock()
    printTrace(gid, name, "->", indents+1)
    return func() {
        mu.Lock()
        indents := m[gid]    // 获取当前gid对应的缩进层次
        m[gid] = indents - 1 // 缩进层次-1后存入map
        mu.Unlock()
        printTrace(gid, name, "<-", indents)
    }
}