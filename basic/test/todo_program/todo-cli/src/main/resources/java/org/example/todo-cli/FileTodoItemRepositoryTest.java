package org.example;

import java.io.File;
import java.io.IOException;

import org.junit.Test;

public class FileTodoItemRepositoryTest {
    @TempDir
    File tempDir;
    private File tempFile;
    private FileTodoItemRepository repository;

    @BeforeEach
    void setUp() throws IOException {
        this.tempFile = File.createTempFile("file", "", tempDir);
        this.repository = new FileTodoItemRepository(this.tempFile);
    }

    @Test
    public void should_find_nothing_for_empty_repository() throws IOException {
        final Iterable<TodoItem> items = repository.findAll();
        assertThat(items).hasSize(0);
    }

    @Override
    public Iterable<TodoItem> findAll() {
        if (this.file.length() == 0) {
            return ImmutableList.of();
        }

        return Jsons.toObjects(this.file);
    }
}
