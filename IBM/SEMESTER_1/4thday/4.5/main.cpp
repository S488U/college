#include <iostream>

using namespace std;                                                   //A company insures its drivers in the following cases:
                                                                        //a.If the driver is married
int main()                                                               //b.if the driver is unmarried,male& above 30year of age.
{                                                                     //If the driver is unmarried, female &above 25 year of age
    char gender,marital;
    int age;
    cout << "Enter your marital status :  M or U :" ;
    cin>>marital;


    if(marital=='M' || marital=='m')
    {
        cout<<"your eligible for insurence"<<endl;
    }
    else if(marital=='U' || marital=='u')
    {
        cout<<"Enter your Gender  male is M or female is F:"<<endl;
        cin>>gender;
        cout<<"Enter the age :"<<endl;
        cin>>age;
        if(((gender=='M' || gender=='m')&&age>=30) || ((gender=='F' || gender=='f')&&age>=25))
        {
            cout<<"You're Eligible for insurance"<<endl;
        }
        else
        {
            cout<<"You're Not Eligible for Insurance"<<endl;
            cout<<"or"<<endl;
            cout<<"Invalid Gender Input"<<endl;
        }
    }
      else
      {
          cout<<"Invalid Marital Input"<<endl;
      }
    return 0;
}
