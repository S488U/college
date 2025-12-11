#include <stdio.h>

int main()
{
    int m, n, i, j, k, sum = 0, q, p;
    int mat1[10][10], mat2[10][10], mat3[10][10];

    printf("enter the rows and columns of 1st matrix: ");
    scanf("%d%d", &m, &n);

    printf("enter %d elements of 1st matrix (row-wise):\n", m * n);
    for (i = 0; i < m; i++)
        for (j = 0; j < n; j++)
            scanf("%d", &mat1[i][j]);

    printf("enter the rows and columns of 2nd matrix: ");
    scanf("%d%d", &p, &q);

    if (n != p)
    {
        printf("cant multiply (columns of first must equal rows of second)\n");
        return 0;
    }

    printf("enter %d elements of 2nd matrix (row-wise):\n", p * q);
    for (i = 0; i < p; i++)
        for (j = 0; j < q; j++)
            scanf("%d", &mat2[i][j]);

    for (i = 0; i < m; i++)
    {
        for (j = 0; j < q; j++)
        {
            sum = 0;
            for (k = 0; k < n; k++)
                sum += mat1[i][k] * mat2[k][j];
            mat3[i][j] = sum;
        }
    }

    printf("product of matrix is:\n");
    for (i = 0; i < m; i++)
    {
        for (j = 0; j < q; j++)
            printf("%d\t", mat3[i][j]);
        printf("\n");
    }

    return 0;
}
