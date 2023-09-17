#include <iostream>

using namespace std;

int main()
{
   int t,n,i;
   cout<<"Enter a number : "<<endl;
   cin>>n;
   cout<<"Enter the table :"<<endl;
   cin>>t;

   for(i=1;i<=n;i++)
   {



       cout<<t<<"*"<<i<<"="<<t*i<<endl;
       }

    return 0;
}
