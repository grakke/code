#include <stdio.h>

int main(void)
{
    /*
    也可以这样写注释。
    */
    int dogs;
    printf("How many dogs do you have?\n");
    scanf("%d", &dogs);

    // 这种注释只能写成一行。
    printf("So you have %d dog(s)!\n", dogs);
    return 0;
}