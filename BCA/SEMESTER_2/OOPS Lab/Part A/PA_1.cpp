// Write a C++ program to create a class with data members like principle amount,time
// and rate of interest. Create a member function to accept data values,to compute
// simple interest and to display the result.

#include <iostream.h>
#include <conio.h>
class SI
{
    int amount;
    float rate;
    int time;
    float result;

public:
    void getdata();
    void computeSI();
    void display();
};
void SI::getdata()
{
    cout<<"Enter Principle Amount: ";
    cin>>amount;
    cout<<"Enter Rate of Interest: ";
    cin>>rate;
    cout<<"Enter time period(in years): ";
    cin>>time;
}
void SI::computeSI()
{
    result = amount * rate * time / 100;
}
void SI::display()
{
    cout<<"The Simple Interst is: "<<result;
}
int main()
{
    SI si;
    clrscr();
    si.getdata();
    si.computeSI();
    si.display();
    getch();
    return 0;
}

/*

OUTPUT: -

Enter Principle Amount: 1000
Enter Rate of Interest: 5
Enter time period(in years): 2
The Simple Interest is: 100

*/