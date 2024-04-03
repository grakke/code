import nose2
import unittest

from syntax.calculator import Calculator
from nose2.tools import params


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

    test_data = [
        {"nums": (3, 5), "total": 8},
        {"nums": (1, 2), "total": 3},
        {"nums": (2, 2), "total": 4}
    ]

    @unittest.skip("需要修复...")
    @params(*test_data)
    def test_add_with_params(data):
        c = Calculator()
        result = c.add(*data['nums'])
        assert result == data['total']


if __name__ == '__main__':
    nose2.main()
