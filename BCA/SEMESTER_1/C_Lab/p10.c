#include <stdio.h>


void main()
{
    int a[10][10], m, n, i, j, flag = 0;
    

    printf("Enter rows and columns\n");
    scanf("%d %d", &m, &n);

    printf("Enter matrix elements:\n");
    for (i = 0; i < m; i++)
    {
        for (j = 0; j < n; j++)
        {
            scanf("%d", &a[i][j]);
        }
    }

    printf("The matrix is:\n");
    for (i = 0; i < m; i++)
    {
        for (j = 0; j < n; j++)
        {
            printf("%d\t", a[i][j]);
        }
        printf("\n");
    }

    printf("Transpose of the matrix is:\n");
    for (i = 0; i < n; i++)
    {
        for (j = 0; j < m; j++)
        {
            printf("%d\t", a[j][i]);
        }
        printf("\n");
    }
    if (m != n)
    {
        printf("\nMatrix is not symmetric");
    
        return;
    }


    for (i = 0; i < m; i++)
    {
        for (j = 0; j < n; j++)
        {
            if (a[i][j] != a[j][i])
            {
                flag = 1;
                break;
            }
        }
        
    }

    if (flag == 0)
        printf("\nMatrix is symmetric");
    else
        printf("\nMatrix is not symmetric");

   
}
