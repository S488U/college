/*Write a C++ program to perform the addition and subtraction of two complex 
numbers using member functions.
*/

#include<iostream.h> 
#include<conio.h> 
 
class complex { 
    int real, img; 
    public: 
        void getdata(); 
    void putdata(); 
    void add(complex, complex); 
    void sub(complex, complex); 
}; 
void complex::getdata() { 
    cout << endl << "Enter the Real part:"; 
    cin >> real; 
    cout << endl << "Enter the Imaginary part:"; 
    cin >> img; 
} 
void complex::putdata() { 
    cout << real; 
    if (img >= 0) { 
        cout << "+" << img << "i"; 
    } else 
        cout << img << "i"; 
} 
void complex::add(complex c1, complex c2) { 
    real = c1.real + c2.real; 
    img = c1.img + c2.img; 
} 
void complex::sub(complex c1, complex c2) { 
    real = c1.real - c2.real; 
    img = c1.img - c2.img; 
} 
void main() { 
    clrscr(); 
    complex c1, c2, c3; 
    cout << endl << "Enter the First complex number:"; 
    c1.getdata(); 
    c1.putdata(); 
    cout << endl << "Enter the Second complex number:"; 
    c2.getdata(); 
    c2.putdata(); 
    cout << endl << "Sum of the complex numbers is:"; 
    c3.add(c1, c2); 
    c3.putdata(); 
    cout << endl << "Difference of the complex numbers is:"; 
    c3.sub(c1, c2); 
    c3.putdata(); 
    getch(); 
} 

/*
OUTPUT: -

Enter the First complex number:
Enter the Real part:2
Enter the Imaginary part:3
2+3i
Enter the Second complex number:
Enter the Real part:1
Enter the Imaginary part:2
1+2i
Sum of the complex numbers is:3+5i
Difference of the complex numbers is:1+1i

*/