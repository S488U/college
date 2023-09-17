#include<iostream>
using namespace std;

int main()
{
    int n, i, total=0;
    cout<<"Enter the limit: ";
    cin>>n;

    for(i=1;i<=n;i++){
        total=total+i;
    }
    cout<<"Sum of N number is: "<<total;
    return 0;
}
