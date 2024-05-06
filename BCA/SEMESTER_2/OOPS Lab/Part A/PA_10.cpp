/*Write a C++ program to compute the total marks and declare the results using array 
of objects. Assume that the class contains the data members - roll no, name, marks in 
3 subjects. Result is calculated as follows. If student gets <35 fail. Otherwise various 
results are calculated on average as
    >=70 Distinction
    >=60 and <70 First class
    >=50 and <60 Second class else Pass class
*/

#include<iostream.h> 
#include<conio.h> 
 
class student { 
    int regno, m1, m2, m3, total; 
    float avg; 
    char name[20]; 
    public: 
        void getdata(); 
    void putdata(); 
    void calculate(); 
}; 
void student::getdata() { 
    cout << endl << "Enter the register number:"; 
    cin >> regno; 
    cout << endl << "Enter the name:"; 
    cin >> name; 
    cout << endl << "Enter the marks in three subjects:"; 
    cin >> m1 >> m2 >> m3; 
} 
void student::putdata() { 
    cout << endl << "Register No:" << regno; 
    cout << endl << "Name:" << name; 
    cout << endl << "Mark1:" << m1 << endl << "Mark2:" << m2 << endl << "Mark3:" << 
        m3; 
} 
void student::calculate() { 
    total = m1 + m2 + m3; 
    cout << endl << "Total:" << total; 
    avg = total / 3; 
    cout << endl << "Average:" << avg; 
    cout << endl << "Grade:"; 
    if (m1 > 35 && m2 > 35 && m3 > 35) { 
        if (avg >= 70) 
            cout << "Distinction"; 
        else if (avg >= 60) 
            cout << "First class"; 
        else if (avg >= 50) 
            cout << "Second class"; 
        else 
            cout << "Pass"; 
    } else 
        cout << "Failed"; 
} 
void main() { 
    clrscr(); 
    student s[20]; 
    int i, n; 
    cout << endl << "Enter the number of students:"; 
    cin >> n; 
 
    for (i = 0; i < n; i++) { 
        cout << endl << "Enter the Details of student" << i + 1; 
        s[i].getdata(); 
        s[i].putdata(); 
        s[i].calculate(); 
    } 
    getch(); 
}

/*
OUTPUT: -

Enter the number of student:2 
Enter the details of student 1 
Enter the register number:111 
Enter the name:Ramesh 
Enter the marks in three subjects:55 66 61 
 
Register No:111 
Name:Ramesh 
Mark1:55 
Mark2:66 
Mark3:61 
Total:182 
Average:60 
 
Enter the details of student 2 
Enter the register number:222 
Enter the name:Reshma 
Enter the marks in three subjects:33 56 65 
 
Register No:222 
Name:Reshma

*/