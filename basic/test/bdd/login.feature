Feature: 用户登录功能

  Scenario: 有效凭据登录
    Given 我在登录页面
    When 我输入用户名 "john@example.com"
    And 我输入密码 "password123"
    And 我点击登录按钮
    Then 我应该看到仪表板页面
    And 我应该看到欢迎消息 "欢迎，John！"