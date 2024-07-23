import numpy as np
from PIL import Image
from dataset.mnist import load_mnist
import sys
import os
sys.path.append(os.pardir)  # 为了导入父目录中的文件而进行的设定


def img_show(img):
    pil_img = Image.fromarray(np.uint8(img))
    pil_img.show()


# 第一次调用会花费几分钟 ……
(x_train, t_train), (x_test, t_test) = load_mnist(flatten=True, normalize=False)

# 输出各个数据的形状
# print(x_train.shape)  # (60000, 784)
# print(t_train.shape)  # (60000,)
# print(x_test.shape)  # (10000, 784)
# print(t_test.shape)  # (10000,)

img = x_train[0]
label = t_train[0]
print(label)  # 5
print(img.shape)
# (784,)
img = img.reshape(28, 28)  # 把图像的形状变成原来的尺寸
print(img.shape)
# (28, 28)
img_show(img)
