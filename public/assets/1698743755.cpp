#include <iostream>
using namespace std;
int main() {
    int arr[10];
    cout<<"Enter values in array: "<<endl;
    for (int i = 0; i < 10; i++)
    {
        cin>>arr[i];
    }
//Sorting the array
    for (int i = 0; i < 10; i++) {
    for (int j = i + 1; j < 10; j++) {
        if (arr[i] > arr[j]) {   	
            int temp = arr[i];
            arr[i] = arr[j];
            arr[j] = temp;
			}
        }
    }
//Removing duplication in array
    cout << "Unique elements in the array: ";
    for (int i = 0; i < 10; i++) {
        bool isUnique = true;
        for (int j = 0; j < i; j++) {
            if (arr[i] == arr[j]) {
                isUnique = false;
                break;
            }
        }
        if (isUnique) {
            cout << arr[i] << " ";
        }
    }
}	
