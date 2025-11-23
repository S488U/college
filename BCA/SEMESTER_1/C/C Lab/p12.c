#include <stdio.h>
#include <conio.h>
#include <string.h>

void main()
{
    char str[20];
    int i, len, flag = 0;
    printf("Enter the string");
    gets(str);
    len = strlen(str);
    for (i = 0; i < len; i++)
    {
        if (str[i] != str[len - i - 1])
        {
            flag = 1;
            break;
        }
    }
    if (flag)
    {
        printf("%s is not palindrome", str);
    }
    else
    {
        printf("%s is a palindrome", str);
    }
}
