package algorithms

import "testing"

func TestQuickSort(t *testing.T) {
	type args struct {
		values []int
	}
	tests := []struct {
		name string
		args args
	}{
		// TODO: Add test cases.
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			QuickSort(tt.args.values)
		})
	}
}

func TestQuickSort1(t *testing.T) {
	values := []int{5, 4, 3, 2, 1}
	QuickSort(values)
	if values[0] != 1 || values[1] != 2 || values[2] != 3 || values[3] != 4 ||
		values[4] != 5 {
		t.Error("QuickSort() failed. Got", values, "Expected 1 2 3 4 5")
	}
}

func TestQuickSort2(t *testing.T) {
	values := []int{5, 5, 3, 2, 1}
	QuickSort(values)
	if values[0] != 1 || values[1] != 2 || values[2] != 3 || values[3] != 5 ||
		values[4] != 5 {
		t.Error("QuickSort() failed. Got", values, "Expected 1 2 3 5 5")
	}
}

func TestQuickSort3(t *testing.T) {
	values := []int{5}
	QuickSort(values)
	if values[0] != 5 {
		t.Error("QuickSort() failed. Got", values, "Expected 5")
	}
}
