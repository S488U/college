#include<iostream>
using namespace std;
int main()
{
 int days;
 cout<<"enter the number of days:";
 cin>>days;
 if(days>0 && days<=5)
 {
  cout<<"per day fine is :.5"<<endl;
  cout<<"total fine is:"<<days*.5<<endl;
 }
  else if(days>=6 && days<=10)
{
 cout<<"per day fine is:1"<<endl;
 cout<<"total fine amount is :"<<days*1<<endl;
}
else if(days>10 && days<=30)
{
 cout<<"per day fine is : 5"<<endl;
 cout<<"total fine amount :"<<days*5<<endl;
}
else{
    cout<<"getlost";
}
return 0;
}














































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































