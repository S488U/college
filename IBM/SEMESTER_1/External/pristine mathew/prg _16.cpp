#include<iostream>
using namespace std;
int main()
{
    int i,n,t;
    cout<<"\n enter the limit :";
    cin>>n;
    cout<<"\n enter the table :";
    cin>>t;
    for(i=1; i<=n; i++)
    {
        cout<<t<<"*"<<i<<"="<<t*i<<endl;
    }
    return 0;
}
