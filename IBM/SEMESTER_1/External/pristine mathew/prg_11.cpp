#include<iostream>
using namespace std;
int main()
{
    float bs,gs,da,hra;
    cout<<"enter the basic pay salary";
    cin>>bs;
    if(bs<1500)
    {
        hra=bs*10/100;
        da=bs*90/100;
    }
    else
    {
        hra=500;
        da=bs*98/100;
    }
    gs=bs+hra+da;
    cout<<"GS ("<<gs<<")"<<"="<<da<<"+"<<hra<<"+"<<da<<endl;
    cout<<"the gross salary is:"<<gs<<endl;
    cout<<"the basic pay is: "<<bs<<endl;
    cout<<"hra is: "<<hra<<endl;
    cout<<"dearence allowence :"<<da<<endl;
    return 0;
}
