import java.util.Scanner;

class Square implements Runnable {
    int n, i;

    Square(int no) {
        n = no;
    }

    public void run() {
        for (i = 1; i <= n; i++) {
            System.out.println("Square of " + i + " is " + i * i);
        }
    }
}

class Cube implements Runnable {
    int n, j;

    Cube(int no) {
        n = no;
    }

    public void run() {
        for (j = 1; j <= n; j++) {
            System.out.println("Cube of " + j + " is " + j * j * j);
        }
    }
}

class SquareRoot implements Runnable {
    int n, k;

    SquareRoot(int no) {
        n = no;
    }

    public void run() {
        for (k = 1; k <= n; k++) {
            System.out.println("SquareRoot of " + k + " is " + Math.sqrt(k));
        }
    }
}

public class PB_7 {
    public static void main(String args[]) {
        try {
            Scanner b = new Scanner(System.in);
            System.out.print("Enter any number: ");
            int n = b.nextInt();
            Square s = new Square(n);
            Cube c = new Cube(n);
            SquareRoot q = new SquareRoot(n);
            Thread t1 = new Thread(s);
            Thread t2 = new Thread(c);
            Thread t3 = new Thread(q);
            System.out.println("Start Thread t1");
            t1.start();
            System.out.println("Start Thread t2");
            t2.start();
            System.out.println("Start Thread t3");
            t3.start();
            b.close();
        } catch (Exception e) {
        }
    }
}
