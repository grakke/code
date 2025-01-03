#!/usr/bin/env python3
# -*- coding: utf-8 -*-

# 一组Python代码的集合
# 代码的可维护性
# 避免函数名和变量名冲突

# Python 中单行注释用#表示，#之后同行字符全部认为被注释。

"""
与之对应的是多行注释
用三个双引号表示，这两段双引号当中的内容都会被视作是注释
"""

# ' a tests module '

__author__ = 'Michael Liao'

import sys


def test():
    args = sys.argv
    if len(args) == 1:
        print('Hello, world!')
    elif len(args) == 2:
        print('Hello, %s!' % args[1])
    else:
        print('Too many arguments!')


if __name__ == '__main__':
    test()
