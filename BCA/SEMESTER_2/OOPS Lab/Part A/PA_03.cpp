/*Write a C++ program to calculate the volume of cube,cylinder and cuboid using 
function overloading.
*/

#include<iostream.h> 
#include<conio.h> 
 
const float PI = 3.14; 
class shape { 
    public: void volume(int); 
    void volume(double, double); 
    void volume(int, int, int); 
}; 
void shape::volume(int s) { 
    int vc = s * s * s; 
    cout << "The Volume of a Cube is: " << vc; 
} 
void shape::volume(double r, double h) { 
    double vcl = PI * r * r * h; 
    cout << endl << "The Volume of Cylinder is: " << vcl; 
} 
void shape::volume(int l, int b, int h) { 
    int vcd = l * b * h; 
    cout << endl << "The Volume of a Cuboid is: " << vcd; 
} 
int main() { 
    shape s; 
    clrscr(); 
    s.volume(5); 
    s.volume(5.1, 2.5); 
    s.volume(2, 3, 4); 
    getch(); 
    return 0 
}

/*
OUTPUT: -

The Volume of a Cube is: 125
The Volume of Cylinder is: 199.115
The Volume of a Cuboid is: 24

*/