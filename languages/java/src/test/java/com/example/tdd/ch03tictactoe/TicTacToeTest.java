package com.example.tdd.ch03tictactoe;

import org.junit.Rule;
import org.junit.jupiter.api.BeforeAll;
import org.junit.jupiter.api.Test;
import org.junit.rules.ExpectedException;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class TicTacToeTest {
	@Rule
	public ExpectedException exception = ExpectedException.none();
	private static TicTacToe ticTacToe;

	@BeforeAll
	public static void BeforeAll() {
		ticTacToe = new TicTacToe();
	}

	@Test
	public void whenXOutsideBoardThenRuntimeException() {
		exception.expect(RuntimeException.class);
		ticTacToe.play(5, 2);
	}

	@Test
	public void whenYOutsideBoardThenRuntimeException() {
		exception.expect(RuntimeException.class);
		ticTacToe.play(2, 5);
	}

	@Test
	public void whenOccupiedThenRuntimeException() {
		ticTacToe.play(2, 1);
		exception.expect(RuntimeException.class);
		ticTacToe.play(2, 1);
	}

	@Test
	public void givenFirstTurnWhenNextPlayerThenX() {
		assertEquals('X', ticTacToe.nextPlayer());
	}

	@Test
	public void givenLastTurnWasXWhenNextPlayerThenO() {
		ticTacToe.play(1, 1);
		assertEquals('O', ticTacToe.nextPlayer());
	}

	@Test
	public void whenPlayThenNoWinner() {
		String actual = ticTacToe.play(1, 1);
		assertEquals("No winner", actual);
	}

	@Test
	public void whenPlayAndWholeHorizontalLineThenWinner() {
		ticTacToe.play(1, 1); // X
		ticTacToe.play(1, 2); // O
		ticTacToe.play(2, 1); // X
		ticTacToe.play(2, 2); // O
		String actual = ticTacToe.play(3, 1); // X
		assertEquals("X is the winner", actual);
	}

	@Test
	public void whenPlayAndWholeVerticalLineThenWinner() {
		ticTacToe.play(2, 1); // X
		ticTacToe.play(1, 1); // O
		ticTacToe.play(3, 1); // X
		ticTacToe.play(1, 2); // O
		ticTacToe.play(2, 2); // X
		String actual = ticTacToe.play(1, 3); // O
		assertEquals("O is the winner", actual);
	}

	@Test
	public void whenPlayAndTopBottomTopDiagonalLineThenWinner() {
		ticTacToe.play(1, 1); // X
		ticTacToe.play(1, 2); // O
		ticTacToe.play(2, 2); // X
		ticTacToe.play(1, 3); // O
		String actual = ticTacToe.play(3, 3); // O
		assertEquals("X is the winner", actual);
	}

	@Test
	public void whenPlayAndBottomTopDiagonalLineThenWinner() {
		ticTacToe.play(1, 3); // X
		ticTacToe.play(1, 1); // O
		ticTacToe.play(2, 2); // X
		ticTacToe.play(1, 2); // O
		String actual = ticTacToe.play(3, 1); // O
		assertEquals("X is the winner", actual);
	}
}
