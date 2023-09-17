#include<iostream>
using namespace std;
int main()
{
    int m;
    cout<<"enter the month in number (1 - 12):";
    cin>>m;
    switch(m)
    {
    case 1:
        cout<<"january";
        break;
    case 2:
        cout<<"february";
        break;
    case 3:
        cout<<"march";
        break;
    case 4:
        cout<<"april";
        break;
    case 5:
        cout<<"may";
        break;
    case 6:
        cout<<"june";
        break;
    case 7:
        cout<<"july";
        break;
    case 8:
        cout<<"august";
        break;
    case 9:
        cout<<"september";
        break;
    case 10:
         cout<<"october";
         break;
    case 11:
         cout<<"november";
         break;
    case 12:
        cout<<"december";
        break;
    }
    return 0;
}
