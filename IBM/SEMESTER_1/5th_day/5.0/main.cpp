#include <iostream>

using namespace std;

int main()
{

int days;
cout<<"Enter the number of days :";
cin>>days;

if(days>0 && days<=5)
{
    cout<<"per day fine amount is : 0.50"<<endl;
    cout<<"Total Fine Amount is :"<<days*0.50;
}
else if(days>=6 && days<=10)
{
    cout<<"The Fine Amount is : 1";
    cout<<"\nTotal Fine Amount is :"<<days*1;
}
else if(days>=10 && days<=30)
{
    cout<<"The Fine Amount is : 5";
    cout<<"\nTotal Fine Amount is :"<<days*5;
}
else{
    cout<<"your member is cancelled";
}


    return 0;
}
