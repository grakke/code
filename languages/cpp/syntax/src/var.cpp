
#include <iostream>
using namespace std;

int fun1()
{
    extern int j, i;
    return i + j;
}

extern int j, i;

int fun2()
{
    return i - j;
}

int j = 3, i = 5;

int main(int argc, char const *argv[])
{
    int k = 35, n(0);
    // 变量引用
    int &b = k;
    cout << k << ' ' << n << ' ' << b << endl;
    b = 40;
    cout << b << ' ' << k << endl;

    int fac(int);
    for (int i = 1; i < 5; i++)
    {
        cout << "i! = " << fac(i) << endl;
    }

    cout << fun1() << ' ' << fun2() << endl;

    int *p = int[10];
    int *q = p + 5;
    cout << "q=" << q << endl;
    q++;
    cout << "(q++)=" << q << endl;
    cout << "(q-p)=" << q - p << endl;
    delete p;
    return 0;
}

int fac(int n)
{
    static int f = 1;
    f = f * n;
    return f;
}