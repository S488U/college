#include<iostream>
using namespace std;
int main()
{
    int h,t;
    float c;
    cout<<"enter hardness,carbon,tensilestrength";
    cin>>h>>c>>t;
if(h>50&&c<0.7&&t>5600)
 {
     cout<<"grade is 10";
 }
 return 0;
}
