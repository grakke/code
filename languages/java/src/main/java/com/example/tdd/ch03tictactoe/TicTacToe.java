package com.example.tdd.ch03tictactoe;

public class TicTacToe {
	private final Character[][] board = {{'\0', '\0', '\0'}, {'\0', '\0', '\0'}, {'\0', '\0', '\0'}};
	private char lastPlayer = '\0';
	private static final int SIZE = 3;

	public String play(int x, int y) {
		checkAxis(x);
		checkAxis(y);
		setBox(x, y);
		lastPlayer = nextPlayer();
		if (isWin(x, y)) return lastPlayer + " is the winner";

		return "No winner";
	}

	private boolean isWin(int x, int y) {
		int playerTotal = lastPlayer * SIZE;
		char diagonal1, diagonal2, horizontal, vertical;
		diagonal1 = diagonal2 = horizontal = vertical = '\0';

		for (int i = 0; i < SIZE; i++) {
			horizontal += board[i][y - 1];
			vertical += board[x - 1][i];
			diagonal1 += board[i][i];
			diagonal2 += board[i][SIZE - i - 1];
		}

		return diagonal1 == playerTotal || diagonal2 == playerTotal || vertical == playerTotal || horizontal == playerTotal;
	}

	private void setBox(int x, int y) {
		if (board[x - 1][y - 1] != '\0') {
			throw new RuntimeException("Box is occupied");
		} else {
			board[x - 1][y - 1] = 'X';
		}
	}

	private static void checkAxis(int axis) {
		if (axis < 1 || axis > SIZE) {
			throw new RuntimeException("X is outside board");
		}
	}

	public char nextPlayer() {
		if (lastPlayer == 'X') {
			return 'O';
		}

		return 'X';
	}
}
