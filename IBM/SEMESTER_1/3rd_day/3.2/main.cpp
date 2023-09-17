#include <iostream>

using namespace std;

int main()
{
    string str("srinivas");
    string::iterator it; //itration the statement
    for(it=str.begin();it!=str.end();it++)
    cout << *it << endl;
    return 0;
}
