package unit

import (
	"errors"
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
}
