#include<iostream.h>
#include<conio.h>
#include<iomanip.h>
#include<stdlib.h>
#include<process.h>
struct list
{
int data;
struct list*link;
};
typedef struct list*NODE;
NODE getnode();
NODE insert_front(NODE,int);
NODE delete_front(NODE);
void display(NODE);
void main()
{
NODE first=NULL;
int ch,num;
clrscr();
do
{
cout<<"Stack using linked list are: "<<endl;
cout<<"1.Insert"<<endl;
cout<<"2.Delete"<<endl;
cout<<"3.Display"<<endl;
cout<<"4.Exit"<<endl;
cout<<"Enter your choice: "<<endl;
cin>>ch;
switch(ch)
{
case 1:
{
cout<<"Enter the elements to be inserted: "<<endl;
cin>>num;
first=insert_front(first,num);
break;
}
case 2:
{
first=delete_front(first);
break;
}
case 3:{
display(first);
break; }
case 4: {
exit(0); }
default: {
cout<<"Invalid Choice"<<endl; }}}
while(ch<=4);
getch(); }
NODE getnode() {
NODE x;
x=(NODE)malloc(sizeof(NODE));
return(x); }
NODE insert_front(NODE first,int num) {
NODE temp;
temp=getnode();
temp
->data=num;
temp
->link=first;
return temp; }
NODE delete_front(NODE first) {
NODE temp;
if(first==NULL) {
cout<<"List is empty"<<endl;
return(first); }
temp=first;
temp=temp
->link;
cout<<"The deleted element is: "<<first
->data<<endl;
free(first);
return(temp); }
void display(NODE first) {
NODE temp;
if(first==NULL)
{
cout<<"List is empty";
return;
}
cout<<"Element in the list are "<<endl;
temp=first;
cout<<"The element in the list are: ";
while(temp!=NULL)
{
cout<<temp->data<<"-->";
temp=temp->link;
}
cout<<"NULL"<<endl;
}
