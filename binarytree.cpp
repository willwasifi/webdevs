#include<iostream>
#include<cstdlib>
#include<assert.h>
#include<string.h>
#include "bintree.h"

using namespace std;

struct datanode 
{
  int key;
  float gpa;
};
// Post: creates struct to hold data key and gpa

void holdscreen() //Post: Hold screen for user
{
  cin.ignore();
  cin.ignore();
}

int menu();
// Post: displays menu to user


int main()
{

  Binary_tree<datanode> tree;
  datanode data;
  Binary_node<datanode> * pointer;
  int choice,key;
  float gpa;

  do
    {
    system("clear");
    choice=menu();
    switch(choice)
      {
      case 1: tree.fill_tree(); break;
      case 2: {
	cout <<"Enter key and gpa: ";
	cin >>key>>gpa;
	data.key=key;
	data.gpa=gpa;
	tree.insert(data);
      }break;
      case 3: tree.inorder(); holdscreen(); break;
      case 4: tree.preorder(); holdscreen(); break;
      case 5: tree.postorder(); holdscreen(); break;
      case 6: tree.descending(); holdscreen(); break;
      case 7: {cout << "Size=" << tree.size() << endl;
	  holdscreen();}break;
      case 8: {cout << "Average=" <<tree.average() << endl;
	  holdscreen();}break;
      case 9: {cout<< "Enter key to search for:";
	  cin>>key;
	  tree.search(key,pointer);
	  if(pointer==NULL){cout << "NOT FOUND\n";}
	  else{cout << "key="<<pointer->data.key<<" gpa="
		    <<pointer->data.gpa
		    <<endl;}
	  holdscreen(); break;}
      case 10: {
	cout << "Enter key of node to delete:";
	cin >> key;
	if(! tree.remove(key))
	  {cout << "NOT FOUND\n"; holdscreen();}
      }break;
      case 11: break;
      default: {cout << "Invalid Choice\n"; holdscreen();}
      }
    }
  while(choice!=11);
  
  
}


int menu()
{
  cout << "1. Fill the tree from file lab5.in\n";
  cout << "2. Insert a node into the tree\n";
  cout << "3. Print KEYS ONLY in ascending order\n";
  cout << "4. Print KEYS with GPAs in preorder\n";
  cout << "5. Print KEYS with GPAs in postorder\n";
  cout << "6. Print KEYS with GPAs in descending order\n";
  cout << "7. Count nodes in tree\n";
  cout << "8. Calculate average of GPAs in tree\n";
  cout << "9. Search for a KEY in the tree\n";
  cout << "10. Delete a node from the tree\n";
  cout << "11. Quit\n";
  cout << "Enter choice: ";
  int decision;
  cin >> decision;
  return decision;
}
