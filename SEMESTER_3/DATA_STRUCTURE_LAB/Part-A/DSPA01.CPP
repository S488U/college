
#include<iostream.h> 
#include<conio.h> 
#include<iomanip.h> 
int i,temp,j,n,a[15]; 
class select
{
public: void getdata();
void sort(); 
void display();
};
void select::getdata()
{
cout<<"Enter the range: "<<endl; 
cin>>n;
cout<<"Enter the element:"<<endl; 
for(i=0;i<n;i++)
cin>>a[i];
}
void select::sort()
{
int i,j,pos,temp; 
for(i=0;i<=n-1;i++)
{
pos=i;
for (j=i+1; j<=n-1;j++) 
if(a[j]<=a[pos])
{
pos=j; 
 }
temp=a[i]; 
a[i]=a[pos]; 
a[pos]=temp;
}
}
void select::display()
{
}
void main()
{
cout<<" Elements in sorted are:"<<endl; 
for(i=0;i<n;i++)
cout<<a[i]<<endl;
select s; 
clrscr();
s.getdata();
s.sort();
s.display();
getch();
}