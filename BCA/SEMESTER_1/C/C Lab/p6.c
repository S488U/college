#include <stdio.h>
void main()
{
    int num, a[10], i;
    printf("enter a number");
    scanf("%d", &num);
    for (i = 0; num > 0; i++)
    {
        a[i] = num % 2;
        num = num / 2;
    }
    for (i = i - 1; i >= 0; i--)
    {
        printf("%d", a[i]);
    }
}