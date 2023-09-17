#include<iostream>
using namespace std;

int  main(){
    int a,b;
    cout<<"Enter the value for A &  B: ";
    cin>>a>>b;
    if(a>b){
        cout<<a<<" is Greater number.";
    }
    if(b>a){
        cout<<b<<" is Greater number.S";
    }
    if(b==a){
        cout<<a<<" and "<<b<<" are equal. ";
    }

    return 0;
}
