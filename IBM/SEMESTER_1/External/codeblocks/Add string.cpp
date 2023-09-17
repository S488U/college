#include<iostream>
using namespace std;

int main()
{
    string str;
    cout<<"Enter the string: ";
    cin>>str;
    //push_back is using for adding a letter in string.
    str.push_back('r');

    //pop_back is using for deleting a character from the string.
    str.pop_back();
    cout<<str<<endl;

    return 0;

}
