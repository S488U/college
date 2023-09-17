#include<iostream>
using namespace std;

int main()
{
    char c;
    cout<<"  Enter the Charcter: ";
    cin>>c;
    if(c=='a' || c=='e' || c=='i' || c=='o' || c=='u' || c=='A' || c=='E' || c=='I' || c=='O' || c=='U') {
        cout<<"  "<<c<<" is a vowel";
        cout<<"\n";
    } else {
        cout<<"  "<<c<<" is not a vowel";
        cout<<"\n";
    }

    return 0;
}
