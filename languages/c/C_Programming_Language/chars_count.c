#include <stdio.h>

int main(int argc, char const *argv[])
{
    int c, i, nwhite, nother;
    int ndigit[10];

    nwhite = nother = 0;
    for (i = 0; i < 10; ++i)
    {
        ndigit[i] = 0;
    }

    while ((c = getchar()) != EOF)
    {
        if (c >= '0' && c <= '9')
        {
            ++ndigit[c - '0'];
        }
        else if (c == '\n' || c == ' ' || c == '\t')
        {
            ++nwhite;
        }
        else
        {
            ++nother;
        }

        // switch (c)
        // {
        // case '0':
        // case '1':
        // case '2':
        // case '3':
        // case '4':
        // case '5':
        // case '6':
        // case '7':
        // case '8':
        // case '9':
        //     ndigit[c - '0']++;
        //     break;
        // case ' ':
        // case '\n':
        // case '\t':
        //     nwhite++;
        //     break;
        // default:
        //     nother++;
        //     break;
        // }
    }

    printf("digits =");
    for (i = 0; i < 10; ++i)
    {
        if (ndigit[i] > 0)
        {
            printf("%d: %d;", i, ndigit[i]);
        }
    }
    printf(", white space = %d, other =  %d\n", nwhite, nother);

    return 0;
}
