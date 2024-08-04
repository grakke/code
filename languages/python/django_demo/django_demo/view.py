from django.http import HttpResponse
from django.shortcuts import render


def hello(request):
    # return HttpResponse("Hello world ! ")
    context = {}
    context['hello'] = 'Hello World!'
    return render(request, 'hello.html', context)


def test(request):
    # return HttpResponse("Hello world ! ")
    context = {}
    context['hello'] = 'Hello World!'
    return render(request, 'test.html', context)


def world(request):
    if request.method == 'POST':
        username = request.POST.get('username', None)
        password = request.POST.get('password', None)
        print(username, password)
    # return render(request, 'hello.html')
