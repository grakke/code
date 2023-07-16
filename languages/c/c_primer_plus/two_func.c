#include <stdio.h>

void butler(void);

int main(int argc, char const *argv[])
{
    printf("I will summon the bulter function\n");
    butler();

    printf("Yes, Bring me some tea and writable DVDS.\n");

    return 0;
}

void butler(void)
{
    printf("You rang,sir?\n");
}
