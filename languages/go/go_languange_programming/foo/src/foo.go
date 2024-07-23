package src

// Foo compares the two input values and returns the larger // value. If the two values are equal, returns 0.
func Foo(a, b int) (ret int, err error) {
	if a > b {
		return a, nil
	} else {
		return b, nil
	}
	return 0, nil
}

// BUG(jack): #1: I'm sorry but this code has an issue to be solved.
// BUG(tom): #2: An issue assigned to another person.
