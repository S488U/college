/*Using constructors and proper methods design a class graphics which stores shapes, 
area, back color and fore colors. Use this class in the main program to input any ‘N’ 
shapes and perform the following options and print the list in the neat format.
A) Sort according to Area.
B) Search according to accepted shape

*/

#include<iostream.h> 
#include<conio.h> 
#include<string.h> 
#include<stdlib.h> 
 
class graphics { 
    int i, n, j; 
    float area[20], temp; 
    char shape[20][20], fc[20][20], bc[20][20], cmp[20]; 
    public: 
        graphics(); 
    void display(); 
    void search(char a[20]); 
    void sort(); 
}; 
graphics::graphics() { 
    cout << endl << "Enter the number of shapes:"; 
    cin >> n; 
    for (i = 0; i < n; i++) { 
        cout << endl << "Detail of shape" << i + 1; 
        cout << endl << "enter the shape:"; 
        cin >> shape[i]; 
        cout << endl << "enter the area:"; 
        cin >> area[i]; 
        cout << "Enter the forecolor:"; 
        cin >> fc[i]; 
        cout << "Enter the backcolor:"; 
        cin >> bc[i]; 
    } 
} 
void graphics::display() { 
    for (i = 0; i < n; i++) { 
        cout << endl << "Detail of shape" << i + 1; 
        cout << endl << shape[i] << endl << area[i] << endl << fc[i] << 
endl << bc[i]; 
    } 
} 
void graphics::search(char a[20]) { 
    int flag = 0; 
    for (i = 0; i < n; i++) { 
        if (strcmpi(shape[i], a) == 0) { 
            flag = 1; 
            cout << shape[i] << endl << area[i] << endl << fc[i] << endl << bc[i]; 
        } 
    } 
    if (flag == 0) 
        cout << "shape not found:"; 
} 
 
void graphics::sort() { 
    cout << endl << "Sorted"; 
    for (i = 0; i < n - 1; i++) { 
        for (j = i + 1; j < n; j++) { 
            if (area[i] > area[j]) { 
                temp = area[i]; 
                area[i] = area[j]; 
                area[j] = temp; 
                strcpy(cmp, shape[i]); 
                strcpy(shape[i], shape[j]); 
                strcpy(shape[j], cmp); 
                strcpy(cmp, bc[i]); 
                strcpy(bc[i], bc[j]); 
                strcpy(bc[j], cmp); 
                strcpy(cmp, fc[i]); 
                strcpy(fc[i], fc[j]); 
                strcpy(fc[j], cmp); 
            } 
        } 
    } 
} 
void main() { 
    clrscr(); 
    char a[20]; 
    int s; 
    graphics g; 
    while (1) { 
        cout << endl << "Option 1: Display\nOption 2: Sort\nOption 3: Search\nOption 4: Exit\nEnter the choice: ";
        cin >> s; 
        switch (s) { 
        case 1: 
            g.display(); 
            break; 
        case 2: 
            g.sort(); 
            g.display(); 
            break; 
        case 3: 
            cout << "enter the shape to be searched:"; 
            cin >> a; 
            g.search(a); 
            break; 
        case 4: 
            exit(0); 
            break; 
        default: 
            cout << "Invalid input:"; 
        } 
        getch(); 
    } 
} 


/*

OUTPUT: -

Enter the number of shapes:2  
Detail of shape1  
Enter the shape:rectangle  
Enter the area 25  
Enter the forecolor:red  
Enter the backcolor:black  
  
Detail of shape2  
Enter the shape:circle  
Enter the area :30  
Enter the forecolor:green  
Enter the backcolor:white  
  
Option 1: Display  
Option 2: Sort  
Option 3: Search  
Option 4: Exit  
Enter the option:1  
Detail of shape: 1  
Rectangle  
25 Red black  Detail of shape: 2  
Circle  
30  
Green  
White  
  
Option 1: Display  
Option 2: Sort  
Option 3: Search  
Option 4: Exit  
Enter the option:2  
Sorted  
Detail of shape: 1  
Rectangle  
25 Red black  Detail of shape: 2  
Circle  
30  
Green  
White  
  
Option 1: Display  
Option 2: Sort  
Option 3: Search  
Option 4: Exit  
Enter the option:3  
Enter the shape to be searched:circle  
Circle  
30  
Green  
White  
  
Option 1: Display  
Option 2: Sort  
Option 3: Search  
Option 4: Exit  
Enter the option:4 

*/