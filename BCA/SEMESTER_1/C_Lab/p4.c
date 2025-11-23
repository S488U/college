#include <stdio.h>
void main()
{
    int num, rev = 0, rem = 0, sum = 0, org;
    printf("Enter a number");
    scanf("%d", &num);
    org = num;
    while (num > 0)
    {
        rem = num % 10;
        rev = rev * 10 + rem;
        num = num / 10;
        sum = sum + rem;
    }
    printf("the rev of num %d  is %d\n", org, rev);
    if (org == rev)
    {
        printf("the number is palidrome\n");
    }
    else
    {
        printf("the number is not a palindrome");
    }
    printf("the sum of the number is %d", sum);
}