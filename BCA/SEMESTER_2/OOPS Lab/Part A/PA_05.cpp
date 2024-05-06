/*Write an object oriented program in C++ to create a library information system
containing the following for a book in the library: Accession number,Author
name,Title of book,Year of production,Publisher’s name,cost of the book. Define a
class with data members and suitable member functions for initializing and for
destroying the data via constructor and destructor.
*/

#include <iostream.h>
#include <conio.h>

class library
{
    int accno, price, yop;
    char author[15], title[20], pub[20];

public:
    void putdata();
    library();
    ~library()
    {
        cout << endl<< "Object is Destroyed";
    }
};
library::library()
{
    cout << endl
         << "Enter the accno,author,title,publisher,year of publishing and price:" << endl;
    cin >> accno >> author >> title >> pub >> yop >> price;
}
void library::putdata()
{
    cout << endl<< "Accno=" << accno;
    cout << endl<< "Author=" << author;
    cout << endl<< "Title=" << title;
    cout << endl<< "Publisher=" << pub;
    cout << endl<< "Year of publishing=" << yop;
    cout << endl<< "Price=" << price;
}
void main()
{
    clrscr();
    int n, i;
    cout << endl
         << "Enter the number of Books:";
    cin >> n;
    for (i = 0; i < n; i++)
    {
        cout << endl<< "Enter the details of Book:" << i + 1;
        library l;
        cout << endl<< "Details of Book:" << i + 1;
        l.putdata();
    }
    getch();
}

/*
OUTPUT: -

Enter the number of Books:2 
Enter the Details of Book:1 
Enter the accno,author,title,publisher,year of publishing and 
price:101 Hari car dcbooks 2010 400 
Details of Book:1 
Accno=101 
Author=Hari 
Title=car 
Publisher=dcbooks 
Year of Publishing=2010 
Price=400 
Object is Destroyed 
Enter the Details of Book:2 
Enter the accno,author,title,publisher,year of publishing and 
price:102 Jacob bike acbooks 2011 550 
Details of Book:1 
Accno=102 
Author=Jacob 
Title=car 
Publisher=acbooks 
Year of Publishing=2011

*/