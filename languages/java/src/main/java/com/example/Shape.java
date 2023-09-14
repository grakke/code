package com.example;

public class Shape {

    int sides;

    public Shape(int i) {
        sides = i;
    }

    public int numberOfSides() {
        return sides;
    }

    public String description() {
        return "Square";
    }
}
