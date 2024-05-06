/*Create a class ‘Bank’ which includes data members–Acno, Name, Balance and 
parameterized constructor to initialize the data members and other methods like 
deposit, withdrawal, and display the detail of the customer. (Note: Minimum balance 
of Rs. 500/- should be maintained.)
*/

#include<iostream.h> 
#include<conio.h> 
#include<stdlib.h> 
#include<string.h> 
 
class bank { 
    int accno; 
    float bal; 
    char name[20]; 
    public: 
        bank(int acno, char name1[20], float balance) { 
            accno = acno; 
            strcpy(name, name1); 
            bal = balance; 
        } 
    void dep(float); 
    void withdraw(float); 
    void display(); 
}; 
void bank::dep(float amount) { 
    bal = bal + amount; 
    cout << endl << "Transaction Processed" << endl << "Balance is:" << bal; 
} 
void bank::withdraw(float amount) { 
    if (bal < amount) { 
        cout << endl << "Transaction Failed"; 
    } else 
    if ((bal - amount) < 500) { 
        cout << endl << "Minimum balance of 500 should be maintained"; 
    } else { 
        bal = bal - amount; 
        cout << endl << "Transaction Processed" << endl << "Current balance is:" << bal; 
    } 
} 
void bank::display() { 
    cout << endl << "**Customer Details**"; 
    cout << endl << "Account number is:" << accno; 
    cout << endl << "Name is:" << name; 
    cout << endl << "Balance is:" << bal; 
} 
void main() { 
    int a, n; 
    float am, ba; 
    char nam[20]; 
    clrscr(); 
    cout << endl << "Enter the Accno:"; 
    cin >> a; 
    cout << endl << "Enter the Name:"; 
    cin >> nam; 
    cout << endl << "Enter the Balance:"; 
    cin >> ba; 
    bank b(a, nam, ba); 
    while (1) { 
        cout << endl << "1.Deposit\n2.Withdrawal\n3.Display\n4.Exit\nEnter your choice:";
        cin >> n; 
        switch (n) { 
        case 1: 
            cout << "Enter the amount to be deposited:"; 
            cin >> am; 
            b.dep(am); 
            break; 
        case 2: 
            cout << "Enter the amount to be withdraw:"; 
            cin >> am; 
            b.withdraw(am); 
            break; 
        case 3: 
            b.display(); 
            break; 
        case 4: 
            exit(0); 
            break; 
        default: 
            cout << "invalid input"; 
            break; 
        } 
        getch(); 
    } 
}


/*

OUTPUT: -

Enter the Accno:001 
Enter the Name: Shahabas 
Enter the balance: 13000 
 
1.Deposit 
2.Withdrawal 
3. Display 
4.Exit 
Enter your choice: 1 
Enter the amount to be deposited: 
3000 
 
Transaction Processed 
Balance: 16000 
1.Deposit 
2.Withdrawal 
3. Display 
4.Exit 
Enter your choice: 2 
Enter the amount to be Withdrawal: 
3000 
 
Transaction Processed 
Current balance is: 13000 
 
1.Deposit 
2.Withdrawal 
3.Display 
4.Exit 
Enter your choice: 3 
 
**Customer Details** 
Account Number: 001 
Name is: Shahabas 
Balance is: 13000 
1.Deposit 
2.Withdrawal 
3.Display 
4.Exit 
Enter your choice: 4

*/