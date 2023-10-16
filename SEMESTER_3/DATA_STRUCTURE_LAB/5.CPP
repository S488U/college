#include<iostream.h>
#include<conio.h>
#include<iomanip.h>
void getdata();
int a[15], n;
void sort();
void bsearch();

void getdata() {
	int i;
	cout<<"Enter the range: "<<endl;
	cin>>n;
	cout<<"Enter the elements: "<<endl;
	for(i=0;i<n;i++){
		cin>>a[i];
	}
}

void sort() {
	int i, j, temp;
	for(i=0;i<=n-1;i++){
		for(j=0;j<n-i-1;j++)
		if(a[j]>a[j+1]){
			temp=a[j];
			a[j]=a[j+1];
			a[j+1]=temp;
		}
	}
	cout<<"Elements in sorted are: "<<endl;
	for(i=0;i<n;i++)
		cout<<setw(5)<<a[i]<<endl;
}

void bsearch () {
	int key, mid, flag=0, lb=0, ub=n-1;
	cout<<"Enter the elements to search: "<<endl;
	cin>>key;
	lb=0;
	ub=n-1;
	while(lb<=ub){
		mid=(lb+ub)/2;
		if(a[mid]==key){
			flag=1;
			break;
		}
		if(key>a[mid])
			lb=mid+1;
		else
			ub=mid-1;
	}
	if(flag==1) {
		cout<<"Element is found at "<<mid+1<<" position"<<endl;
	} else {
		cout<<"Element is not found."<<endl;
	}
}

void main(){
	clrscr();
	getdata();
	sort();
	bsearch();
	getch();
}