#include<iostream>
using namespace std;

void myFunction(){
    cout<<"Worked\n";
}

int main(){

    if(myFunction){
        cout<<"worked";
    } else {
        cout<<"Not working";
    }
    return 0;
}
