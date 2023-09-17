#include<iostream>
using namespace std;

int main()
{
    string str;
    cout<<"Enter a string: ";
    getline(cin,str);
    cout<<str<<endl;
    cout<<"size     : "<<str.size()<<endl;
    cout<<"length   : "<<str.length()<<endl;

    return 0;
}
