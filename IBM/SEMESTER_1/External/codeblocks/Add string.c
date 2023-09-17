#include<iostream>
using namespace std;

int main()
{
    string str;
    cout<<"Enter the string: ";
    cin>>str;
    str.push_back('r');
    str.pop_back();
    cout<<str<<endl;

    return 0;

}
