/*Multiple Inheritance: Write a program to create a class ‘Personnel Information’ which 
includes name, address and gender as the data members. Another class for ‘Physical 
Information’ with data members height, weight, blood group. Derive a class called 
‘Salary’ with employee number, department and salary. Find increment in salary for 
an employee as follows.

*/

#include<iostream.h> 
#include<conio.h> 
#include<string.h> 
 
class personal_info { 
    protected: char name[30]; 
    char gender[30]; 
    char address[30]; 
    public: void get_personal_info() { 
        cout << "enter name,address and gender:" << endl; 
        cin >> name >> address >> gender; 
    } 
    void put_personal_info() { 
        cout << "name=" << name << endl; 
        cout << "address=" << address << endl; 
        cout << "gender=" << gender << endl; 
    } 
}; 
class physical_info { 
    protected: float height, 
    weight; 
    char blood_group[10]; 
    public: void get_physical_info() { 
        cout << "enter height,weight and blood group:" << endl; 
        cin >> height >> weight >> blood_group; 
    } 
    void put_physical_info() { 
        cout << "height=" << height << endl; 
        cout << "weight=" << weight << endl; 
        cout << "blood_group=" << blood_group << endl; 
    } 
}; 
class salary: public personal_info, public physical_info { 
    int emp_no; 
    char department[50]; 
    float salary; 
    public: 
        void get_info() { 
            get_personal_info(); 
            get_physical_info(); 
            cout << "enter the empno,department and salary:" << endl; 
            cin >> emp_no >> department >> salary; 
        } 
    void increment() { 
        if (strcmpi(gender, "male") == 0) { 
            if ((strcmpi(department, "sales") == 0) || (strcmpi(department, "purchase") == 0)) { 
                float inc; 
                inc = salary * 0.1; 
                cout << "increment is:" << inc; 
            } else 
                cout << "no increment"; 
        } else { 
            if ((strcmpi(department, "sales") == 0) || (strcmpi(department, "purchase") == 0)) { 
                float inc; 
                inc = salary * 0.11; 
                cout << "increment is:" << inc; 
            } else 
                cout << "no increment"; 
        } 
    } 
    void put_info() { 
        put_personal_info(); 
        put_physical_info(); 
        cout << "employee number:" << emp_no << endl; 
        cout << "department:" << department << endl; 
        cout << "salary:" << salary << endl; 
    } 
}; 
void main() { 
    clrscr(); 
    salary s; 
    s.get_info(); 
    s.put_info(); 
    s.increment(); 
    getch(); 
}


/*

OUTPUT: -

Enter name, address, and gender:  
Jhons Washington Male 
Enter the height, weight, and blood group: 
5.4  51  O 
Enter the empno, deparment, and salary: 
001 Manager 15000 
Name=Jhons 
Address=Washington 
Gender=Male 
Height=5.4 
Weight=51 
Blood_group=O 
Employee_number=001 
Department=manager 
Salary=15000 
Increment is: 1200

*/