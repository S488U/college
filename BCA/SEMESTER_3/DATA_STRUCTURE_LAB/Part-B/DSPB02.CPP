#include <iostream.h>
#include <conio.h>
#include <iomanip.h>
int a[50], n;
int partition(int a[], int, int);
void quicksort(int a[], int, int);
void main()
{
    clrscr();
    int i;
    cout << "Enter the range: " << endl;
    cin >> n;
    cout << "Enter the elements: " << endl;
    for (i = 0; i < n; i++)
        cin >> a[i];
    quicksort(a, 0, n - 1);
    cout << "Element in sorted order are: " << endl;
    for (i = 0; i < n; i++)
        cout << a[i] << endl;
    getch();
}
void quicksort(int a[], int low, int high)
{
    int loc;
    if (low < high)
    {
        loc = partition(a, low, high);
        quicksort(a, low, loc - 1);
        quicksort(a, loc + 1, high);
    }
}
int partition(int a[], int low, int high)
{
    int pivot, i, j, temp;
    pivot = a[low];
    i = low + 1;
    j = high;
    while (i < high && pivot >= a[i])
        i++;
    while (pivot < a[j])
        j--;
    if (i < j)
    {
        temp = a[i];
	a[i] = a[j];
        a[j] = temp;
    }
    else
    {
        temp = a[low];
        a[low] = a[j];
        a[j] = temp;
    }
    return (j);
}
