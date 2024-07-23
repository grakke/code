#include <stdio.h>

/* atoi: convert s to integer */
int atoi(char s[])
{
    int i, n;
    n = 0;
    for (i = 0; s[i] >= '0' && s[i] <= '9'; ++i)
        n = 10 * n + (s[i] - '0');
    return n;
}

/* lower: convert c to lower case; ASCII only */
int lower(int c)
{
    if (c >= 'A' && c <= 'Z')
        return c + 'a' - 'A';
    else
        return c;
}

/* squeeze: delete all c from s */
void squeeze(char s[], int c)
{
    int i, j;
    for (i = j = 0; s[i] != '\0'; i++)
        if (s[i] != c)
            s[j++] = s[i];
    s[j] = '\0';
}

/* getbits: get n bits from position p */
unsigned getbits(unsigned x, int p, int n)
{
    // 表达式 m << (p+1-n)将期望获得的字段移位到字的最右端
    // ~0 的所有位都为 1，语句~0 << n 将~0 左移 n 位，并将最右边的 n 位用 0 填补
    // 使用~运算对它按位取反，建立最右边 n 位全为 1 的屏蔽码
    return (x >> (p + 1 - n)) & ~(~0 << n);
}

int main(int argc, char const *argv[])
{
    printf("%d \n", atoi("1234"));
    printf("%c \n", lower('G'));
    printf("%d", 255 & 0177);
    return 0;
}

// TODO: convert char to int