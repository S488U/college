#include<iostream>
using namespace std;

int main()
{
    string a;
    cout<<"Enter a string content : ";

    //we are uing getline to assign a value to the string instead of cin>>a;
    getline(cin,a);
    cout<<"The string content is, "<<a;

    return 0;
}
