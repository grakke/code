#include <stdio.h>
#define LOWER 0   /* lower limit of table */
#define UPPER 300 /* upper limit */
#define STEP 20   /* step size */

int main(int argc, char const *argv[])
{
    float fahrenheit, celsicus;

    fahrenheit = LOWER;
    printf("Convert fahrenheit to celsicus\n");
    while (fahrenheit < UPPER)
    {
        celsicus = (5.0 / 9.0) * (fahrenheit - 32.0);
        printf("%3.0f %6.1f\n", fahrenheit, celsicus);
        fahrenheit += STEP;
    }

    int fahr;
    for (fahr = LOWER; fahr <= UPPER; fahr = fahr + STEP)
        printf("%3d %6.1f\n", fahr, (5.0 / 9.0) * (fahr - 32));

    return 0;
}
