# -*- coding: utf-8 -*-
import unittest

from calculator import Calculator


class TestCalculatorWithFixture(unittest.TestCase):
    # 测试用例前置动作
    def setUp(self):
        print("test start")

    # 测试用例后置动作
    def tearDown(self):
        print("test end")

    def test_add(self):
        c = Calculator()
        self.assertEqual(c.add(3, 5), 8)

    def test_sub(self):
        c = Calculator()
        self.assertEqual(c.sub(10, 6), 4)

    def test_mul(self):
        c = Calculator()
        self.assertEqual(c.mul(4, 5), 20)

    def test_div(self):
        c = Calculator()
        self.assertEqual(c.div(84, 12), 7)

    def test_m1(self):
        c = Calculator()
        # m1 依次调用 m2 与 m3，当前实现不抛异常
        self.assertIsNone(c.m1())

    def test_m2(self):
        c = Calculator()
        self.assertIsNone(c.m2())

    def test_m3(self):
        c = Calculator()
        self.assertIsNone(c.m3(5))

    @unittest.mock.patch('calculator.Calculator.div')
    def test_calculator_div(self, mock_div):
        c = Calculator()
        mock_div.return_value = 42

        assert c.div(84, 12) == 42
        mock_div.assert_called_once()


if __name__ == '__main__':
    # 创建测试套件
    suit = unittest.TestSuite()
    suit.addTest(TestCalculatorWithFixture("test_add"))
    suit.addTest(TestCalculatorWithFixture("test_sub"))
    suit.addTest(TestCalculatorWithFixture("test_mul"))
    suit.addTest(TestCalculatorWithFixture("test_div"))

    loader = unittest.TestLoader()
    suit.addTest(loader.loadTestsFromTestCase(TestCalculatorWithFixture))

    # 创建测试运行器
    runner = unittest.TextTestRunner()
    runner.run(suit)
