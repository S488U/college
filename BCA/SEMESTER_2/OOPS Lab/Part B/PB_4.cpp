/*Create a class called ‘Time’ which includes the data members – hours, minutes and 
seconds. Use the method
▪ To accept the time.
▪ To display the time.
▪ To increment time by one second by overloading unary operator ++
▪ To decrement time by one second by overloading unary operator - -
Write a menu driven program for the above operation, (Hint: Minutes and Seconds 
must be always within the range 0-59).
*/

#include<iostream.h> 
#include<conio.h> 
#include<stdlib.h> 
 
class time1 { 
    int h, m, s; 
    public: 
        void getdata(); 
    void putdata(); 
    void operator++(); 
    void operator--(); 
}; 
void time1::getdata() { 
    cout << endl << "Enter the hours:"; 
    cin >> h; 
    if (h >= 24) { 
        cout << endl << "Invalid hour,Try again:"; 
        cin >> h; 
    } 
    cout << endl << "Enter the minutes:"; 
    cin >> m; 
    if (m >= 60) { 
        cout << endl << "Invalid minutes,Try again:"; 
        cin >> m; 
    } 
    cout << endl << "Enter the second:"; 
    cin >> s; 
    if (s >= 60) { 
        cout << endl << "Invalid second,Try again:"; 
        cin >> s; 
    } 
} 
void time1::putdata() { 
    cout << endl << "Time is " << h << ":" << m << ":" << s; 
} 
void time1::operator++() { 
    s = s + 1; 
    if (s == 60) { 
        s = 0; 
        m = m + 1; 
    } 
    if (m == 60) { 
        m = 0; 
        h = h + 1; 
    } 
    if (h > 23) { 
        h = 0; 
    } 
} 
 
void time1::operator--() { 
    s = s - 
        1; 
    if (s < 0) { 
        s = 59; 
        m = m - 
            1; 
    } 
    if (m < 0) { 
        m = 59; 
        h = h - 1; 
    } 
    if (h < 0) { 
        h = 23; 
    } 
} 
void main() { 
    clrscr(); 
    int n; 
    time1 t; 
    while (1) { 
        cout << endl << "Option 1: Enter the time\nOption 2:Display\nOption 3:Add\nOption4:Sub\nOption 5:Exit"; 
        cout << endl << "Enter the Option:"; 
        cin >> n; 
        switch (n) { 
        case 1: 
            t.getdata(); 
            break; 
        case 2: 
            t.putdata(); 
            break; 
        case 3: 
            t.operator++(); 
            t.putdata(); 
            break; 
        case 4: 
            t.operator--(); 
            t.putdata(); 
            break; 
        case 5: 
            exit(0); 
        default: 
            cout << endl << "Invalid Input"; 
        } 
        getch(); 
    } 
}


/*

OUTPUT: -

Option 1: Enter the time
Option 2: Display
Option 3: Add
Option4: Sub
Option 5: Exit
Enter the Option:1

Enter the hours:2
Enter the minutes:25
Enter the second:34

Option 1: Enter the time
Option 2: Display
Option 3: Add
Option4: Sub
Option 5: Exit
Enter the Option:2

Time is 2:25:34

Option 1: Enter the time
Option 2: Display
Option 3: Add
Option4: Sub
Option 5: Exit
Enter the Option:3

Time is 2:25:35

Option 1: Enter the time
Option 2: Display
Option 3: Add
Option4: Sub
Option 5: Exit
Enter the Option:4

Time is 2:25:34

Option 1: Enter the time
Option 2: Display
Option 3: Add
Option4: Sub
Option 5: Exit
Enter the Option:5

*/