#include<iostream>
using namespace std;
int main()
{
    int age;
    char maritial,gender;
    cout<<"enter maritial status: (M for married & U for unmarried)";
    cin>>maritial;
    if(maritial=='m'|| maritial=='M')
    {
        cout<<" you are eligible ";
    }
    else if(maritial=='u' || maritial=='U')
    {cout<<"enter gender( M for male & F for female";
    cin>>gender;
    cout<<"enter your age";
    cin>>age;
    }
    if(((gender=='m' || gender=='M')&& age>=30) || ((gender=='f' || gender=='F')&& age>=25))
      {

    cout<<"you are eligible for insurence";
      }
       return 0;


}
