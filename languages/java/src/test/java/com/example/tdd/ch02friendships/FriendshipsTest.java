package com.example.tdd.ch02friendships;

import org.junit.jupiter.api.*;
import java.util.*;

import static org.hamcrest.MatcherAssert.assertThat;
import static org.hamcrest.Matchers.containsInAnyOrder;
import static org.hamcrest.Matchers.hasSize;

class FriendshipsTest {
    Friendships friendships;

    @BeforeAll
    public static void beforeClass() {
    }

    @BeforeEach
    public void setUp() {
        friendships = new Friendships();
        friendships.makeFriends("Joe", "Audrey");
        friendships.makeFriends("Joe", "Peter");
        friendships.makeFriends("Joe", "Michael");
        friendships.makeFriends("Joe", "Britney");
        friendships.makeFriends("Joe", "Paul");
    }

    @AfterAll
    public static void afterClass() {
    }

    @AfterEach
    void tearDown() {
    }

    @Test
    public void alexDoesNotHaveFriends() {
        Assertions.assertTrue(friendships.getFriendsList("Alex").isEmpty(), "Alex does not have friends");
    }

    @Test
    public void joeHas5Friends() {
        Assertions.assertEquals(5, friendships.getFriendsList("Joe").size(), "Joe has 5 friends");
        assertThat(friendships.getFriendsList("Joe"), hasSize(5));
    }

    @Test
    public void joeIsFriendWithEveryone() {
        List<String> friendsOfJoe = Arrays.asList("Audrey", "Peter", "Michael", "Britney", "Paul");
        Assertions.assertTrue(friendships.getFriendsList("Joe").containsAll(friendsOfJoe));
        assertThat(
                friendships.getFriendsList("Joe"),
                containsInAnyOrder("Audrey", "Peter", "Michael", "Britney", "Paul")
        );
    }
}