#include<iostream>
using namespace std;

int main(){
    int i=1,m, n;
    cout<<"Enter the limit: ";
    cin>>n;
    cout<<"Enter the table variable: ";
    cin>>m;

    do {
        if(i%m==0)
        cout<<"\n"<<i<<"*"<<m<<"="<<n;
        i++;
    }
    while(i<=n);

    return 0;
}
