#include <iostream>
using namespace std;

namespace name1{

string name="srinivas1";
int age=19;

 }
 namespace name2{

string name="srinivas2";
int age=22;

 }

using namespace name1;




int main(){

string name1;

    cout<< "Name is :"<<name1::name<<endl;
    cout<<"Age :"<<age<<endl;
    cout<< "Name is :"<<name2::name<<endl;
    cout<<"Age :"<<age<<endl;

    return 0;


}
