#include<iostream.h>
#include<conio.h>
#include<iomanip.h>

int i, temp, j, n, a[15];

class insert{
	public:
		void getdata();
		void sort();
		void display();
};

void insert::getdata() {
	cout<<"Enter the range: "<<endl;
	cin>>n;
	cout<<"Enter the element: "<<endl;
	for(i=0; i<n; i++)
		cin>>a[i];
}

void insert::sort() {
	for(i=1;i<=n-1;i++){
		temp=a[i];
		j=i-1;
		while(j>=0 && (a[j]>temp)){
			a[j+1]=a[j];
			j--;
		}
		a[j+1]=temp;
	}
}

void insert::display() {
	cout<<"Sorted Elements are : "<<endl;
	for(i=0;i<n;i++)
		cout<<a[i]<<endl;
}

void main() {
	insert t;
	clrscr();
	t.getdata();
	t.sort();
	t.display();

	getch();
}