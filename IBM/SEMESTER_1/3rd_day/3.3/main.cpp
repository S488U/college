#include <iostream>

using namespace std;

int main()
{
    string str="srinivas UNIVERSITY";
    string::reverse_iterator it;
    for(it=str.rbegin();it!=str.rend();it++)
    cout << *it << endl;
    return 0;
}
