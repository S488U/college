// Write a program to create student class with fields. The total of the 3 subjects must 
// be calculated only when the student passes is all 3 subjects, otherwise declare total 
// is 0. Using constructor create an array of ‘n’ students.

import java.util.*;

class Student {
    int regno, i, total = 0;
    int mark[] = new int[3];
    String name;

    Student(int reg, String nam, int m[]) {
        this.regno = reg;
        this.name = nam;
        for (i = 0; i < 3; i++) {
            this.mark[i] = m[i];
            if (m[i] < 35) {
                this.total = 0;
                break;
            } else
                this.total += m[i];
        }
    }

    public void display() {
        System.out.println("Reg no: " + this.regno + "\tName: " + this.name + "\tTotal: " + this.total + "\n");
    }
}

public class PB_2 {
    public static void main(String args[]) {
        int score[] = new int[3];
        Scanner ob = new Scanner(System.in);
        try {
            System.out.print("Enter no. of students: ");
            int n = ob.nextInt();
            Student s[] = new Student[n];
            for (int i = 0; i < n; i++) {
                System.out.println("Enter details of student " + (i + 1) + ":");
                System.out.print("Enter register number: ");
                int no = ob.nextInt();
                System.out.print("Enter name: ");
                String name = ob.next();
                System.out.println("Enter marks in 3 subjects:");
                for (int j = 0; j < 3; j++) {
                    score[j] = ob.nextInt();
                }
                s[i] = new Student(no, name, score);
            }

            System.out.println("\nStudent Details:");
            for (int i = 0; i < n; i++) {
                System.out.println("Student " + (i + 1) + ":");
                s[i].display();
            }
        } catch (Exception e) {
            System.out.println("Some error occurred");
        }
        ob.close();
    }
}

/*

OUTPUT: -

Enter no. of students: 2
Enter details of student 1:
Enter register number: 01234
Enter name: Johnas
Enter marks in 3 subjects:
24 56 84
Enter details of student 2:
Enter register number: 09874
Enter name: Alice
Enter marks in 3 subjects:
56 94 72

Student Details:
Student 1:
Reg no: 1234	Name: Johnas	Total: 0

Student 2:
Reg no: 9874	Name: Alice	Total: 222

 */