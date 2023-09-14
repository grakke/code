package com.example.math;


public class Induction {

    static class Result {
        public long wheatNum = 0;  // 当前格的麦粒数
        public long wheatTotalNum = 0;  // 目前为止麦粒的总数
    }

    /**
     * 迭代实现
     *
     * @param grid-放到第几格
     * @return long-麦粒的总数
     * @Description: 算算舍罕王给了多少粒麦子
     */
    public static long getNumberOfWheat(int grid) {

        long sum = 0;      // 麦粒总数
        long numberOfWheatInGrid = 0;  // 当前格子里麦粒的数量

        numberOfWheatInGrid = 1;  // 第一个格子里麦粒的数量
        sum += numberOfWheatInGrid;

        for (int i = 2; i <= grid; i++) {
            numberOfWheatInGrid *= 2;   // 当前格子里麦粒的数量是前一格的2倍
            sum += numberOfWheatInGrid;   // 累计麦粒总数
        }

        return sum;
    }


    /**
     * 用递归编程体现数学归纳法
     *
     * @param k-放到第几格，result-保存当前格子的麦粒数和麦粒总数
     * @return boolean-放到第k格时是否成立
     * @Description: 使用函数的递归（嵌套）调用，进行数学归纳法证明
     */
    public static boolean prove(int k, Result result) {

        // 证明n = 1时，命题是否成立
        if (k == 1) {
            if ((Math.pow(2, 1) - 1) == 1) {
                result.wheatNum = 1;
                result.wheatTotalNum = 1;
                return true;
            } else return false;
        }
        // 如果n = (k-1)时命题成立，证明n = k时命题是否成立
        else {
            boolean proveOfPreviousOne = prove(k - 1, result);
            result.wheatNum *= 2;
            result.wheatTotalNum += result.wheatNum;
            boolean proveOfCurrentOne = result.wheatTotalNum == (Math.pow(2, k) - 1);

            return proveOfPreviousOne && proveOfCurrentOne;
        }

    }

    public static void main(String[] args) {
        int grid = 63;
        Result result = new Result();
        System.out.println(prove(grid, result));


        long start, end = 0;
        start = System.currentTimeMillis();
        System.out.printf("舍罕王给了这么多粒：%d%n", Induction.getNumberOfWheat(grid));
        end = System.currentTimeMillis();
        System.out.printf("耗时%d毫秒%n", (end - start));

        start = System.currentTimeMillis();
        System.out.printf("舍罕王给了这么多粒：%d%n", (long) (Math.pow(2, grid)) - 1);
        end = System.currentTimeMillis();
        System.out.printf("耗时%d毫秒%n", (end - start));
    }
}
