#!/bin/zsh

#--------------------------------------------
#
# author：菜鸟教程
# site：www.runoob.com
# slogan：学的不仅是技术，更是梦想！
#--------------------------------------------
##### 用户配置区 开始 #####
#
#
#
#
#
##### 用户配置区 结束  #####

echo "Shell 传递参数实例！"

echo "参数个数：$#"
echo "执行的文件名：$0"
echo "第一个参数为：$1"
echo "第二个参数为：$2"
echo "第三个参数为：$3"

echo "一个单字符串显示所有向脚本传递的参数：$*"
echo "脚本运行的当前进程ID号：$$"
echo "后台运行的最后一个进程的ID号:$$"
echo "后台运行的最后一个进程的ID号:$@"
echo "显示最后命令的退出状态:$?"

echo "-- \$* 演示 ---"
for i in "$*"; do
    echo $i
done

echo "-- \$@ 演示 ---"
for i in "$@"; do
    echo $i
done
