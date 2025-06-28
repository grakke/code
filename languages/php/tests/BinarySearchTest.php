<?php

namespace Tests;

use Algorithms\Search\BinarySearch;
use PHPUnit\Framework\TestCase;

/**
 * BinarySearch Test Suite
 *
 * Comprehensive tests for binary search algorithms including:
 * - Basic binary search
 * - First occurrence search
 * - Last occurrence search
 * - Range-based searches
 * - Edge cases and error conditions
 */
class BinarySearchTest extends TestCase
{
    private array $sortedArray;
    private array $duplicateArray;
    private array $emptyArray;
    private array $singleElementArray;

    protected function setUp(): void
    {
        parent::setUp();

        // Test data setup
        $this->sortedArray = [1, 3, 5, 7, 9, 11, 13, 15, 17, 19];
        $this->duplicateArray = [1, 2, 3, 3, 3, 4, 5, 6, 6, 7];
        $this->emptyArray = [];
        $this->singleElementArray = [42];
    }

    /**
     * Test basic binary search functionality
     */
    public function testBasicBinarySearch(): void
    {
        // Test existing elements
        $this->assertEquals(4, BinarySearch::binary_search($this->sortedArray, 9));
        $this->assertEquals(0, BinarySearch::binary_search($this->sortedArray, 1));
        $this->assertEquals(9, BinarySearch::binary_search($this->sortedArray, 19));

        // Test non-existing elements
        $this->assertEquals(-1, BinarySearch::binary_search($this->sortedArray, 2));
        $this->assertEquals(-1, BinarySearch::binary_search($this->sortedArray, 20));
        $this->assertEquals(-1, BinarySearch::binary_search($this->sortedArray, 0));
    }

    /**
     * Test binary search for first occurrence in arrays with duplicates
     */
    public function testBinarySearchFirst(): void
    {
        // Test first occurrence of duplicate elements
        $this->assertEquals(2, BinarySearch::binary_search_first($this->duplicateArray, 3));
        $this->assertEquals(7, BinarySearch::binary_search_first($this->duplicateArray, 6));

        // Test single occurrence elements
        $this->assertEquals(0, BinarySearch::binary_search_first($this->duplicateArray, 1));
        $this->assertEquals(5, BinarySearch::binary_search_first($this->duplicateArray, 4));

        // Test non-existing elements
        $this->assertEquals(-1, BinarySearch::binary_search_first($this->duplicateArray, 8));
    }

    /**
     * Test binary search for last occurrence in arrays with duplicates
     */
    public function testBinarySearchLast(): void
    {
        // Test last occurrence of duplicate elements
        $this->assertEquals(4, BinarySearch::binary_search_last($this->duplicateArray, 3));
        $this->assertEquals(8, BinarySearch::binary_search_last($this->duplicateArray, 6));

        // Test single occurrence elements
        $this->assertEquals(0, BinarySearch::binary_search_last($this->duplicateArray, 1));
        $this->assertEquals(5, BinarySearch::binary_search_last($this->duplicateArray, 4));

        // Test non-existing elements
        $this->assertEquals(-1, BinarySearch::binary_search_last($this->duplicateArray, 8));
    }

    /**
     * Test binary search for first element not smaller than target
     */
    public function testBinarySearchNotSmallerFirst(): void
    {
        $this->assertEquals(2, BinarySearch::binary_search_not_smaller_first($this->duplicateArray, 3));
        $this->assertEquals(5, BinarySearch::binary_search_not_smaller_first($this->duplicateArray, 4));
        $this->assertEquals(0, BinarySearch::binary_search_not_smaller_first($this->duplicateArray, 1));
        $this->assertEquals(9, BinarySearch::binary_search_not_smaller_first($this->duplicateArray, 7));

        // Test target larger than all elements
        $this->assertEquals(-1, BinarySearch::binary_search_not_smaller_first($this->duplicateArray, 10));
    }

    /**
     * Test binary search for last element not larger than target
     */
    public function testBinarySearchSmallerLast(): void
    {
        $this->assertEquals(4, BinarySearch::binary_search_smaller_last($this->duplicateArray, 3));
        $this->assertEquals(5, BinarySearch::binary_search_smaller_last($this->duplicateArray, 4));
        $this->assertEquals(0, BinarySearch::binary_search_smaller_last($this->duplicateArray, 1));
        $this->assertEquals(9, BinarySearch::binary_search_smaller_last($this->duplicateArray, 7));

        // Test target smaller than all elements
        $this->assertEquals(-1, BinarySearch::binary_search_smaller_last($this->duplicateArray, 0));
    }

    /**
     * Test edge cases and boundary conditions
     */
    public function testEdgeCases(): void
    {
        // Empty array
        $this->assertEquals(-1, BinarySearch::binary_search($this->emptyArray, 5));
        $this->assertEquals(-1, BinarySearch::binary_search_first($this->emptyArray, 5));
        $this->assertEquals(-1, BinarySearch::binary_search_last($this->emptyArray, 5));

        // Single element array
        $this->assertEquals(0, BinarySearch::binary_search($this->singleElementArray, 42));
        $this->assertEquals(-1, BinarySearch::binary_search($this->singleElementArray, 41));
        $this->assertEquals(-1, BinarySearch::binary_search($this->singleElementArray, 43));

        // Two element array
        $twoElementArray = [10, 20];
        $this->assertEquals(0, BinarySearch::binary_search($twoElementArray, 10));
        $this->assertEquals(1, BinarySearch::binary_search($twoElementArray, 20));
        $this->assertEquals(-1, BinarySearch::binary_search($twoElementArray, 15));
    }

    /**
     * Test alternative binary search implementations
     */
    public function testAlternativeImplementations(): void
    {
        // Test binarySearch method (returns boolean)
        $this->assertTrue(BinarySearch::binarySearch($this->sortedArray, 9));
        $this->assertTrue(BinarySearch::binarySearch($this->sortedArray, 1));
        $this->assertFalse(BinarySearch::binarySearch($this->sortedArray, 2));
        $this->assertFalse(BinarySearch::binarySearch($this->sortedArray, 20));

        // Test repetitiveBinarySearch method
        $this->assertEquals(2, BinarySearch::repetitiveBinarySearch($this->duplicateArray, 3));
        $this->assertEquals(7, BinarySearch::repetitiveBinarySearch($this->duplicateArray, 6));
        $this->assertEquals(-1, BinarySearch::repetitiveBinarySearch($this->duplicateArray, 8));
    }

    /**
     * Test performance with larger arrays
     */
    public function testPerformanceWithLargeArray(): void
    {
        $largeArray = range(1, 10000, 2); // Odd numbers from 1 to 9999

        $startTime = microtime(true);
        $result = BinarySearch::binary_search($largeArray, 5001);
        $endTime = microtime(true);

        $this->assertEquals(2500, $result); // 5001 is at index 2500
        $this->assertLessThan(0.001, $endTime - $startTime); // Should be very fast

        // Test non-existing element
        $this->assertEquals(-1, BinarySearch::binary_search($largeArray, 5000));
    }

    /**
     * Test with negative numbers
     */
    public function testWithNegativeNumbers(): void
    {
        $negativeArray = [-10, -5, -3, 0, 2, 5, 8, 12];

        $this->assertEquals(0, BinarySearch::binary_search($negativeArray, -10));
        $this->assertEquals(3, BinarySearch::binary_search($negativeArray, 0));
        $this->assertEquals(7, BinarySearch::binary_search($negativeArray, 12));
        $this->assertEquals(-1, BinarySearch::binary_search($negativeArray, -7));
    }

    /**
     * Test data provider for comprehensive testing
     */
    public function binarySearchDataProvider(): array
    {
        return [
            'existing_element_middle' => [[1, 3, 5, 7, 9], 5, 2],
            'existing_element_start' => [[1, 3, 5, 7, 9], 1, 0],
            'existing_element_end' => [[1, 3, 5, 7, 9], 9, 4],
            'non_existing_element' => [[1, 3, 5, 7, 9], 4, -1],
            'element_below_range' => [[1, 3, 5, 7, 9], 0, -1],
            'element_above_range' => [[1, 3, 5, 7, 9], 10, -1],
        ];
    }

    /**
     * @dataProvider binarySearchDataProvider
     */
    public function testBinarySearchWithDataProvider(array $array, int $target, int $expected): void
    {
        $this->assertEquals($expected, BinarySearch::binary_search($array, $target));
    }

    /**
     * Test that original array is not modified
     */
    public function testArrayImmutability(): void
    {
        $originalArray = [1, 3, 5, 7, 9];
        $arrayCopy = $originalArray;

        BinarySearch::binary_search($originalArray, 5);
        BinarySearch::binary_search_first($originalArray, 5);
        BinarySearch::binary_search_last($originalArray, 5);

        $this->assertEquals($arrayCopy, $originalArray);
    }
}
