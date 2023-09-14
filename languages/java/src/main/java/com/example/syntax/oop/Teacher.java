package com.example.syntax.oop;

public class Teacher extends Person{
    @Override
    public void run() {
        this.speed =100;
        System.out.println(this.speed);
    }
}
