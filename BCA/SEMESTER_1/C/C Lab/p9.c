#include <stdio.h>

void main()
{
    int a[10], n, i, big, small, bpos, spos;
    printf("Enter the number of elements");
    scanf("%d", &n);
    printf("Enter the elements");
    for (i = 0; i < n; i++)
    {
        scanf("%d", &a[i]);
    }
    big = a[0];
    small = a[0];
    for (i = 0; i < n; i++)
    {
        if (big < a[i])
        {
            big = a[i];
            bpos = i + 1;
        }
        if (small > a[i])
        {
            small = a[i];
            spos = i + 1;
        }
    }
    printf("The largest number  is %d and its position is %d \n", big, bpos);
    printf("The smallest number  is %d and its position is %d \n", small, spos);
}