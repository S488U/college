/*Write a C++ program to create a class with data members a, b, c and member 
functions to input data, compute discriminants based on the following conditions and 
print the roots.
-> If discriminant = 0, print the roots are equal and their value.
-> If discriminant > 0, print the real roots and their values.
-> If discriminant < 0, print the roots are imaginary and exit the program
*/

#include<iostream.h> 
#include<conio.h> 
#include<math.h> 
 
class Quadratic { 
    private:  
     int a, b, c; 
    float disc,x, x1,x2; 
    public: void readdata(); 
    void compute(); 
    void display(); 
}; 
void Quadratic::readdata() { 
    cout << "Enter the values for a, b, c (Co-efficeient)" << endl; 
    cin >> a >> b >> c; 
} 
void Quadratic::compute() { 
    disc = b * b - 4 * a * c; 
} 
void Quadratic::display() { 
    compute(); 
    if (disc == 0) { 
        cout << "Equal Roots..." << endl; 
        x = -b / (2 * a); 
        cout << "Root is...." << x; 
    } else if (disc > 0) { 
        cout << "Real and Distinct Roots..." << endl; 
        x1 = (-b + sqrt(disc)) / (2 * a); 
        x2 = (-b - sqrt(disc)) / (2 * a); 
        cout << "Root 1 is " << x1 << endl; 
        cout << "Root 2 is " << x2 << endl; 
    } else 
        cout << "Imaginary Roots..." << endl; 
} 
void main() { 
    Quadratic q; 
    clrscr(); 
    q.readdata(); 
    q.display(); 
    getch(); 
}

/*
OUTPUT: -

Enter the values for a, b, c (Co-efficient) 
1 4  4 
Equal Roots... 
 
Enter the value for a, b, c (Co-efficient) 
1-5  6 
Root  1  is 3 
Root 2 is 2 
 
Enter the values for a, b, c (Co-efficient) 
2 3  10 
Imaginary Roots... 

*/