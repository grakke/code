package main

import (
	"fmt"
	"io"
	"time"
)

type Sleeper interface {
	Sleep()
}

func (o *ConfigurableSleeper) Sleep() {
	time.Sleep(o.duration)
}

func Countdown(out io.Writer, sleeper Sleeper) {
	finalWord := "GO!"
	countdownStart := 3

	for i := countdownStart; i > 0; i-- {
		sleeper.Sleep()
		fmt.Fprintln(out, i)
	}

	sleeper.Sleep()
	fmt.Fprint(out, finalWord)
}
