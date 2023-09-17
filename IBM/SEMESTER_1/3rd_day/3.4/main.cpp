#include <iostream>

using namespace std;
.
int main()
{
   string a="ram";
   string b="sam";
   cout<<"before a : "<<a<<endl;
   cout<<"before b : "<<b<<endl;
   a.swap(b);
   cout<<"after a : "<<a<<endl;
   cout<<"after b : "<<b<<endl;


    return 0;
}
