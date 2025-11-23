#include <stdio.h>
#include <conio.h>
long factorial(int n)
{
    if (n == 0)
    { 
        return 1;
    }
    else
    {
        return (n * factorial(n - 1));
    }
}
void main()
{
    int num;
    long fact;
    printf("Enter the number to find factorial");
    scanf("%d", &num);
    fact = factorial(num);
    printf("factorial of  %d is %d", num, fact);
}