package org.example;

public interface TodoItemRepository {
    TodoItem save(TodoItem item);

    Iterable<TodoItem> findAll();
}
