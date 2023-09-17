#include <iostream>

using namespace std;

int main()
{
    int n,i,total=0;
    cout<<"\n Enter the limit ";
    cin>>n;

    for(i=1;i<=n;i++)
    {
        total=total+1;
    }
    cout << "\n sum of n number is" <<total<<endl;
    return 0;
}
