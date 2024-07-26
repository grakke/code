import unittest

# from algorithms.sort.bubble import bubble_sort

# 将要被测试的排序函数


def sort(arr):
    length = len(arr)
    for i in range(0, length):
        for j in range(i + 1, length):
            if arr[i] >= arr[j]:
                tmp = arr[i]
                arr[i] = arr[j]
                arr[j] = tmp


# 编写子类继承unittest.TestCase
class TestSort(unittest.TestCase):

    # 以test开头的函数将会被测试
    def test_sort(self):
        arr = [3, 4, 1, 5, 6]
        sort(arr)
        # assert 结果跟我们期待的一样
        self.assertEqual(arr, [1, 3, 4, 5, 6])


if __name__ == '__main__':
    # Jupyter下，用如下方式运行单元测试
    unittest.main(argv=['first-arg-is-ignored'], exit=False)

    # 命令行下运行
    # unittest.main()
