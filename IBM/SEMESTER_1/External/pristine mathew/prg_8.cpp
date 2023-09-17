#include<iostream>
using namespace std;
int main()
{
    /*int h,t;
    float c;
    cout<<"enter hardness,carbon,tensilestrength";
    cin>>h>>c>>t;
    if(h>50&&c<0.7&&t>5600)
    {
     cout<<"grade is 10";*/

    char gender;
    int age;
    cout<<"enter your age :";
    cin>>age;
    if(age>=18)
    {
        cout<<"enter your gender :";
        if(gender=='m' || gender=='M')
        {
            cout<<"GO  TO  HELLLLLLL MANN!!!!!!!";
        }
        else if(gender=='f' || gender=='F')
        {
            cout<<"COME ON BABY OYYAAAAHH!!!!";
        }
        else
        {
            cout<<"THIS IS WRANGGG WRANGG!!!!";
        }
    }
    else
    {
        cout<<"GO HAVE SOME MILK DUDE";
    }
    return 0;
}
