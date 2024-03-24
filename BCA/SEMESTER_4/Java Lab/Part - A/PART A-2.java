/* 2.Write  a  program  that  asks  the  user  to  enter  two  words.  The  words  will  be 
separated by enough dots so that the total line length is 30. */

import java.io.*;
import java.util.Scanner;

class Dots {
    public static void main(String args[]) {
        Scanner b = new Scanner(System.in); 
        String s1, s2; 
        int sum, i; 
        try {
            System.out.println("Enter the First String"); 
            s1 = b.next(); 
            System.out.println("Enter the Second String"); 
            s2 = b.next(); 
            sum = s1.length() + s2.length();
            System.out.print(s1); 
            for (i = 0; i < (30 - sum); i++) { 
                System.out.print("."); 
            }
            System.out.print(s2); 
        } catch (Exception e) {
        } 
    }
}