package todo-cli.src.main.resources.java.org.example.todo-cli;

class TodoCommandTest {
    @TempDir
    File tempDir;
    private TodoItemService service;
    private CommandLine cli;

    @BeforeEach
    void setUp() {
        final ObjectFactory factory = new ObjectFactory();
        final File repositoryFile = new File(tempDir, "repository.json");
        this.service = factory.createService(repositoryFile);
        cli = factory.createCommandLine(repositoryFile);
    }

    @Test
    public void should_mark_as_done() {
        service.addTodoItem(TodoParameter.of("foo"));

        cli.execute("done", "1");

        final List<TodoItem> items = service.list(true);
        assertThat(items.get(0).isDone()).isTrue();
    }
}