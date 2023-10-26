package com.example;

import org.junit.Rule;
import org.junit.jupiter.api.BeforeAll;
import org.junit.jupiter.api.Test;
import org.junit.rules.ExpectedException;

public class JunitTest {
    private static Foo foo;

    @BeforeAll
    public static void beforeAll() {
        foo = new Foo();
    }

    @Rule
    public ExpectedException exception =
            ExpectedException.none();

    @Test
    public void whenDoFooThenThrowRuntimeException() {
        exception.expect(RuntimeException.class);
        foo.doFoo();
    }

}
