package com.example.syntax.oop;

public class Student extends Person {

    @Override
    public void run() {
        this.speed = 50;
        System.out.println(this.speed);
    }
}
