#include<iostream>
using namespace std;

int main(){
    int n, sum=0,t,r;
    for(int i=100;i<=999;i++)
    {
        n=i;
        while(n>i)
        {
            r=n%10;
            sum=sum+(r*r*r);
            n=n/10;
        }
        if(sum==i)
        {
            cout<<i<<endl;
        }
        sum=0;
    }
    return 0;
}

