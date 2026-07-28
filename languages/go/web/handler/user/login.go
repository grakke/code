package user

import (
	"database/sql"
	"fmt"
	mysql "go-web/model"
	"net/http"
)

var sessionCookieName = "user-session"

func Login(w http.ResponseWriter, r *http.Request) {
	session, err := sessionStore.Get(r, sessionCookieName)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	// 登录验证
	name := r.FormValue("name")
	pass := r.FormValue("password")
	_, err = authenticateUser(name, pass)
	if err != nil {
		http.Error(w, err.Error(), http.StatusUnauthorized)
		return
	}
	// 在session中标记用户已经通过登录验证
	session.Values["authenticated"] = true
	err = session.Save(r, w)

	fmt.Fprintln(w, "登录成功!", err)
}

func authenticateUser(name, pass string) (bool, error) {
	db, err := mysql.OpenDB()
	if err != nil {
		return false, err
	}
	defer db.Close()

	u, err := mysql.QueryUserByName(db, name)
	if err != nil {
		if err == sql.ErrNoRows {
			return false, fmt.Errorf("用户不存在")
		}
		return false, err
	}

	if u.Password != pass {
		return false, fmt.Errorf("密码错误")
	}
	return true, nil
}
