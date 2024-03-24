/* 1.Java program to find a list of all numbers between 100 and 200 that 
are divisible by 7 and also find their sum. */

import java.io.*;

class Divide {
    public static void main(String args[]) {
        int i, sum = 0;
        System.out.println("The Numbers between 100 and 200 that are divisible by 7 are: ");       
        for (i = 101; i < 200; i++) { 
            if (i % 7 == 0) { 
                System.out.println(i);
                sum = sum + i; 
            }
        } 
        System.out.println("The Sum of Numbers divisible by 7 is" + sum);
    }
}