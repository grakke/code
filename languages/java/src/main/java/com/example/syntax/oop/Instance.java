package com.example.syntax.oop;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

public class Instance {

    public static void main(String[] args) {
        Person student = new Student();
        Person teacher = new Teacher();
        student.run();
        teacher.run();
        System.out.printf(String.valueOf(Person.number));

        Outer outer = new Outer("Nested"); // 实例化一个Outer
        Outer.Inner inner = outer.new Inner(); // 实例化一个Inner
        inner.hello();
    }
}
