package mysql

import (
	"database/sql"
	"time"

	_ "github.com/go-sql-driver/mysql"
)

type User struct {
	ID        int64
	Username  string
	Password  string
	CreatedAt time.Time
}

func OpenDB() (*sql.DB, error) {
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

func CreateUsersTable(db *sql.DB) error {
	createTable := `
CREATE TABLE IF NOT EXISTS users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	created_at DATETIME NOT NULL
);`
	_, err := db.Exec(createTable)
	return err
}

func InsertUser(db *sql.DB, username, password string, createdAt time.Time) (int64, error) {
	res, err := db.Exec(`INSERT INTO users (username, password, created_at) VALUES (?, ?, ?)`, username, password, createdAt)
	if err != nil {
		return 0, err
	}
	return res.LastInsertId()
}

func QueryUserByID(db *sql.DB, id int64) (User, error) {
	var u User
	query := `SELECT id, username, password, created_at FROM users WHERE id = ?`
	err := db.QueryRow(query, id).Scan(&u.ID, &u.Username, &u.Password, &u.CreatedAt)
	return u, err
}

func ListUsers(db *sql.DB) ([]User, error) {
	rows, err := db.Query(`SELECT id, username, password, created_at FROM users`)
	if err != nil {
		return nil, err
	}
	defer rows.Close()

	var users []User
	for rows.Next() {
		var u User
		if err := rows.Scan(&u.ID, &u.Username, &u.Password, &u.CreatedAt); err != nil {
			return nil, err
		}
		users = append(users, u)
	}
	if err := rows.Err(); err != nil {
		return nil, err
	}
	return users, nil
}

func DeleteUserByID(db *sql.DB, id int64) (int64, error) {
	res, err := db.Exec(`DELETE FROM users WHERE id = ?`, id)
	if err != nil {
		return 0, err
	}
	return res.RowsAffected()
}

func RunDemo() error {
	db, err := OpenDB()
	if err != nil {
		return err
	}
	defer db.Close()

	if err := CreateUsersTable(db); err != nil {
		return err
	}

	userID, err := InsertUser(db, "Henry", "password", time.Now())
	if err != nil {
		return err
	}

	if _, err := QueryUserByID(db, userID); err != nil {
		return err
	}

	if _, err := ListUsers(db); err != nil {
		return err
	}

	_, err = DeleteUserByID(db, userID)
	return err
}
