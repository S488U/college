#include<conio.h>
#include<iomanip.h>

int i, temp, j, n, a[15];

class bubble{
	public:
		void getdata();
		void sort();
		void display();
};

void bubble::getdata() {
	cout<<"Enter the range: "<<endl;
	cin>>n;
	cout<<"Enter the element: "<<endl;
	for(i=0; i<n; i++)
		cin>>a[i];
}

void bubble::sort() {
    int i, j, temp;
    for(i=1 ;i<=n-1; i++) {
	for(j=0; j<=n-i-1;j++)
	    if(a[j] > a[j+1]) {
		temp = a[j];
		a[j] = a[j+1];
		a[j+1]=temp;
            }
    }
}

void bubble::display() {
	cout<<"Sorted Elements are : "<<endl;
	for(i=0;i<n;i++)
		cout<<a[i]<<endl;
}

void main() {
	bubble t;
	clrscr();
	t.getdata();
	t.sort();
	t.display();

	getch();
}