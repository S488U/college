#include<iostream.h>
#include<conio.h>
#include<stdio.h>
#include<stdlib.h>

void main() {
	int n, i, *arr, max, min;
	clrscr();
	cout<<"Enter the size of the array: ";
	cin>>n;
	arr=(int*) calloc(n, sizeof(int));
	cout<<"Enter the array elements: "<<endl;
	for(i=0;i<n;i++) {
		cin>>arr[i];
	}

	min=arr[0];
	for(i=0;i<n;i++){
		if(min>arr[i]) {
			min=arr[i];
		}
	}

	max=arr[1];
	for(i=0;i<n;i++){
		if(max<arr[i]){
			max=arr[i];
		}
	}

	cout<<"Maximum and Minimun numbers in the array are: "<<max<<" and "<<min<<".";
	getch();
}