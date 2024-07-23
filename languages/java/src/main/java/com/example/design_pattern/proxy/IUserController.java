package com.example.design_pattern.proxy;


public interface IUserController {
    UserVo login(String telephone, String password);
    UserVo register(String telephone, String password);
}


