// 3.Write  a  program  that  asks  the  user  for  low  and  high  integer  in  a  range  of 
// integers. The program then asks the user for integers to be added up.

import java.util.Scanner;

public class Bounds {
    public static void main(String args[]) {
        int lb, ub, isum = 0, i; 
        Scanner bo = new Scanner(System.in); 
        try {
            System.out.print("Enter lower bound: "); 
            lb = bo.nextInt(); 
            System.out.print("Enter upper bound: "); 
            ub = bo.nextInt(); 
            do {
                System.out.println("Enter numbers between the range and type 0 to stop:"); 
                                                                                           
                i = bo.nextInt(); 
                if (i > lb && i < ub) 
                    isum += i; 
            } while (i != 0); 
            System.out.println("The sum within the range is: " + isum);
        } catch (Exception e) {
        } 
        bo.close();
    }
}