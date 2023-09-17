// C++ program to illustrate
// Linear Search
#include <iostream>
using namespace std;

void findElement(int arr[], int size, int key)
{
	// loop to traverse array and search for key
	for (int i = 0; i < size; i++) {
		if (arr[i] == key) {
			cout << "Element found at position: " << (i + 1);
		}
	}
}

// Driver program to test above function
int main()
{
	int arr[] = { 1, 2, 3, 4, 5, 6 };
	int n = 6; // no of elements
	int key;
//	int key = 3; // key to be searched
    cout<<"Enter the key: ";
    cin>>key;
	// Calling function to find the key
	findElement(arr, n, key);

	return 0;
}

