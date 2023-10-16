#include<iostream.h>
#include<conio.h>
#include<iomanip.h>

void main() {
	int a[20], i, j, n, pos, key, flag=0;
	clrscr();
	cout<<"Enter the range: " <<endl;
	cin>>n;
	cout<<"Enter the elements: "<<endl;
	for(i=0;i<n;i++)
		cin>>a[i];
		cout<<"Enter the element to search: "<<endl;
		cin>>key;
	for(i=0;i<n;i++)
		if(key==a[i]){
			flag=1;
			pos=i;
			break;
		}
		if(flag==1) {
			cout<<"The element found in position "<<pos<<endl;
		} else{
			cout<<"The element is not found in the list"<<endl;
		}
	getch();

}