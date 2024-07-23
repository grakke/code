package com.example.syntax;

public class Variable {
    public static void main(String[] args) {
        int a = 5;
        int b = 6;

        System.out.println(a * a + b * b * b);
        System.out.println('A');
        System.out.println(a + 1);
        System.out.println(a);

        var sb = new StringBuilder();
        System.out.println(sb);

        // 常量
        final double PI = 3.14; // PI是一个
        double r = 5.0;
        double area = PI * r * r;
    }
}
