package com.example;

import org.junit.jupiter.api.*;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.ValueSource;

import java.util.List;

public class ExampleTest {
    @BeforeAll
    static void beforeAll() {
        System.out.println("Before All");
    }

    @AfterAll
    static void afterAll() {
        System.out.println("After All");
    }

    @BeforeEach
    void before() {
        System.out.println("Before");
    }

    @AfterEach
    void after() {
        System.out.println("After");
    }

    @Test
    void test1() {
        System.out.println("Test 1");
    }

    @Test
    void test2() {
        System.out.println("Test 2");
    }

    @Test
    @Disabled("Not implemented yet")
    void shouldShowSimpleAssertion() {
        Assertions.assertEquals(1, 2);
    }

    @Test
    @DisplayName("Should demonstrate a simple assertion")
    void shouldShowSimpleAssertion1() {
        Assertions.assertEquals(1, 1);
    }

    @Test
    @DisplayName("Should check all items in the list")
    void shouldCheckAllItemsInTheList() {
        List<Integer> numbers = List.of(2, 3, 5, 7);

        Assertions.assertEquals(2, numbers.get(0));
        Assertions.assertEquals(3, numbers.get(1));
        Assertions.assertEquals(5, numbers.get(2));
        Assertions.assertEquals(7, numbers.get(3));

        Assertions.assertAll(() -> Assertions.assertEquals(2, numbers.get(0)), () -> Assertions.assertEquals(3, numbers.get(1)), () -> Assertions.assertEquals(5, numbers.get(2)), () -> Assertions.assertEquals(7, numbers.get(3)));
    }

//	@Test
//	@DisplayName("Should only run the test if some criteria are met")
//	void shouldOnlyRunTheTestIfSomeCriteriaAreMet() {
//		Assumptions.assumeTrue(Fixture.apiVersion() > 10);
//		Assertions.assertEquals(1, 1);
//	}

    @ParameterizedTest
    @DisplayName("Should create shapes with different numbers of sides")
    @ValueSource(ints = {3, 4, 5, 8, 14})
    void shouldCreateShapesWithDifferentNumbersOfSides(int expectedNumberOfSides) {
        Shape shape = new Shape(expectedNumberOfSides);
        Assertions.assertEquals(expectedNumberOfSides, shape.numberOfSides());
    }

    @Nested
    @DisplayName("When a shape has been created")
    class WhenShapeExists {
        private final Shape shape = new Shape(4);

        @Nested
        @DisplayName("Should allow")
        class ShouldAllow {
            @Test
            @DisplayName("seeing the number of sides")
            void seeingTheNumberOfSides() {
                Assertions.assertEquals(4, shape.numberOfSides());
            }

            @Test
            @DisplayName("seeing the description")
            void seeingTheDescription() {
                Assertions.assertEquals("Square", shape.description());
            }
        }

        @Nested
        @DisplayName("Should not")
        class ShouldNot {
            @Test
            @DisplayName("be equal to another shape with the same number of sides")
            void beEqualToAnotherShapeWithTheSameNumberOfSides() {
                Assertions.assertNotEquals(new Shape(4), shape);
            }
        }
    }
}
