package tests

import (
	mysql "go-web/model"
	"testing"
	"time"
)

func TestMysql(t *testing.T) {
	db, err := mysql.OpenDB()
	if err != nil {
		t.Fatal(err)
	}
	defer db.Close()

	if err := mysql.CreateUsersTable(db); err != nil {
		t.Fatal(err)
	}

	userID, err := mysql.InsertUser(db, "Henry", "password", time.Now())
	if err != nil {
		t.Fatal(err)
	}
	if userID <= 0 {
		t.Fatalf("expected userID > 0, got %d", userID)
	}

	userRow, err := mysql.QueryUserByID(db, userID)
	if err != nil {
		t.Fatal(err)
	}
	if userRow.Username != "Henry" {
		t.Fatalf("expected username Henry, got %s", userRow.Username)
	}

	users, err := mysql.ListUsers(db)
	if err != nil {
		t.Fatal(err)
	}
	if len(users) == 0 {
		t.Fatal("expected at least one user")
	}

	deleted, err := mysql.DeleteUserByID(db, userID)
	if err != nil {
		t.Fatal(err)
	}
	if deleted != 1 {
		t.Fatalf("expected 1 deleted row, got %d", deleted)
	}
}
