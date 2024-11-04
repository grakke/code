#include <stdio.h>
#include <tgmath.h>

typedef struct
{
    int x;
    int y;
} Point;

int foo(int x, int y, Point *p, int(handler)(int))
{
    return handler(x + y + p->x + p->y);
}
int handler(int n)
{
    return sqrt(n);
}
int main(void)
{
    int x = 2;
    int y = 3;
    Point p = {.x = 10, .y = 10};
    printf("%d", foo(x, y, &p, handler)); // 5.
    return 0;
}