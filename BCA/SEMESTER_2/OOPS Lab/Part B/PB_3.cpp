/*Write a program to accept two strings and using operator overloading perform the 
following.
a. Concatenation of two strings.
b. Comparison of two strings alphabetically.

*/

#include<iostream.h> 
#include<conio.h> 
#include<string.h> 
 
class string { 
    char str[20]; 
    public: 
        void getdata() { 
            cin >> str; 
        } 
    void putdata() { 
        cout << "String is:" << str; 
    } 
    friend string operator + (string s1, string s2); 
    friend int operator < (string s1, string s2); 
    friend int operator > (string s1, string s2); 
    friend int operator == (string s1, string s2); 
}; 
string operator + (string s1, string s2) { 
    string t; 
    strcpy(t.str, s1.str); 
    strcat(t.str, " "); 
    strcat(t.str, s2.str); 
    return t; 
} 
int operator < (string s1, string s2) { 
    if (strcmpi(s1.str, s2.str) < 0) 
        return 1; 
    else 
        return 0; 
} 
int operator > (string s1, string s2) { 
    if (strcmpi(s1.str, s2.str) > 0) 
        return 1; 
    else 
        return 0; 
} 
int operator == (string s1, string s2) { 
    if (strcmpi(s1.str, s2.str) == 0) 
        return 1; 
    else 
        return 0; 
} 
void main() { 
    clrscr(); 
    string s1, s2, s3; 
    cout << endl << "Enter the First string:"; 
    s1.getdata(); 
    s1.putdata(); 
    cout << endl << "Enter the Second string:"; 
 
    s2.getdata(); 
    s2.putdata(); 
    cout << endl << "concatenated"; 
    s3 = s1 + s2; 
    s3.putdata(); 
    if (s1 == s2) { 
        cout << endl << "String is Equal"; 
    } else { 
        cout << endl << "String is not Equal"; 
    } 
    if (s1 > s2) 
        cout << endl << "First string is greater than second string "; 
    if (s1 < s2) 
        cout << endl << "First string is less than second string"; 
    getch(); 
}


/*

OUTPUT: -

Enter the first string:Oxford  
Sting is:Oxford  
Enter the second string:University  
String is:University  
Concatenated string is:Oxford University  
String is not Equal  
First string is less than second string 

*/