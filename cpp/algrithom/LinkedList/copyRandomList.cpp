#include <stdio.h>

#include <map>
#include <vector>

struct RandomListNode {
  int label;
  RandomListNode *next, *random;
  RandomListNode(int x) : label(x), next(NULL), random(NULL) {}
};

class Solution {
 public:
  RandomListNode *copyRandonList(RandomListNode *head) {
    std::map<RandomListNode *, int> node_map;
    std::vector<RandomListNode *> node_vec;
    RandomListNode *ptr = head;
    int i = 0;
    while (ptr) {
      node_vec.push_back(new RandomListNode(ptr->label));
      node_map[ptr] = i;
      ptr = ptr->next;
      i++;
    }
    node_vec.push_back(0);

    ptr = head;
    i = 0;
    while (ptr) {
      node_vec[i]->next = node_vec[i + 1];
      if (ptr->random) {
        int id = node_map[ptr->random];
        node_vec[i]->random = node_vec[id];
      }
      ptr = ptr->next;
      i++;
    }
    return node_vec[0];
  }
};

int main(int argc, char const *argv[]) {
  std::map<RandomListNode *, int> node_map;
  RandomListNode a(1);
  RandomListNode b(2);
  RandomListNode c(3);
  RandomListNode d(4);
  RandomListNode e(5);
  a.next = &b;
  b.next = &c;
  c.next = &d;
  d.next = &c;
  a.random = &c;
  b.random = &d;
  c.random = &c;
  e.random = &d;

  Solution slove;
  RandomListNode *head = slove.copyRandonList(&a);
  while (head) {
    printf("lable = %d", head->label);
    if (head->random) {
      printf("rand = %d\n", head->random->label);
    } else {
      printf("rand =NULL\n");
    }
    head = head->next;
  }

  return 0;
}
