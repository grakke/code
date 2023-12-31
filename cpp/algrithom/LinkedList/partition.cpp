#include <stdio.h>

struct ListNode {
  int val;
  ListNode *next;
  ListNode(int x) : val(x), next(NULL){};
};

class Solution {
 public:
  ListNode *partition(ListNode *head, int x) {
    ListNode less_head(0);
    ListNode more_head(0);
    ListNode *less_ptr = &less_head;
    ListNode *more_ptr = &more_head;

    while (head) {
      if (head->val >= x) {
        more_ptr->next = head;
        more_ptr = head;
      } else {
        less_ptr->next = head;
        less_ptr = head;
      }
      head = head->next;
    }
    less_ptr->next = more_head.next;
    more_ptr->next = NULL;

    return less_head.next;
  }
};

int main(int argc, char const *argv[]) {
  ListNode a(10);
  ListNode b(40);
  ListNode c(30);
  ListNode d(20);
  ListNode e(50);
  ListNode f(20);
  a.next = &b;
  b.next = &c;
  c.next = &d;
  d.next = &e;
  e.next = &f;
  f.next = NULL;

  Solution solve;
  ListNode *head = solve.partition(&a, 30);
  while (head) {
    printf("%d\n", head->val);
    head = head->next;
  }

  return 0;
}
