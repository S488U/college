#include<iostream>
using namespace std;

int main()
{
    string a="Good afternoon";
    cout<<a<<endl;

    string firstName="Shahabas";
    string lastName="Abdul Hameed";
//  cout<<firstName+" "+lastName;
    string fullName=firstName.append(lastName);
    cout<<fullName<<endl;

//    //string access
//    string name="My name";
//    cout<<name<<endl;
//    name[4]='e';
//    cout<<name;

    string str;
    cout<<"Enter the string: ";
    cin>>str;
    cout<<"String is: "<<str<<endl;
//  cout<<"Enter the string "<<endl;
    getline(cin,str);
    return 0;
}
