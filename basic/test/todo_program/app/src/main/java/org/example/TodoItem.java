package app.src.main.java.org.example;

@Getter
public class TodoItem {
    private long index;
    private final String content;
    private boolean done;

    public TodoItem(final String content) {
        this.content = content;
        this.done = false;
    }

    public void assignIndex(final long index) {
        this.index = index;
    }

    public void markDone() {
        this.done = true;
    }
}
