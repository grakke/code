#include <stdio.h>
int main()
{
    char[] str = "hello world";
    char[] color = "1;4;33";
    scanf("%s:%s", &color, &str);
    printf("\033[%sm%s\033[0m", str, color);
    return 0;
}