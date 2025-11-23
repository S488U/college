
#include <stdio.h>
#include <conio.h>
void main()
{
    long int gross;
    int tax = 0, index;
    printf("Enter the gross salary:");
    scanf("%ld", &gross);
    index = gross / 1000;
    switch (index)
    {
    case 0:
    case 1:
        tax = 0;
        break;
    case 2:
    case 3:
        tax = gross * 3 / 100;
        break;
    case 4:
    case 5:
        tax = gross * 5 / 100;
        break;
    default:
        tax = gross * 8 / 100;
        break;
    }
    printf("Gross pay=%ld\n Tax=%d", gross, tax);
    getch();
}
