import unittest
from parameterized import parameterized, param

from calculator import Calculator


class TestCalculator(unittest.TestCase):
    def setup_func():
        "set up test fixtures"

    def teardown_func():
        "tear down test fixtures"

    def test_add(self):
        c = Calculator()
        result = c.add(3, 5)
        assert result == 8

    def test_sub(self):
        c = Calculator()
        result = c.sub(10, 5)
        assert result == 5

    def test_mul(self):
        c = Calculator()
        result = c.mul(5, 7)
        assert result == 35

    def test_div(self):
        c = Calculator()
        result = c.div(10, 5)
        assert result == 2

    @parameterized.expand([
        param(3, 5, 8),
        param(1, 2, 3),
        param(2, 2, 4)
    ])
    def test_add_with_params(self, num1, num2, total):
        c = Calculator()
        result = c.add(num1, num2)
        assert result == total


if __name__ == '__main__':
    unittest.main()
