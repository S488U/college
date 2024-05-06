/*Write a C++ program to create a class ‘distance’ with data members feet and inches 
and member functions read() and show().Write a C++ program to add two distances 
by using object as function argument.(inches should not be >=12)
*/

#include<iostream.h> 
#include<conio.h> 
 
class distance { 
    int feet, inch; 
    public: 
        void read(); 
    void show(); 
    void add(distance, distance); 
}; 
void distance::read() { 
    cout << endl << "Enter the feet and inch:"; 
    cin >> feet >> inch; 
} 
void distance::show() { 
    cout << endl << "Distance is " << feet << " feets and " << 
        inch << " inches"; 
} 
void distance::add(distance d1, distance d2) { 
    inch = d1.inch + d2.inch; 
    feet = inch / 12; 
    inch = inch % 12; 
    feet = feet + d1.feet + d2.feet; 
} 
void main() { 
    clrscr(); 
    distance d1, d2, d3; 
    d1.read(); 
    d1.show(); 
    d2.read(); 
    d2.show(); 
    d3.add(d1, d2); 
    cout << endl << "Sum of the"; 
    d3.show(); 
    getch(); 
} 

/*
OUTPUT: -

Enter the feet and inch: 5 9
Distance is 5 feets and 9 inches
Enter the feet and inch: 3 7
Distance is 3 feets and 7 inches
Sum of the Distance is 9 feets and 4 inches


*/