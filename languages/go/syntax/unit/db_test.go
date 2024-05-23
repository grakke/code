package unit

import (
	"errors"
	"fmt"
	"io"
	"log"
	"net/http"
	"net/http/httptest"
	"testing"

	gomock "github.com/golang/mock/gomock"
)

func TestGetFromDB(t *testing.T) {
	ctrl := gomock.NewController(t)
	defer ctrl.Finish() // 断言 DB.Get() 方法是否被调用

	m := NewMockDB(ctrl)

	m.EXPECT().Get(gomock.Any()).DoAndReturn(func(key string) (int, error) {
		if key == "Sam" {
			return -1, nil
		}
		return 0, errors.New("not exist")
	})

	o1 := m.EXPECT().Get(gomock.Not("Sam")).Return(630, nil).Times(2)
	o2 := m.EXPECT().Get(gomock.Eq("Tom")).Return(100, errors.New("not exist")).AnyTimes()
	gomock.InOrder(o1, o2)

	m.EXPECT().Get(gomock.Any()).Do(func(key string) {
		t.Log(key)
	}).AnyTimes()

	if v := GetFromDB(m, "Sam"); v != -1 {
		t.Fatal("expected -1, but got", v)
	}
	GetFromDB(m, "Tom")
	GetFromDB(m, "ABC")

	// m.EXPECT().Get(gomock.Eq("Tom")).Return(0, errors.New("not exist"))
	// m.EXPECT().Get(gomock.Any()).Return(630, nil)
	// m.EXPECT().Get(gomock.Not("Sam")).Return(0, nil)
	// m.EXPECT().Get(gomock.Nil()).Return(0, errors.New("nil"))

	// m.EXPECT().Get(gomock.Not("Sam")).Return(0, nil)
	// m.EXPECT().Get(gomock.Any()).Do(func(key string) {
	// 	t.Log(key)
	// })
	// m.EXPECT().Get(gomock.Any()).DoAndReturn(func(key string) (int, error) {
	// 	if key == "Sam" {
	// 		return 630, nil
	// 	}
	// 	return 0, errors.New("not exist")
	// })
}

func TestGetName(t *testing.T) {
	//新建一个mockController
	ctrl := gomock.NewController(t)
	// 断言 DB.GetName() 方法是否被调用
	defer ctrl.Finish()

	//mock接口
	mock := NewMockOrderDBI(ctrl)
	//模拟传入值与预期的返回值
	mock.EXPECT().GetName(gomock.Eq(1225)).Return("xdcutecute")

	if v := mock.GetName(1225); v != "xdcutecute" {
		t.Fatal("expected xdcute, but got", v)
	} else {
		log.Println("通过mock取到的name：", v)
	}
}

// func TestSql(t *testing.T) {
// 	db, mock, err := sqlmock.New(sqlmock.QueryMatcherOption(sqlmock.QueryMatcherEqual))
// 	if err != nil {
// 		fmt.Println("fail to open sqlmock db: ", err)
// 	}
// 	defer db.Close()
// 	rows := sqlmock.NewRows([]string{"id", "pwd"}).
// 		AddRow(1, "apple").
// 		AddRow(2, "banana")
// 	mock.ExpectQuery("SELECT id, pwd FROM users").WillReturnRows(rows)
// 	res, err := db.Query("SELECT id, pwd FROM users")
// 	if err != nil {
// 		fmt.Println("fail to match expected sql.")
// 		return
// 	}
// 	defer res.Close()
// 	for res.Next() {
// 		var id int
// 		var pwd string
// 		res.Scan(&id, &pwd)
// 		fmt.Printf("Sql Result:\tid = %d, password = %s.\n", id, pwd)
// 	}
// 	if res.Err() != nil {
// 		fmt.Println("Result Return Error!", res.Err())
// 	}
// }

func TestHttp(t *testing.T) {
	handler := func(w http.ResponseWriter, r *http.Request) {
		io.WriteString(w, "{ \"status\": \"expected service response\"}")
	}

	req := httptest.NewRequest("GET", "https://test.net", nil)
	w := httptest.NewRecorder()
	handler(w, req) //处理该Request

	resp := w.Result()
	body, _ := io.ReadAll(resp.Body)
	fmt.Println(resp.StatusCode)
	fmt.Println(resp.Header.Get("Content-Type"))
	fmt.Println(string(body))
}
