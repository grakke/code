package com.example.syntax.oop;

abstract class Person implements Gender {
    int speed;
    public String name;
    public int age;
    // 定义静态字段number:
    public static int number;

    public Person(String name, int age) {
        this.name = name;
        this.age = age;
        number++;
    }

    public Person() {
        this.name = "Henry";
        this.age = 36;
        number++;
    }

    public static void setNumber(int value) {
        number = value;
    }

    public abstract void run();
}
