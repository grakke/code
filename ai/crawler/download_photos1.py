import json
import requests as req
from lxml import etree
from selenium import webdriver
import os

request_url = 'https://movie.douban.com/subject_search?search_text=宫崎骏&cat=1002'
src_xpath = "//div[@class='item-root']/a[@class='cover-link']/img[@class='cover']/@src"
title_xpath = "//div[@class='item-root']/div[@class='detail']/div[@class='title']/a[@class='title-text']"

driver = webdriver.Chrome('/Users/apple/Downloads/chromedriver')
driver.get(request_url)
html = etree.HTML(driver.page_source)
srcs = html.xpath(src_xpath)
print(srcs)  # 大家可要看下打印出来的数据是否只是一页的内容，以及图片url的后缀格式

picpath = '/Users/apple/Downloads/宫崎骏电影海报'
if not os.path.isdir(picpath):
    os.mkdir(picpath)


def download(src, id):
    dic = picpath + '/' + str(id) + '.webp'
    try:
        pic = req.get(src, timeout=30)
        fp = open(dic, 'wb')
        fp.write(pic.content)
        fp.close()
    except req.exceptions.ConnectionError:
        print('图片无法下载')


for i in range(0, 150, 15):
    url = request_url + '&start=' + str(i)
    driver.get(url)
    html = etree.HTML(driver.page_source)
    srcs = html.xpath(src_xpath)
    titles = html.xpath(title_xpath)
    for src, title in zip(srcs, titles):
        download(src, title.text)
