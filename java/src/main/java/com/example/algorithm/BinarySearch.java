package com.example.algorithm;

public class BinarySearch {

    public static int Rank(int key, int[] a) {
        int lo = 0;
        int hi = a.length - 1;

        while (lo <= hi) {
            int mid = lo + (hi - lo) / 2;
            if (key > a[mid]) {
                lo = mid + 1;
            } else if (key < a[mid]) {
                hi = mid - 1;
            } else {
                return mid;
            }
        }

        return -1;
    }

    public static void main(String[] args) {
        int loc = Rank(5, new int[]{1, 2, 3, 4, 5, 8});
        System.out.println(loc);
    }
}
