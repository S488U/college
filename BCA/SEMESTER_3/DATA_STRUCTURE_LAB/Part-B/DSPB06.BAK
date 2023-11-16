#include <iostream.h>
#include <conio.h>
#include <iomanip.h>
#include <stdlib.h>
#define max 5
class cqueue
{
private:
    int cq[max], front, rear;

public:
    void cqinsert();
    void cqdelete();
    void cqdisplay();
    cqueue()
    {
        front = -1;
        rear = -1;
    }
};
void cqueue::cqinsert()
{
    int num;
    if ((rear + 1) % max == front || (front == 0 && rear == max - 1))
    {
        cout << "circular queue overflow" << endl;
        return;
    }
    else
    {
        cout << "enter the element to be inserted" << endl;
        cin >> num;
        if (front == -1)
            front = 0;
        rear = (rear + 1) % max;
        cq[rear] = num;
    }
}
void cqueue::cqdelete()
{
    int num;
    if (front == -1)
    {
        cout << "circular queue underflow" << endl;
        return;
    }
    num = cq[front];
    if (front == rear)
    {
        front =
            -1;
        rear =
            -1;
    }
    else
    {
        front = (front + 1) % max;
    }
    cout << "the deleted element is:" << num << endl;
}
void cqueue::cqdisplay()
{
    int i = front;
    if (front ==
        -1)
    {
        cout << "circular queue is empty" << endl;
        return;
    }
    else
    {
        cout << "the elements in circular queue are:" << endl;
        while (i <= rear)
        {
            cout << cq[i] << "
\t "<<endl;
                i = i + 1 % max;
        }
    }
}
void main()
{
    cqueue c;
    clrscr();
    int ch;
    do
    {
        cout << "***MENU***" << endl;
        cout << "1.insert" << endl;
        cout << "2.delete" << endl;
        cout << "3.display" << endl;
        cout << "4.exit" << endl;
        cout << "enter your choice" << endl;
        cin >> ch;
        switch (ch)
        {
        case 1:
        {
            c.cqinsert();
            break;
        }
        case 2:
        {
            c.cqdelete();
            break;
        }
        case 3:
        {
            c.cqdisplay();
            break;
        }
        case 4:
        {
            exit(0);
        }
        default:
        {
            cout << "invalid choice" << endl;
        }
        }
    } while (ch <= 4);
    getch();
}
