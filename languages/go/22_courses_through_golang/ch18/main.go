package main

func Fibonacci(n int) int {
	if n < 0 {
		return 0
	}
	if n == 0 {
		return 0
	}
	if n == 1 {
		return 1
	}

	return Fibonacci(n-1) + Fibonacci(n-2)
}

func Fibonacci1(n int) int {
	var cache = map[int]int{}
	if v, ok := cache[n]; ok {
		return v
	}

	result := 0
	switch {
	case n < 0:
		result = 0
	case n == 0:
		result = 0
	case n == 1:
		result = 1
	default:
		result = Fibonacci1(n-1) + Fibonacci1(n-2)
	}
	cache[n] = result

	return result
}
