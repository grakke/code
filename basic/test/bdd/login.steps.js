const { Given, When, Then } = require('@cucumber/cucumber');
const { expect } = require('chai');

Given('我在登录页面', function () {
    this.browser.visit('/login');
});

When('我输入用户名 {string}', function (username) {
    this.browser.fill('email', username);
});

When('我输入密码 {string}', function (password) {
    this.browser.fill('password', password);
});

When('我点击登录按钮', function () {
    this.browser.click('button[type="submit"]');
});

Then('我应该看到仪表板页面', function () {
    expect(this.browser.location.pathname).to.equal('/dashboard');
});

Then('我应该看到欢迎消息 {string}', function (message) {
    expect(this.browser.text('.welcome-message')).to.include(message);
});
