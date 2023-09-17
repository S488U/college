#include<iostream>
using namespace std;
int main()
{
char c;
cout<<"enter the charecter :";
cin>>c;
if(c=='a' || c=='e' || c=='i' || c=='o' || c=='u' || c=='A' || c=='E' || c=='I' || c=='O' || c=='U')
{
cout<<c<<"is a vowel";
}
else
{
cout<<c<<"is not a vowel";
}
return 0;
}
