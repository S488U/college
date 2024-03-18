/* 
Write a program to extract a portion of character string and 
print the extracted string. Assume that in character are extracted
starting with n'th character(Don't use substring() Method).
*/

import java.io.*;

class Extract {
    public static void main(String args[]){
        String str;
        int i, n, m;
        try {
            DataInputStream b = new DataInputStream(System.in);
            System.out.println("Enter a String: ");
            str = b.readLine();
            System.out.println("Enter the position where the string to be extracted: ");
            n = Integer.parseInt(b.readLine());
            System.out.println("Enter the number of characters to be extracted: ");
            m = Integer.parseInt(b.readLine());
            System.out.println("The Extracted String is : ");
            for(i=n-1;i<(n+m-1);i++){
                System.out.print(str.charAt(i));
            }
            System.out.println();
        } catch (Exception e) {}
    }
}

/*
_______________
    OUTPUT
_______________
Enter a String:
Hello World!
Enter the position where the string to be extracted:
4
Enter the number of characters to be extracted:
8
The Extracted String is :
lo World

*/