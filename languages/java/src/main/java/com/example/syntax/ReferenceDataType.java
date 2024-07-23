package com.example.syntax;

import java.util.Arrays;
import java.util.List;
import java.util.StringJoiner;

public class ReferenceDataType {
    public static void main(String[] args) {
        // 引用类型
        String s = "Hello";
        System.out.println(s);
        s = s.toUpperCase();
        System.out.println(s);
        String s1 = "hello";
        System.out.println(s.equals(s1));
        "Hello".contains("ll");
        "Hello".indexOf("l"); // 2
        "Hello".lastIndexOf("l"); // 3
        "Hello".startsWith("He"); // true
        "Hello".endsWith("lo");
        "Hello".substring(2); // "llo"
        "Hello".substring(2, 4);
        "  \tHello\r\n ".trim();

        "\u3000Hello\u3000".strip(); // "Hello"
        " Hello ".stripLeading(); // "Hello "
        " Hello ".stripTrailing(); // " Hello"

        "".isEmpty(); // true，因为字符串长度为0
        "  ".isEmpty(); // false，因为字符串长度不为0
        "  \n".isBlank(); // true，因为只包含空白字符
        " Hello ".isBlank(); // false，因为包含非空白字符

        s = "hello";
        s.replace('l', 'w'); // "hewwo"，所有字符'l'被替换为'w'
        s.replace("ll", "~~"); // "he~~o"，所有子串"ll"被替换为"~~"

        s = "A,B,C,D";
        String[] ss = s.split("\\,"); // {"A", "B", "C", "D"}

        String[] arr = {"A", "B", "C"};
        s = String.join("***", arr); // "A***B***C"

        s = "Hi %s, your score is %d!";
        System.out.println(s.formatted("Alice", 80));
        System.out.println(String.format("Hi %s, your score is %.2f!", "Bob", 59.5));

        int[] intArray = new int[9];
        double[][] doubleArray = new double[100][20];
        System.out.println(intArray[2]);
        System.out.println(doubleArray[20][10]);

        String.valueOf(123); // "123"
        String.valueOf(45.67); // "45.67"
        String.valueOf(true); // "true"
        String.valueOf(new Object()); // 类似java.lang.Object@636be97c

        char[] cs = "Hello".toCharArray(); // String -> char[]
        s = new String(cs);
        System.out.println(s);
        cs[0] = 'X';
        System.out.println(s);

//        byte[] b2 = "Hello".getBytes("UTF-8"); // 按UTF-8编码转换
//        byte[] b2 = "Hello".getBytes("GBK"); // 按GBK编码转换
//        byte[] b3 = "Hello".getBytes(StandardCharsets.UTF_8); // 按UTF-8编码转换

        var sb = new StringBuilder(1024);
        sb.append("Mr ").append("Bob").append("!").insert(0, "Hello, ");
        System.out.println(sb.toString());

        String[] names = {"Bob", "Alice", "Grace"};
        var sj = new StringJoiner(", ");
        for (String name : names) {
            sj.add(name);
        }
        System.out.println(sj.toString());

        // List lst = new List {
        //     3, 5, 6, 8
        // }

        int[] array = {1, 2, 3, 4, 5};
        for (int i = 0; i < array.length; i++) {
            System.out.println(array[i]);
        }
        for (int a : array)
            System.out.println(a);

        System.out.println(Arrays.toString(array));


        // 说明：System.out.println(array);这样是不行的，这样打印是的是数组的首地址。


        // 二维数组：
        int[][] magicSquare = {{16, 3, 2, 13}, {5, 10, 11, 8}, {9, 6, 7, 3}};

        // Java实际没有多维数组，只有一维数组，多维数组被解读为"数组的数组"，例如二维数组magicSquare是包含{magicSquare[0]，magicSquare[1]，magicSquare[2]}三个元素的一维数组，magicSqure[0]是包含{16,3,2,13}四个元素的一维数组，同理magicSquare[1]，magicSquare[2]也一样。
        for (int i = 0; i < magicSquare.length; i++) {
            for (int j = 0; j < magicSquare[i].length; j++) {
                System.out.print(magicSquare[i][j] + " ");
            }
            System.out.println();    //换行
        }

        for (int[] a : magicSquare) {
            for (int b : a) {
                System.out.print(b + " ");
            }
            System.out.println();//换行
        }

        for (int i = 0; i < magicSquare.length; i++)
            System.out.println(Arrays.toString(magicSquare[i]));
    }
}
