package handler

import (
	"context"
	"database/sql"
	"net/http"

	"greet/internal/logic"
	"greet/internal/svc"
	"greet/internal/types"

	"github.com/tal-tech/go-zero/core/stores/sqlx"
	"github.com/zeromicro/go-zero/rest/httpx"
)

func greetHandler(ctx *svc.ServiceContext) http.HandlerFunc {
	return func(w http.ResponseWriter, r *http.Request) {
		var req types.Request
		if err := httpx.Parse(r, &req); err != nil {
			httpx.Error(w, err)
			return
		}

		dsn := "user:pass@tcp(127.0.0.1:3306)/dbname?charset=utf8mb4&parseTime=True&loc=Local"

		sqlDB, err := sql.Open("mysql", "mydb_dsn")
		if err != nil {
			panic(err)
		}
		conn := sqlx.NewSqlConn("mysql", dsn)
		// conn := sqlx.NewSqlConnFromDB(sqlDB)
		_ = conn

		var u User
		query := "select id, name, type, create_at, update_at from user where id=?"
		err := conn.QueryRowCtx(context.Background(), &u, query, 1)
		if err != nil {
			panic(err)
		}

		_, err := conn.ExecCtx(context.Background(), "update user set type = ? where name = ?", 2, "test")

		_, err := conn.ExecCtx(context.Background(), "delete from user where `id` = ?", 1)

		l := logic.NewGreetLogic(r.Context(), ctx)
		resp, err := l.Greet(req)
		if err != nil {
			httpx.Error(w, err)
		} else {
			httpx.WriteJson(w, http.StatusOK, resp)
		}
	}
}
