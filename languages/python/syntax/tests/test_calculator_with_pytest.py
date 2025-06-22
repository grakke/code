import pytest

from syntax.calculator import Calculator


@pytest.fixture()
def set_up():
    print("[pytest with fixture] start")
    yield
    print("[pytest with fixture] end")


class TestCalculator():
    @pytest.mark.parametrize("num1, num2, total", [(3, 5, 8), (1, 2, 3), (2, 2, 4)])
    def test_add(self, num1, num2, total):
        c = Calculator()
        result = c.add(num1, num2)
        assert result == total

    @pytest.mark.parametrize("num1, num2, total", [
        # pytest.param(5, 1, 4, marks=pytest.mark.passed),
        # pytest.param(5, 2, 4, marks=pytest.mark.fail),
        (5, 4, 1)
    ])
    def test_sub(self, num1, num2, total):
        c = Calculator()
        result = c.sub(num1, num2)
        assert result == total

    def test_mul(self):
        c = Calculator()
        result = c.mul(5, 7)
        assert result == 35

    def test_div(self):
        c = Calculator()
        result = c.div(10, 5)
        assert result == 2

    # @pytest.mark.flaky(reruns=5)
    # def test_example():
    #     import random
    #     assert random.choice([True, False, False])


if __name__ == '__main__':
    pytest.main(['-s', 'test_calculator_with_pytest.py'])
