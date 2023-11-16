#include <iostream.h>
#include <conio.h>
#include <stdlib.h>
#include <process.h>
#include <iomanip.h>
struct list
{
    int data;
    struct list *link;
};
typedef struct list *NODE;
NODE getnode();
void insertRear();
void deleteFront();
void displayNodes();
NODE front = NULL, rear = NULL;
void main()
{
    int ch;
    clrscr();
    do
    {
        cout << endl
             << "Queue using linked list are: " << endl;
        cout << "1.Insert" << endl;
        cout << "2.delete" << endl;
        cout << "3.Display" << endl;
        cout << "4.Exit" << endl;
        cout << "Enter the choice: " << endl;
        cin >> ch;
        switch (ch)
        {
        case 1:
        {
            insertRear();
            break;
        }
        case 2:
        {
            deleteFront();
            break;
        }
        case 3:
            displayNodes();
            break;
        case 4:
            exit(0);
        default:
            cout << "Invalid choice";
        }
    } while (ch <= 4);
    getch();
}
NODE getnode()
{
    NODE x;
    x = (NODE)malloc(sizeof(NODE));
    return x;
}
void insertRear()
{
    NODE temp;
    int num;
    temp = getnode();
    cout << "Enter the number to be inserted: ";
    cin >> num;
    temp
        ->data = num;
    temp
        ->link = NULL;
    if (front == NULL)
    {
        front = rear = temp;
    }
    else
    {
        rear
            ->link = temp;
        rear = temp;
    }
}
void deleteFront()
{
    NODE temp;
    if (front == NULL)
    {
        cout << "Linked list is empty";
    }
    else
    {
        temp = front;
	cout << "The deleted element is: " << front->data;
        if (front == rear)
        {
            front = rear = NULL;
        }
        else
        {
            front = front->link;
        }
        free(temp);
    }
}
void displayNodes()
{
    NODE temp;
    if (front == NULL)
    {
        cout << "Linked list is empty";
    }
    else
    {
        temp = front;
        cout << "The element is the list are: ";
        while (temp != NULL)
        {
            cout << temp->data << "->";
            temp = temp->link;
        }
        cout << "NULL";
    }
}