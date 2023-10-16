#include<iostream.h>
#include<conio.h>
#include<iomanip.h>
void towers(int, char, char, char);
void main() {
	int n;
	clrscr();
	cout<<"Enter the numbers: "<<endl;
	cin>>n;
	towers(n, 'A', 'B','C');
	getch();
}

void towers(int n, char start, char aux, char last) {
	if(n==1) {
		cout<<"Move disk 1 from "<<start<<" to "<<last<<endl;
		return;
	}
	towers(n-1, start, last, aux);
	cout<<"Move disk "<<n<<" from "<<start<<" to "<<last<<endl;
	towers(n-1, aux, start, last);
}