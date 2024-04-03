import pytest
import unittest


def f():
    raise SystemExit(1)


class TestClass(unittest.TestCase):
    def test_one(self):
        x = "this"
        assert "h" in x

    def test_two(self):
        x = "hello"
        assert hasattr(x, "__len__")

    def test_my_test(self):
        with pytest.raises(SystemExit):
            f()

    @pytest.mark.skip
    def test_min(self):
        values = (2, 3, 1, 4, 6)
        assert min(values) == 1


if __name__ == 'main':
    unittest.main()
