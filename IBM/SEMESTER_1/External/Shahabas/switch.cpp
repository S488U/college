#include<iostream>
using namespace std;

int main(){
    int a;
    cout<<"Enter a number: ";
    cin>>a;


    switch(a){
        case 1: "31 days";
        case  3: "31 days";
        case 5: "31 days";
        case 7: "31 days";
        case 8: "31 days";
        case 10: "31 days";
        case 12: "31 days";
                cout<<"These months are 31 days"<<endl;
                break;

        case 4: "Days 30";
        case 6: "Days 30";
        case 9: "Days 30";
        case 11: "Days 30";
        cout<<"these months are 30 days."<<endl;

        default:
            cout<<"Invalid"<<endl;
            break;
    }


    return 0;
}
