#include<iostream>
using namespace std;
int main()
{
string str="jaffar idukki";
string::iterator it;
for (it=str.begin();it!=str.end();it++)
cout<<*it<<endl;
cout<<*it<<endl;
cout<<"---------------------"<<endl;
string::reverse_iterator it1;
for(it1=str.rbegin();it1!=str.rend();it1++)
    cout<<*it1<<endl;
return 0;
}
