// Create a package my package, which has class to represent a bank account, 
// includes following data members: Name of the depositor, account no, type of
// account and balance amount.

// Main File: Account.java

import MyPack.Bank;
import java.util.Scanner;

public class Account {
    public static void main(String args[]) {
        Scanner sc = new Scanner(System.in);
        int choice;
        long ac;
        String nm;
        double amt, id;
        System.out.println("Enter A/C No., Name and Initial Deposit:");
        ac = sc.nextLong();
        nm = sc.next();
        id = sc.nextDouble();
        Bank b1 = new Bank(ac, nm, id);
        while (true) {
            System.out.print("Menu\n1. Deposit\n2. Withdraw\n3. Display\n4. Exit\n Enter your choice: ");
            choice = sc.nextInt();
            switch (choice) {
                case 1:
                    System.out.print("Enter the amount to be deposited: ");
                    amt = sc.nextDouble();
                    b1.deposit(amt);
                    break;
                case 2:
                    System.out.print("Enter the amount to be withdrawn: ");
                    amt = sc.nextDouble();
                    b1.withdraw(amt);
                    break;
                case 3:
                    b1.display();
                    break;
                case 4:
                    sc.close();
                    System.exit(0);
                default:
                    System.out.println("Invalid choice. Try again");
            }
        }
    }
}


// Package File: Bank.java 

package MyPack;

public class Bank {
    long acc_no;
    double balance;
    String name;

    public Bank(long a, String n, double bal) {
        acc_no = a;
        name = n;
        balance = bal;
    }

    public void deposit(double amt) {
        balance += amt;
        System.out.println("Your balance is: " + balance);
    }

    public void withdraw(double amt) {
        if (balance - amt > 1000) {
            balance -= amt;
            System.out.println("Your balance is: " + balance);
        } else {
            System.out.println("Insufficient balance");
        }
    }

    public void display() {
        System.out.println("Account No: " + acc_no);
        System.out.println("Name of the customer: " + name);
        System.out.println("Balance: " + balance);
    }
}
