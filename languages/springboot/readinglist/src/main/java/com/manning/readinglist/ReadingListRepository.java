package com.manning.readinglist;

import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface ReadingListRepository extends JpaRepository<Book, Long> {

	List<Book> findByReader(Reader reader);

}
