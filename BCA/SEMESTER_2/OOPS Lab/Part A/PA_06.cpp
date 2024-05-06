/*Create a class rectangle with length,breadth and area. Create another class cuboid
that inherits rectangle and has additional members height and volume. Use single
inheritance property.
*/

#include <iostream.h>
#include <conio.h>

class rectangle
{
    float l, b, area1;

public:
    void getdata();
    void putdata();
    float rarea();
};
class cuboid : public rectangle
{
    float h, area2;

public:
    void getdatac();
    void putdatac();
    float carea();
};
void rectangle::getdata()
{
    cout << endl<< "Enter the length:";
    cin >> l;
    cout << endl<< "Enter the breadth:";
    cin >> b;
}
void rectangle::putdata()
{
    cout << endl<< "Lenghth=" << l << endl<< "Breadth=" << b << endl<< "Area=" << rarea();
}
float rectangle::rarea()
{
    area1 = l * b;
    return area1;
}
void cuboid::getdatac()
{
    cout << endl<< "Enter the height:";
    cin >> h;
}
void cuboid::putdatac()
{
    cout << endl << "The height is:" << h << endl<< "Area is:" << carea();
}
float cuboid::carea()
{
    area2 = rarea() * h;
    return area2;
}
void main()
{
    clrscr();
    cuboid c;
    c.getdata();
    c.putdata();
    c.getdatac();
    c.putdatac();
    getch();
}

/*
OUTPUT: -

Lenghth=12
Breadth=10
Area=120
Enter the height:20
The height is:20
Area is:2400

*/