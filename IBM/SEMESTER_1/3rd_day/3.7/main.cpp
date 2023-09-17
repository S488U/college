#include <iostream>

using namespace std;

int main()
{
  int t,b;
  float i;
  cout<<"enter the pen top quality"<<endl;
  cin>>t;
   cout<<"enter the pen body quality"<<endl;
  cin>>b;
   cout<<"enter the pen ink quantity"<<endl;
  cin>>i;

  if(t>50 && b>60 && i>1.7)
  {
      cout<<"the pen grade is 10"<<endl;
  }
  else if(t>45 && b>50 && i>1.5)
  {
      cout<<"the pen grade is 5"<<endl;
  }
  else
  {
      cout<<"the pen quility is bad!";
  }

    return 0;
}
