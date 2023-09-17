#include <iostream>

using namespace std;

int main()
{
    string firstname="srinivas ";
    string lastname="University";
    cout<<firstname+" "+lastname<<endl;
    string fullname=firstname.append(lastname);
    cout<<fullname<<endl;
    return 0;
}
