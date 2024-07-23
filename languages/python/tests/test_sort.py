import unittest

# 编写子类继承unittest.TestCase
from algorithms.sort.bubble import bubble_sort


class TestSort(unittest.TestCase):

    # 以test开头的函数将会被测试
    def test_sort(self):
        arr = [3, 4, 1, 5, 6]
        bubble_sort(arr)
        # assert 结果跟我们期待的一样
        self.assertEqual(arr, [1, 3, 4, 5, 6])


if __name__ == '__main__':
    # Jupyter下，请用如下方式运行单元测试
    unittest.main(argv=['first-arg-is-ignored'], exit=False)
    unittest.main(argv=['first-arg-is-ignored'], exit=False)
