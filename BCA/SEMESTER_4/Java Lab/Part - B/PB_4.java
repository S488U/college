/*Develop a program to produce pay slip of a name, code and designation. Add 
another base class consisting of data members account number, date of joining and 
basic pay. The derived class consists of data members of other earning (pf, lic, 
tax).(Implement using interface.)*/

import java.util.*;

class Emp1 {
    String name,
            desig;
    int code;

    void getemp1() {
        try {
            Scanner in = new Scanner(System.in);
            System.out.println("enter the employee name:");
            name = in.next();
            System.out.println("enter the designation:");
            desig = in.next();
            System.out.println("enter the employee code:");
            code = in.nextInt();
        } catch (Exception e) {
        }
    }

    void disemp1() {
        System.out.println("employee name: " + name);
        System.out.println("designation: " + desig);
        System.out.println("code: " + code);
    }
}

class Emp2 extends Emp1 {
    int acc_no, basic_pay;
    String doj;

    void getemp2() {
        try {
            Scanner ob = new Scanner(System.in);
            System.out.println("enter the account number:");
            acc_no = ob.nextInt();
            System.out.println("enter the date of joining:");
            doj = ob.next();
            System.out.println("enter the basic pay:");
            basic_pay = ob.nextInt();
        } catch (Exception e) {
        }
    }

    void disemp2() {
        System.out.println("account number: " + acc_no);
        System.out.println("date of joining: " + doj);
        System.out.println("basic pay: " + basic_pay);
    }
}

interface deduction {
    static final int pf = 500;
    static final int lic = 700;
    static final int tax = 250;

    public void getemp3();
    public void disemp3();
    public void salary();
}

class Emp3 extends Emp2 implements deduction {
    int da, hra, cca;

    public void getemp3() {
        try {
            Scanner in = new Scanner(System.in);
            System.out.println("enter the da:");
            da = in.nextInt();
            System.out.println("enter the hra:");
            hra = in.nextInt();
            System.out.println("enter the cca:");
            cca = in.nextInt();
        } catch (Exception e) {
        }
    }

    public void disemp3() {
        System.out.println("da is: " + da);
        System.out.println("hra is: " + hra);
        System.out.println("cca is: " + cca);
    }

    public void salary() {
        int gross_sal = basic_pay + hra + da + cca;
        int deduce = pf + tax + lic;
        int net_sal = gross_sal - deduce;
        System.out.println("pf is: " + pf);
        System.out.println("lic is: " + lic);
        System.out.println("tax is: " + tax);
        System.out.println("employee gross salary: " + gross_sal);
        System.out.println("deduction is: " + deduce);
        System.out.println("employee salary: " + net_sal);
    }
}

public class PB_4 {
    public static void main(String args[]) {
        Emp3 t = new Emp3();
        t.getemp1();
        t.getemp2();
        t.getemp3();
        System.out.println("\nEmployee details");
        t.disemp1();
        t.disemp2();
        t.disemp3();
        t.salary();
    }
}

/*

OUTPUT: -

enter the employee name:
Johnas
enter the designation:
Manager
enter the employee code:
0123
enter the account number:
985642
enter the date of joining:
28
enter the basic pay:
10000
enter the da:
3000
enter the hra:
1000
enter the cca:
5000

Employee details
employee name: Johnas
designation: Manager
code: 123
account number: 985642
date of joining: 28
basic pay: 10000
da is: 3000
hra is: 1000
cca is: 5000
pf is: 500
lic is: 700
tax is: 250
employee gross salary: 19000
deduction is: 1450
employee salary: 17550


 */