// Write a program to create a vector to store the shopping list of items.

import java.io.*;
import java.util.*;

class Shop {
    public static void main(String args[]) {
        try {
            Vector list = new Vector();
            String str;
            int i, n, pos, ch = 0;
            DataInputStream b = new DataInputStream(System.in);

            do {
                System.out.println("Menu");
                System.out.println("1.Create\n2.Add\n3.Delete\n4.Display\n5.Exit");
                System.out.println("Enter Your Choice: ");
                ch = Integer.parseInt(b.readLine());

                switch (ch) {
                    case 1: {
                        System.out.println("Enter the item to be added to the list");
                        str = b.readLine();
                        list.addElement(str);
                        System.out.println("Creating a List...");
                        break;
                    }
                    case 2: {
                        System.out.println("Enter an Item");
                        str = b.readLine();
                        System.out.println("Enter Position ");
                        pos = Integer.parseInt(b.readLine());
                        list.insertElementAt(str, pos - 1);
                        break;
                    }
                    case 3: {
                        n = list.size();
                        if (n == 0)
                            System.out.println("List is Empty");
                        else {
                            System.out.println("Enter the item to be Deleted: ");
                            str = b.readLine();
                            list.removeElement(str);
                        }
                        break;
                    }
                    case 4: {
                        int l = list.size();
                        String s[] = new String[l];
                        if (l == 0)
                            System.out.println("List is Empty");
                        else {
                            for (i = 0; i < l; i++)
                                list.copyInto(s);
                            System.out.println("The items in the list are");
                            for (i = 0; i < l; i++)
                                System.out.println(s[i]);
                        }
                        break;
                    }
                    case 5:
                        System.exit(0);
                    default:
                        System.out.println("Invalid Choice");
                }
            } while (ch < 5);
        } catch (Exception e) {

        }
    }
}