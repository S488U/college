// Write a program to multiply two matrices

import java.util.Scanner;

class MatrixMultiplication {
    public static void main(String args[]) {
        
        int[][] matrix1 = new int[10][10];
        int[][] matrix2 = new int[10][10];
        int[][] matrix3 = new int[10][10];
        int i, j, m, n, p, q, k, sum = 0;
         
        Scanner obj = new Scanner(System.in);
        
        System.out.print("Enter the no. of rows and columns of first matrix: ");
        m = obj.nextInt();
        n = obj.nextInt();
        
        
        System.out.println("Enter the elements of first matrix:");
        for (i = 0; i < m; i++) {
            for (j = 0; j < n; j++) {
                matrix1[i][j] = obj.nextInt();
            }
        }
        
        System.out.print("Enter the no. of rows and columns of second matrix: ");
        p = obj.nextInt();
        q = obj.nextInt();

        if (n != p)
            System.out.println("Matrices with the entered orders can't be multiplied with each other");
        else {
            
            System.out.println("Enter the elements of second matrix:");
            for (i = 0; i < p; i++) {
                for (j = 0; j < q; j++) {
                    matrix2[i][j] = obj.nextInt();
                }
            }
            System.out.println("The product of the entered matrices:");
            for (i = 0; i < m; i++) {
                for (j = 0; j < q; j++) {
                    for (k = 0; k < p; k++) {
                        sum = sum + matrix1[i][k] * matrix2[k][j];
                    }
                    matrix3[i][j] = sum;
                    sum = 0;
                    System.out.print(matrix3[i][j] + " ");
                }
                System.out.println();
            }
        }
    }
}