package com.example.algorithm.sort;

public class Quick {

    public static void sort(int[] arr) {
        int n = arr.length;
        quick_sort_c(arr, 0, n - 1);
    }

    private static void quick_sort_c(int[] arr, int min, int max) {
        if (min >= max) return;

        int q = partition(arr, min, max); // 获取分区点
        quick_sort_c(arr, min, q - 1);
        quick_sort_c(arr, q + 1, max);
    }

    private static int partition(int[] arr, int min, int max) {
        int pivot = arr[max];
        int i = min;

        for (int j = min; j < max; j++) {
            if (arr[j] < pivot) {
                exch(arr, i, j);
                i = i + 1;
            }
        }
        exch(arr, i, max);

        return i;
    }

    private static void exch(int[] a, int i, int j) {
        int swap = a[i];
        a[i] = a[j];
        a[j] = swap;
    }

    public static void main(String[] args) {
        int[] arr = {9, 8, 7, 6, 5, 4, 3, 2, 1};
        Quick.sort(arr);

        for (int j : arr) {
            System.out.println(j);
        }
    }
}
