#include <iostream.h>
#include <conio.h>
#include <iomanip.h>
#include <stdlib.h>
#define SIZE 5
class queue
{
private:
    int q[SIZE], front, rear;

public:
    queue();
    void qinsert();
    void qdelete();
    void qdisplay();
};
queue::queue()
{
    front = -1;
    rear = -1;
}
void queue::qinsert()
{
    int num;
    if (rear == SIZE - 1)
    {
        cout <<”Queue Overflow” << endl;
        return;
    }
    rear++;
    cout <<”Enter the element to be inserted” << endl;
    cin >> num;
    q[rear] = num;
    if (front == -1)
    {
        front = 0;
        return;
    }
}
void queue::qdelete()
{
    int num;
    if (front == -1)
    {
        cout <<”Queue Underflow” << endl;
        return;
    }
    num = q[front];
    cout <<”The deleted element is : “<< endl
         << num
         << endl;
    if (front == rear)
    {
        front =
            -1;
        rear =
            -1;
    }
    else
    {
        front++;
        return;
    }
}
void queue::qdisplay()
{
    int I;
    if (front ==
            -1 &&
        rear ==
            -1)
    {
        cout <<”Queue is empty” << endl;
        return;
    }
    cout <<”The elemets in the queue are : “<< endl;
    for (i = front; i <= rear; i++)
        cout << q[i] <<”
\t”;
}
void main()
{
    queue q;
    int ch;
    clrscr();
    do
    {
        cout << endl
             <<”* *****MENU * *****”<< endl;
        cout <<”1.Insert” << endl;
        cout <<”2.Delete” << endl;
        cout <<”3.Display” << endl;
        cout <<”4.Exit” << endl;
        cout <<”Enter the choice : “<< endl;
        cin >> ch;
        switch (ch)
        {
        case 1:
        {
            q.qinsert();
            break;
        }
        case 2:
        {
            q.qdelete();
            break;
        }
        case 3:
        {
            q.qdisplay();
            break;
        }
        case 4:
        {
            exit(0);
        }
        default:
        {
            cout <<”Invalid Input” << endl;
        }
        }
    } while (ch <= 4);
    getch();
}