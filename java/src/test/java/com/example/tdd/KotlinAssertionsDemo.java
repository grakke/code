package com.example.tdd;

class KotlinAssertionsDemo {
//     private val person = Person("Jane", "Doe");
//     private val people = setOf(person, Person("John", "Doe"));

//     @Test
//     fun `exception absence testing`() {
//         val calculator = Calculator()
//         val result = assertDoesNotThrow("Should not throw an exception") {
//             calculator.divide(0, 1)
//         }
//         assertEquals(0, result)
//
//
//     @Test
//     fun `expected exception testing`() {
//         val calculator = Calculator()
//         val exception = assertThrows<ArithmeticException> ("Should throw an exception
//         ") {
//         calculator.divide(1, 0)
//     }
//     assertEquals("/ by zero", exception.message)
// }
//
// @Test
// fun `grouped assertions`() {
//         assertAll("Person properties",
//         { assertEquals("Jane", person.firstName) },
//         { assertEquals("Doe", person.lastName) }
//         )
//         }

// @Test
// fun `grouped assertions from a stream`() {
//         assertAll("People with first name starting with J",
//         people
//         .stream()
//         .map {
// // This mapping returns Stream<() -> Unit>
//         { assertTrue(it.firstName.startsWith("J")) }
//         }
//         )
//         }

// @Test
// fun `grouped assertions from a collection`() {
//         assertAll("People with last name of Doe",
//         people.map { { assertEquals("Doe", it.lastName) } }
//         )
//         }

// @Test
// fun `timeout not exceeded testing`() {
//         val fibonacciCalculator = FibonacciCalculator()
//         val result = assertTimeout(Duration.ofMillis(1000)) {
//         fibonacciCalculator.fib(14)
//         }
//         assertEquals(377, result)
//         }

// @Test
// fun `timeout exceeded with preemptive termination`() {
// // The following assertion fails with an error message similar to:
//         }
//         }

// // execution timed out after 10 ms
//         assertTimeoutPreemptively(Duration.ofMillis(10)) {
// // Simulate task that takes more than 10 ms.
//         Thread.sleep(100)
//         }
}