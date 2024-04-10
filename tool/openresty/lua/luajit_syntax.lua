print("hello world")

print(type("hello world"))
print(type(print))
print(type(true))
print(type(360.0))
print(type({}))
print(type(nil))

print([[string has \n and \r]])

print([=[ string has a [[]]. ]=])

local a = 0
if a then
    print("true")
end
a = ""
if a then
    print("true")
end

print(9223372036854775807LL - 1)

local color = {first = "red", "blue", third = "green", "yellow"}
print(color["first"]) --> output: red
print(color[1]) --> output: blue
print(color["third"]) --> output: green
print(color[2]) --> output: yellow
print(color[3]) --> output: nil
table.remove(color, 1)
color.third = nil
for k, v in ipairs(color) do
    print(k)
end

local t = { 1, 2, 3 }
print(table.getn(t))
print(#t)

local t1 = { 1, 2, 3 }
print("Test1 " .. table.getn(t1))
local t2 = { 1, a = 2, 3 }
print("Test2 " .. table.getn(t2))
local t3 = { 1, nil }
print("Test3 " .. table.getn(t3))
local t4 = { 1, nil, 2 }
print("Test4 " .. table.getn(t4))

print(string.byte("abc", 1, 3))
print(string.byte("abc", 3)) -- 缺少第三个参数，第三个参数默认与第二个相同，此时为 3
print(string.byte("abc"))

local a = {"A", "b", "C"}
print(table.concat(a))

math.randomseed (os.time())
print(math.random())
print(math.random(100))
print(math.random(30, 100))

local _, end_pos = string.find("hello", "he") --标准库函数会返回两个值，分别代表开始和结束的下标
print(end_pos)

for _, v in ipairs({4,5,6}) do
    print(v)
end

local ffi = require("ffi")
ffi.cdef[[
int printf(const char *fmt, ...);
]]
ffi.C.printf("Hello %s!", "world")

-- local p = ffi.gc(ffi.C.malloc(5), ffi.C.free)
p = nil -- Last reference to p is gone.
-- GC will eventually run finalizer: ffi.C.free(p)

-- lua-nginx-module 和 lua-resty-core 中都存在的 API，性能测试比较一下两者的差异
-- lua-nginx-module
-- local start = ngx.now();
-- for _ =1, 1000000000 do
--     ngx.encode_base64('123456')
-- end
-- ngx.update_time();
-- ngx.say(ngx.now() - start)

-- lua-resty-core
-- require 'resty.core';
-- local start = ngx.now();
-- for _ =1, 1000000000 do
--     ngx.encode_base64('123456')
-- end
-- ngx.update_time();
-- ngx.say(ngx.now() - start)

local version = { major = 1, minor = 1, patch = 1 }
version = setmetatable(version, {
    __index = function(t, key)
        if key == "patch" then
            return 2
        end
    end,
    __tostring = function(t)
        return string.format("%d.%d.%d", t.major, t.minor, t.patch)
        end
    })
print(tostring(version))

-- local mysql = require "resty.mysql" -- 先引用 lua-resty 库
-- local db, err = mysql:new() -- 新建一个类的实例
-- db:set_timeout(1000) -- 调用类的方法

local tb = {}
tb[1] = {red}
tb[2] = function() print("func") end
setmetatable(tb, {__mode = "v"})
print(#tb) -- 2
collectgarbage()
print(#tb) -- 0

-- 闭包
local function foo()
     local i = 1
     local function bar()
         i = i + 1
         print(i)
     end
     return bar
end

local fn = foo()
print(fn()) -- 2

local foo, bar
local function fn()
     foo = 1
     bar = 2
end