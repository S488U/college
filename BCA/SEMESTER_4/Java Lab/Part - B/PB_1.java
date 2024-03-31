/*
Write a program to display a menu with an option add, subtract, multiply and 
division by implementing classes. Do the appropriate action on selection. Use 
separate method for calculation.
*/

import java.util.Scanner;

class Calculator {
    int x, y;

    void getData(int a, int b) {
        x = a;
        y = b;
    }

    int sum() {
        return (x + y);
    }

    int difference() {
        return (x - y);
    }

    int product() {
        return (x * y);
    }

    int quotient() {
        return (x / y);
    }

    public int getX() {
        return x;
    }

    public int getY() {
        return y;
    }
}

public class PB_1 {
    public static void main(String args[]) {
        int n1, n2, ch;
        Scanner ob = new Scanner(System.in);
        Calculator c = new Calculator();
        try {
            System.out.print("Enter the first number: ");
            n1 = ob.nextInt();
            System.out.print("Enter the second number: ");
            n2 = ob.nextInt();
            c.getData(n1, n2);
            do {
                System.out.println(
                        "Menu For Operation\n1. Add\n2. Subtract\n3. Multiply\n4. Divide\n5. Exit\nEnter your choice: ");
                ch = ob.nextInt();
                switch (ch) {
                    case 1:
                        System.out.println("The sum is: " + c.sum());
                        break;
                    case 2:
                        System.out.println("The difference is: " +
                                c.difference());
                        break;
                    case 3:
                        System.out.println("The product is: " + c.product());
                        break;
                    case 4:
                        System.out.println("The quotient is: " + c.quotient());
                        break;
                    case 5:
                        System.exit(0);
                    default:
                        System.out.println("Invalid Choice.");
                }
            } while (ch <= 5);
        } catch (Exception e) {
        }
    }
}
