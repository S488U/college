#include<iostream>
using namespace std;

int main()
{
    char oper;
    float numl, num2;
    cout<<"enter an opertor (+, -. *, /): ";
    cin>>oper;
    cout<<" enter thwo numbers "<<endl;
    cin>> num1 >> num2;

    switch(oper)
    {
    case '+':
        cout<< num1 <<"+" << num2<<"="<<num1+num2;
        break;
    case '*':
        cout<< num1 <<"-" <<num2 <<"="<<num1-num2;
    case'*':
        cout<< num1 <<"*" ,num2<<"="<<num1*num2;
        break;
    case'/':
        cout<< num1 <<"/" << num2<<"="<<num1/num2;
        break;
        default: cout<<"error, the operator is not corruct";
        break;

    }
    return 0;
