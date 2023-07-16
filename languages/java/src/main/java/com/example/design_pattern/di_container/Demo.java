package com.example.design_pattern.di_container;


public class Demo {
    public static void main(String[] args) {
        ApplicationContext applicationContext = new ClassPathXmlApplicationContext(
                "beans.xml");
        // RateLimiter rateLimiter = (RateLimiter) applicationContext.getBean("rateLimiter");
        // rateLimiter.test();
        //...
    }
}
