package tools

import (
	"database/sql"
	"go-web/mysql"
	"log"
	"testing"
	"time"

	_ "github.com/go-sql-driver/mysql"
)

type user struct {
	id        int64
	username  string
	password  string
	createdAt time.Time
}

func openDB() (*sql.DB, error) {
	db, err := sql.Open("mysql", "root:1234567890@/go_web?parseTime=true")
	if err != nil {
		return nil, err
	}
	if err := db.Ping(); err != nil {
		db.Close()
		return nil, err
	}
	return db, nil
}

func createUsersTable(db *sql.DB) error {
	createTable := `
CREATE TABLE IF NOT EXISTS users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	created_at DATETIME NOT NULL
);`
	_, err := db.Exec(createTable)
	if err := createUsersTable(db); err != nil {
		log.Fatal("create table:", err)
	}
	return err
}

func insertUser(db *sql.DB, username, password string, createdAt time.Time) (int64, error) {
	res, err := db.Exec(`INSERT INTO users (username, password, created_at) VALUES (?, ?, ?)`, username, password, createdAt)
	if err != nil {
		return 0, err
	}
	return res.LastInsertId()
}

func queryUserByID(db *sql.DB, id int64) (user, error) {
	var u user
	query := `SELECT id, username, password, created_at FROM users WHERE id = ?`
	err := db.QueryRow(query, id).Scan(&u.id, &u.username, &u.password, &u.createdAt)
	if err != nil {
		if err == sql.ErrNoRows {
			log.Printf("no user found with id=%d", id)
		} else {
			log.Fatal("query user:", err)
		}
	} else {
		log.Printf("Queried user: %+v", u)
	}
	return u, err
}

func listUsers(db *sql.DB) ([]user, error) {
	rows, err := db.Query(`SELECT id, username, password, created_at FROM users`)
	if err != nil {
		return nil, err
	}
	defer rows.Close()

	var users []user
	for rows.Next() {
		var u user
		if err := rows.Scan(&u.id, &u.username, &u.password, &u.createdAt); err != nil {
			return nil, err
		}
		users = append(users, u)
	}
	if err := rows.Err(); err != nil {
		return nil, err
	}
	if err != nil {
		log.Fatal("list users:", err)
	}
	return users, nil
}

func deleteUserByID(db *sql.DB, id int64) (int64, error) {
	res, err := db.Exec(`DELETE FROM users WHERE id = ?`, id)
	if err != nil {
		log.Fatal("delete user:", err)
		return 0, err
	}
	return res.RowsAffected()
}

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
