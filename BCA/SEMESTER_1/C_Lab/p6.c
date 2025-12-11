#include <stdio.h>
void main()
{
    int i, num, c = 0;
    printf("Enter is a number");
    scanf("%d", &num);
    for (i = 1; i <= num; i++)
    {
        if (num % i == 0)
        {
            c++;
        }
    }
    printf("%d", c);
    if (c == 2)
    {
        printf("its a prime number");
    }
    else
    {
        printf("not");
    }
}
