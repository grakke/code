#include <stdio.h>

int main(int argc, char const *argv[])
{
    int x = 100;
    printf("dec = %d,octal = %o,hex = %x\n", x, x, x);
    printf("dec = %d,octal = %#o,hex = %#x\n", x, x, x);
    return 0;
}
