/*Write a java program to demonstrate the usage of feature package. Create package to
convert temperature in centigrade into Fahrenheit and one more package to calculate
simple interest. Implement both packages in main. */


// Main File: Calculation.java

import tempconvert.*;
import calculate.*;

public class Calculation {
    public static void main(String args[]) {
        Convertor c = new Convertor();
        SimpleInterest s = new SimpleInterest();
        System.out.println("Output for Temperature:");
        c.cent_fahren();
        c.fah_cent();
        System.out.println("\nOutput for Simple Interest:");
        s.getdata();
        s.process();
        s.putdata();
    }
}


// Package 1:  Convertor.java

package tempconvert;

import java.io.*;
import java.util.Scanner;

public class Convertor {
    public void cent_fahren() {
        double f = 0, c = 0;
        Scanner b = new Scanner(System.in);
        try {
            System.out.print("Enter the temperature in Centigrade: ");
            c = b.nextDouble();
        } catch (Exception e) {}
        f = (c * 9) / 5 + 32;
        System.out.println("The temperature in Fahrenheit is: " + f);
    }

    public void fah_cent() {
        double f = 0, c = 0;
        Scanner b = new Scanner(System.in);
        try {
            System.out.print("Enter the temperature in Fahrenheit: ");
            f = b.nextDouble();
        } catch (Exception e) {}
        c = (f - 32) * 5 / 9;
        System.out.println("The temperature in Centigrade is: " + c);
    }
}

// Package 2: SimpleInterest.java

package calculate;
import java.util.Scanner;

public class SimpleInterest {
	float p, n, r, si;

	public void getdata() {
		Scanner b = new Scanner(System.in);
		try {
			System.out.print("Enter Principal: ");
			p = b.nextFloat();
			System.out.print("Enter Time in Years: ");
			n = b.nextFloat();
			System.out.print("Enter the Rate of Interest: ");
			r = b.nextFloat();
		} catch (Exception c) { }
	}

	public void process() {
		si = (p * r * n) /100;
	}

	public void putdata() {
		System.out.println("The Principal Amount: " + p);
		System.out.println("The Number of Years is: " + n);
		System.out.println("The Rate of Interest is: " + r);
		System.out.println("Simple Interest is: " + si);
	}
}
