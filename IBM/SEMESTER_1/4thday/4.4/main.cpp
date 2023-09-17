#include <iostream>

using namespace std;

int main()
{
    float hra,da,bs,gs;
    cout<<"Enter your salary"<<endl;
    cin>>bs;

    if(bs>=1500)
    {

      hra=bs*10/100;
      da=bs*90/100;
    }
else{

  hra=500;
  da=bs*98/100;


    }
      gs=bs+hra+da;
  cout<<"basic salary :"<<bs<<endl;
   cout<<"hra         :"<<hra<<endl;
    cout<<"da         :"<<da<<endl;
     cout<<"___________________"<<endl;
      cout<<"gs       :"<<gs<<endl;


    return 0;
}
