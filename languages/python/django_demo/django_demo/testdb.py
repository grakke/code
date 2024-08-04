# -*- coding: utf-8 -*-

from django.http import HttpResponse

from TestModel.models import Test


# 数据库操作
def testdb(request):
    response = ''
    response1 = ''

    list = Test.objects.all()

    response2 = Test.objects.filter(id=1)
    response3 = Test.objects.get(id=1)
    Test.objects.order_by('name')[0:2]
    Test.objects.order_by('name')
    Test.objects.filter(name='ruboo').order_by('id')

    for var in list:
        response1 += var.name + ''
    response = response1
    return HttpResponse('<p>' + response + '</p><br>')

    # 修改其中一个id=1的name字段，再save，相当于SQL中的UPDATE
    # test1 = Test.objects.get(id=1)
    # test1.name = 'Google'
    # test1.save()

    # 另外一种方式
    # Test.objects.filter(id=1).update(name='Google')

    # 修改所有的列
    # Test.objects.all().update(name='Google')

    # return HttpResponse("<p>修改成功</p>")

    # test1 = Test.objects.get(id=2)
    # test1.delete()

    # 另外一种方式
    # Test.objects.filter(id=1).delete()

    # 删除所有数据
    # Test.objects.all().delete()

    # return HttpResponse("<p>删除成功</p>")
