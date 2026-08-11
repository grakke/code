import unittest
from unittest.mock import patch
# from algorithms.sort.bubble import bubble_sort


def sort(arr):
    # 将要被测试的排序函数
    length = len(arr)
    for i in range(0, length):
        for j in range(i + 1, length):
            if arr[i] >= arr[j]:
                tmp = arr[i]
                arr[i] = arr[j]
                arr[j] = tmp


class TestSort(unittest.TestCase):

    # 以test开头的函数将会被测试
    def test_sort(self):
        arr = [3, 4, 1, 5, 6]
        sort(arr)
        self.assertEqual(arr, [1, 3, 4, 5, 6])

    @patch('sort')
    def test_sort1(self, mock_sort):
        arr = [3, 4, 1, 5, 6]
        mock_sort(arr)
        self.assertEqual(arr, [1, 3, 4, 5, 6])


if __name__ == '__main__':
    # Jupyter下运行单元测试
    unittest.main(argv=['first-arg-is-ignored'], exit=False)

    # 命令行下运行
    # unittest.main()
