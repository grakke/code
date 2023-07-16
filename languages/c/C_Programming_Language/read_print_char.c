#include <stdio.h>

int main(int argc, char const *argv[])
{
    // int c;
    // while ((c = getchar()) != EOF)
    // {
    //     putchar(c);
    // }

    long nc;
    // nc = 0;
    // while (getchar() != EOF)
    //     ++nc;

    for (nc = 0; getchar() != EOF; ++nc)
        ;

    printf("%ld\n", nc);
    return 0;
}
