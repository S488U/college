#include<iostream>
using namespace std;

int main()
{
    string A="Shahabas";
    string B="Abdul Hameed";
    cout<<"Before A is "<<A<<endl;
    cout<<"After B is "<<B<<endl;
    A.swap(B);
    cout<<"After swap, A is "<<A<<endl;
    cout<<"After swap, B is "<<B<<endl;
    return 0;

}
