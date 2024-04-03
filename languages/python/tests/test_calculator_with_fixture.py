# -*- coding: utf-8 -*-
# __author__ = 'henry'
import unittest

from syntax.calculator import Calculator


class TestCalculatorWithFixture(unittest.TestCase):
    # 测试用例前置动作
    def setUp(self):
        print("test start")
        yield

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

    @unittest.mock.patch('syntax.calculator')
    def test_calculator_div(self, MockMyObject):
        obj = MockMyObject()
        obj.div.return_value = 42

        assert obj.div() == 42
        obj.div.assert_called_once()


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
    runner = unittest.TestRunner()
    runner.run(suit)
