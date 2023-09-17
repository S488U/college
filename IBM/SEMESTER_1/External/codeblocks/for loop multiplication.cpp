#include<iostream>
using namespace std;

int main()
{
    int i, n, t;
    cout<<"Enter the limit: ";
    cin>>n;
    cout<<"Enter the table variation: ";
    cin>>t;

    for(i=0; i<=n; i++){
        cout<<t<<"*"<<i<<"="<<t*i<<endl;

    }
    return 0;
}
