#include <iostream.h>
#include <conio.h>
#include <string.h>
#include <stdlib.h>
#include <ctype.h>
#include <iomanip.h>
int s[10], top =
               -1;
void push(int);
int pop();
void push(int x)
{
    s[++top] = x;
}
int pop()
{
    return (s[top--]);
}
void main()
{
    clrscr();
    char expr[20], ch;
    int op1, op2, n;
    cout << "Enter the expression: " << endl;
    cin >> expr;
    n = strlen(expr);
    for (int i = 0; i < n; i++)
    {
        ch = expr[i];
        if (isdigit(ch))
            push(ch - '0');
        else
        {
            op1 = pop();
            op2 = pop();
            switch (ch)
            {
            case '+':
            {
                push(op2 + op1);
                break;
            }
            case ' -': {
                push(op2 - op1);
                break;
            } case '*':
            {
                push(op2 * op1);
                break;
            }
            case '/':
            {
                push(op2 / op1);
                break;
            }
            }
        }
    }
    cout << "The result is = " << s[top] << endl;
    getch();
}