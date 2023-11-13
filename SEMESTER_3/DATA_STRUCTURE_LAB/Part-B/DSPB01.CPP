#include<iostream.h>
#include<conio.h>
#include<iomanip.h>
void mergesort(int a[],int,int);
void mergearray(int a[],int,int,int);
int a[20],n;
void main()
{
int i,low,high,mid;
clrscr();
cout<<"Enter the range: "<<endl;
cin>>n;
cout<<"Enter the elements: "<<endl;
for(i=0;i<n;i++)
cin>>a[i];
low=0;
high=n-1;
mergesort(a,low,high);
cout<<"The sorted array is: "<<endl;
for(i=0;i<n;i++)
cout<<a[i]<<endl;
getch();
}
void mergesort(int a[],int low,int high)
{
int mid;
if(low<high)
{
mid=(low+high)/2;
mergesort(a,low,mid);
mergesort(a,mid+1,high);
mergearray(a,low,mid,high);
}
}
void mergearray(int a[],int low,int mid,int high)
{
int c[20],i,j,k;
i=low;
j=mid+1;
k=low;
while((i<=mid)&&(j<=high))
if(a[i]<a[j])
c[k++]=a[i++];
else
Lab on Data Structure Using C++
III Sem BCA Page | 16
c[k++]=a[j++];
while(i<=mid)
c[k++]=a[i++];
while(j<=high)
c[k++]=a[j++];
for(i=low;i<=high;i++)
a[i]=c[i];
}
