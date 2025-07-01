Feature: 计算器功能

  Scenario: 两数相加
    Given 我有一个计算器
    When 我计算 5 + 3
    Then 结果应该是 8