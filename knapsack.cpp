#include <algorithm>
#include <iostream>
#include <vector>
#include <string>
using namespace std;

// Define a class to represent an object
class Object {
private:
  int dimension;
  int cost;
  string description;

public:
  Object(string desc, int dim, int cost) {
    description = desc;
    dimension = dim;
    this->cost = cost;
  }

    // Setter methods
  void set_dimension(int dim) { dimension = dim; }
  void set_cost(int cost) { this->cost = cost; }
  void set_description(string desc) { description = desc; }
   // Getter methods
  string get_description() { return description; }
  int get_dimension() { return dimension; }
  int get_cost() { return cost; }
};

// Create a 2D array for memorization
int MEMO[1000][10000] = {{0}};
// Recursive implementation of the knapsack algorithm
int knapsack(vector<Object>& objects, int i, int capacity) {
 // Base case: if there are no  objects to consider, return 0
  if (i == objects.size())
    return 0;
// Check if the result for the current subproblem is already memorized to save memory
  if (MEMO[i][capacity] != 0)
    return MEMO[i][capacity];

  // Check if the current object's dimension can fit in the remaining capacity
  if (objects.at(i).get_dimension() <= capacity) {

    // Buy: include the current object and recursively solve for the remaining objects and capacity
    int buy = objects.at(i).get_cost() + knapsack(objects, i + 1, capacity - objects.at(i).get_dimension());

    // Skip: exclude the current object and recursively solve for the remaining objects and capacity
    int skip = knapsack(objects, i + 1, capacity);

    // Take the maximum of buy and skip as the result for the current subproblem
    return MEMO[i][capacity] = max(buy, skip);
  }

   // Skip: the current object's dimension is too large, so exclude it and recursively solve for the remaining objects and capacity
  return MEMO[i][capacity] = knapsack(objects, i + 1, capacity);
}

int main() {
  int cost, dimension;
  string description;
  vector<Object> V;

// Read objects from input until "stop" is entered
  while(true){
    cout << "Enter the name of the object (Enter 'stop' to stop the instance): ";
    getline(cin,description);
    if (description == "stop" || description == "STOP")
          break;

    cout << "Enter its dimension: ";
    cin >> dimension;
    cout << "Enter its cost: ";
    cin >> cost;
    cin.ignore();
    V.push_back(Object(description, dimension, cost));
  };

 // Compute the maximum value using the knapsack algorithm
  cout << "Max value: " << knapsack(V, 0, 7) << endl;

  return 0;
}