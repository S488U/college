#include<iostream>
using namespace std;
main()
{
    int age;
    char marital, gender;
    cout<<"Enter maerical status: M as marrid U as unmarid";
    cin>>marital;

    if(marital=='m' || marital=='m')
    {
           cout<<"yopu are eligible for insurence";
    }
    else if (marital == 'u' || marital == 'u')
    {
    cout<<"enter gender (m for male l f for female):";
    cin>>gender;
    cout<<"enter the age: ";
    cin>>age;
    if(((gender =='m' || gender=='m') && age>=30) || ((gender=='f')))
    {
        cout<<"you are eligible for insurance";
    }
    else {
        cout<<"You are not eligible for insurance";
    }
}
}
