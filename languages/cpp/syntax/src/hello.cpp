#include "../include/print.h"
#include <iostream>

using namespace std;

int main()
{
    cout << "Hello World" << endl;

    vector<string> msg;
    msg.push_back("Hello");
    msg.push_back("World");
    printMessage(msg);
}