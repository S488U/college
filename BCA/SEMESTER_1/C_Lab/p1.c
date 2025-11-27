#include <stdio.h>
void main()
{
    int a, b, c, large;
    printf("Enter the numbers");
    scanf("%d%d%d", &a, &b, &c);
    large = a;
    if (b > large)
    {
        large = b;
    }
    if (c > large)
    {
        large = c;
    }
    printf("The largest number is %d", large);
}