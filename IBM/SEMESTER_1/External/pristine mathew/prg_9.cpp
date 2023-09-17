#include<iostream>
using namespace std;
int main()
{
    int m;
    cout<<"ENTER A NUMBER(1-12)";
    cin>>m;
    switch(m)
    {
    case 1:



    case 3:

    case 5:

    case 7:

    case 8:

    case 10:

    case 12:
        cout<<m<<"this month has 31 days";
        break;
    case 2:
        cout<<"february has 28-29 days";
        break;

    case 4:
    case 6:
    case 9:
    case 11:
        cout<<m<<"this month has 30 days";
        break;


    }
    return 0;
}
