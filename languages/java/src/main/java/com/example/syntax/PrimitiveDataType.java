package com.example.syntax;

import java.util.List;

public class PrimitiveDataType {
    public static void main(String[] args) {

        // primary data type  基本数据
        byte byteVar = 127;
        System.out.println(byteVar);
        short shortVar = 30000;
        System.out.println(shortVar);

        int intVar = 3000000;
        System.out.println(intVar);

        int n1 = Integer.parseInt("123"); // 123
        int n2 = Integer.parseInt("ff", 16); // 按十六进制转换，255


        int i = 2147483647;
        int i2 = -2147483648;
        int i3 = 2_000_000_000; // 加下划线更容易识别
        int i4 = 0xff0000; // 十六进制表示的16711680
        int i5 = 0b1000000000; // 二进制表示的512
        long l = 9000000000000000000L; // long型的结尾需要加L
        System.out.println(l);

        float floatVar = 4444444444444444444.44444444444444444444444444f;
        float f1 = 3.14f;
        float f2 = 3.14e38f; // 科学计数法表示的3.14x10^38
        System.out.println(floatVar);

        double d = 1.79e308;
        double d2 = -1.79e308;
        double d3 = 4.9e-324; // 科学计数法表示的4.9x10^-324
        double doubleVar = 4444444444444444444.44444444444444444444444444;
        System.out.println(doubleVar);

        // bool
        boolean condition = true;
        boolean fCondition = false;
        System.out.println(condition);
        System.out.println(fCondition);
        boolean b1 = Boolean.parseBoolean("true"); // true
        boolean b2 = Boolean.parseBoolean("FALSE"); // false

        // 2个byte 转换int
        char charVar = 'a';
        char a = 'A';
        char zh = '中';
        System.out.println(a);
        System.out.println(zh);
        System.out.println(charVar);
        System.out.println(charVar + 10);
        System.out.println((char) 98);

        int num = '\u4564';

        for (i = 0; i < 26; i++) {
            System.out.println(num + ":\t" + (char) num++);
        }

        int  A = 0b00111100;
        System.out.println(A << 2); // 240，即 1111 0000
        System.out.println(A >> 2); // 15 1111
        System.out.println(A>>>2); // 15 即 0000 1111
    }
}
