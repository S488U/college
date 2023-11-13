#include<iostream.h>
#include<conio.h>
#include<iomanip.h>
#include<stdlib.h>
#define size 5
class stack
{
private:
int s[size],n,i,top;
public:
stack();
void push();
void pop();
void display();
};
stack::stack()
{
top=-1;
}
void stack::push()
{
if(top>=size-1)
{
cout<<"STACK IS OVERFLOW"<<endl;
return;
}
top++;
cout<<"Enter the element: "<<endl;
cin>>n;
s[top]=n;
}
void stack::pop()
{
if(top==-1)
{
cout<<"STACK IS UNDERFLOW"<<endl;
return;
}
n=s[top];
top--;
cout<<"THE DELETED ELEMENT IS: "<<n<<endl;
}
void stack::display()
{

if(top==
-1)
{
cout<<"STACK IS EMPTY"<<endl;
return; }
cout<<"STACK ELEMENTS ARE: "<<endl;
for(i=top;i>=0;i--
)
cout<<s[i]<<endl; }
void main() {
stack s;
clrscr();
int ch;
do{
cout<<"STACK MENU"<<endl;
cout<<"1.Push"<<endl;
cout<<"2.Pop"<<endl;
cout<<"3.Display"<<endl;
cout<<"4.Exit"<<endl;
cout<<"Enter the choice: "<<endl;
cin>>ch;
switch(ch) {
case 1: {
s.push();
break; }
case 2
:
{
s.pop();
break; }
case 3: {
s.display();
break; }
case 4: {
exit(0); }
default: {
cout<<"INVALID INPUT"<<endl; }
}
}
while(ch<=4);
getch();
}
