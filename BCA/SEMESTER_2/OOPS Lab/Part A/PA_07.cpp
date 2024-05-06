/*Create a class containing the following data members Register No,Name and Fees. 
Also create a member function to read and display the data using the concept of 
pointers to object.

*/

#include <iostream.h>
#include <conio.h>
#include <string.h>

class student
{
    int regno;
    char name[10];
    double fees;

public:
    void getdata(int r, char n[10], double f)
    {
        regno = r;
        strcpy(name, n);
        fees = f;
    }
    void show()
    {
        cout << "register number = " << regno << endl;
        cout << "name = " << name << endl;
        cout << "Fees = " << fees;
    }
};
main()
{
    student *s = new student[1];
    clrscr();
    s->getdata(011, "Rahul", 12500);
    s->show();
    getch();
    return 0;
}

/*
OUTPUT: -

Register number = 011 
Name = Rahul 
Fees = 12500

*/