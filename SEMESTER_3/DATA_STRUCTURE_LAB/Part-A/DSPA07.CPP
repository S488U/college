
#include<conio.h>
#include<iostream.h> 
#include<stdio.h> 
#include<stdlib.h> 
void main() 
{
int n,i,*arr,max,min; 
clrscr();
cout<<"Enter size of the array: "<<endl; 
cin>>n;
arr = (int*) calloc(n, sizeof(int));
cout<<"Enter the array elements: "<<endl; 
for(i = 0; i < n; i++) 
{
cin>>arr[i];
}
min = arr[0];
for(i = 0; i < n; i++) 
{
if(min > arr[i]) 
{
min = arr[i];
}
}
max = arr[0];
for(i = 0; i < n; i++) 
{
if(max < arr[i]) 
{
max = arr[i];
}
}
cout<<"Maximum and minimum number in the array are: "<< max<<"and "<< min; 
getch();
}