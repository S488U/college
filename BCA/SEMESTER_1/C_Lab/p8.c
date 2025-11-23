#include <stdio.h>
void main()
{
    int n, a[20], i;
    float sum = 0, avg;
    printf("Enter the size of array");
    scanf("%d", &n);
    printf("Enter %d integer numbers", n);
    for (i = 0; i < n; i++)
    {
        scanf("%d", &a[i]);
    }
    for (i = 0; i < n; i++)
    {
        sum = sum + a[i];
    }
    avg = sum / n;
    printf("%.2f", sum);
    printf("%.2f", avg);
}
