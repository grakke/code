package com.example.math;

import java.util.Arrays;

public class MergeSort {


    /**
     * @param to_sort-等待排序的数组
     * @return int[]-排序后的数组
     * @Description: 使用函数的递归（嵌套）调用，实现归并排序（从小到大）
     */

    public static int[] merge_sort(int[] to_sort) {

        if (to_sort == null) return new int[0];

        // 如果分解到只剩一个数，返回该数
        if (to_sort.length == 1) return to_sort;

        // 将数组分解成左右两半
        int mid = to_sort.length / 2;
        int[] left = Arrays.copyOfRange(to_sort, 0, mid);
        int[] right = Arrays.copyOfRange(to_sort, mid, to_sort.length);

        // 嵌套调用，对两半分别进行排序
        left = merge_sort(left);
        right = merge_sort(right);

        // 合并排序后的两半
        return merge(left, right);

    }

    private static int[] merge(int[] left, int[] right) {
        if (left == null) left = new int[0];
        if (right == null) right = new int[0];

        int[] merged = new int[left.length + right.length];
        int lefti = 0, righti = 0, mi = 0;

        while (lefti < left.length && righti < right.length) {
            if (left[lefti] <= right[righti]) {
                merged[mi] = left[lefti];
                lefti++;
            } else {
                merged[mi] = right[righti];
                righti++;
            }
            mi++;
        }

        while (lefti < left.length) {
            merged[mi] = left[lefti];
            lefti++;
            mi++;
        }

        while (righti < right.length) {
            merged[mi] = right[righti];
            righti++;
            mi++;
        }

        return merged;
    }

    public static void main(String[] args) {
        int[] sorted = merge_sort(new int[]{7, 6, 2, 4, 1, 9, 3, 8, 0, 5});
        for (int j : sorted) {
            System.out.println(j);
        }
    }
}
