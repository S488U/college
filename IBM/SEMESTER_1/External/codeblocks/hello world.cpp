-#include<iostream>
using namespace std;

namespace name1{
    string name;
    int age;

}

namespace name2{
    string name="Sam\n";
    int age=65;
}

using namespace name1;
int main(){
    cout<<"Enter your  name: ";
    cin>>name;
    cout<<"Enter your age: ";
    cin>>age;

    cout<<"Your name is "<<name<<endl;
    cout<<"Your age is "<<age<<endl;

    return 0;
}
