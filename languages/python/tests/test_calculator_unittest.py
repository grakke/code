# -*- coding: utf-8 -*-
# __author__ = 'henry'
import unittest
from unittest import mock
from unittest.mock import MagicMock
from ddt import data, unpack, ddt
from parameterized import parameterized, param

from syntax.calculator import Calculator


def multiple(a, b):
    # 被调用函数

    return a * b


def is_error(a, b):
    # 实际调用函数
    try:
        return multiple(a, b)
    except Exception as e:
        return -1


@ddt
class TestCalculator(unittest.TestCase):

    def test_add(self):
        c = Calculator()
        self.assertEqual(c.add(3, 5), 8)

    @parameterized.expand([
        param(3, 5, 8),
        param(1, 2, 3),
        param(2, 3, 5)
    ])
    def test_add_with_parameterized(self, num1, num2, total):
        c = Calculator()
        self.assertEqual(c.add(num1, num2), total)

    @data((3, 5, 8), (1, 2, 3), (2, 2, 4))
    @unpack
    def test_add_with_ddt(self, num1, num2, total):
        c = Calculator()
        self.assertEqual(c.add(num1, num2), total)

    def test_sub(self):
        c = Calculator()
        self.assertEqual(c.sub(10, 6), 4)

    def test_mul(self):
        c = Calculator()
        self.assertEqual(c.mul(4, 5), 20)

    def test_div(self):
        c = Calculator()
        self.assertEqual(c.div(84, 12), 7)

    @mock.patch('test_calculator_unittest.multiple')
    def test_function_multiple(self, mock_multiple):
        mock_return = 1
        mock_multiple.return_value = mock_return

        result = multiple(3, 5)

        self.assertEqual(result, mock_return)

    @mock.patch.object(Calculator, 'add')
    def test_add_with_annotation(self, mock_add):
        c = Calculator()
        mock_return = 10
        mock_add.return_value = mock_return

        result = c.add(3, 5)

        self.assertEqual(result, mock_return)

    @mock.patch.object(Calculator, 'add')
    def test_add_with_different_return(self, mock_add):
        c = Calculator()
        mock_return = [10, 8]
        mock_add.side_effect = mock_return

        result1 = c.add(3, 5)
        result2 = c.add(3, 5)

        self.assertEqual(result1, mock_return[0])
        self.assertEqual(result2, mock_return[1])

    @mock.patch('test_calculator_unittest.multiple')
    def test_function_multiple_exception(self, mock_multiple):
        mock_multiple.side_effect = Exception

        result = is_error(3, 5)

        self.assertEqual(result, -1)

    @mock.patch.object(Calculator, 'add')
    @mock.patch('test_calculator_unittest.multiple')
    def test_both(self, mock_multiple, mock_add):
        c = Calculator()
        mock_add.return_value = 1
        mock_multiple.return_value = 2

        self.assertEqual(c.add(3, 5), 1)
        self.assertEqual(multiple(3, 5), 2)

    def test_magic_mock(self):
        a = Calculator()
        a.m2 = MagicMock(return_value="custom_val")
        a.m3 = MagicMock()
        a.m1()
        self.assertTrue(a.m2.called)  # 验证m2被call过
        a.m3.assert_called_with("custom_val")  # 验证m3被指定参数call过

    def side_effect(arg):
        if arg < 0:
            return 1
        else:
            return 2

    @unittest.skip("需要修复...")
    def test_magic_mock_side_effect(self):
        mock = mock()
        mock.side_effect = self.side_effect
        self.assertEqual(mock(-1), 1)
        self.assertEqual(mock(1), 2)


if __name__ == '__main__':
    unittest.main()
