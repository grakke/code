package unit

import (
	"fmt"
	"os"
	"testing"

	"github.com/stretchr/testify/assert"
)

func setup() {
	fmt.Println("Before all tests")
}

func teardown() {
	fmt.Println("After all tests")
}

type calcCase struct{ A, B, Expected int }

func createMulTestCase(t *testing.T, c *calcCase) {
	t.Helper()
	if ans := Mul(c.A, c.B); ans != c.Expected {
		t.Fatalf("%d * %d expected %d, but %d got",
			c.A, c.B, c.Expected, ans)
	}

}

func TestMul(t *testing.T) {
	// t.Run("pos", func(t *testing.T) {
	// 	if Mul(2, 3) != 6 {
	// 		t.Fatal("fail")
	// 	}

	// })
	// t.Run("neg", func(t *testing.T) {
	// 	if Mul(2, -3) != -6 {
	// 		t.Fatal("fail")
	// 	}
	// })

	cases := []struct {
		Name           string
		A, B, Expected int
	}{
		{"pos", 2, 3, 6},
		{"neg", 2, -3, -6},
		{"zero", 2, 0, 0},
	}

	for _, c := range cases {
		t.Run(c.Name, func(t *testing.T) {
			if ans := Mul(c.A, c.B); ans != c.Expected {
				t.Fatalf("%d * %d expected %d, but %d got",
					c.A, c.B, c.Expected, ans)
			}
		})
	}

	createMulTestCase(t, &calcCase{2, 3, 6})
	createMulTestCase(t, &calcCase{2, -3, -6})
	createMulTestCase(t, &calcCase{2, 0, 0})
}

func TestSomething(t *testing.T) {

	assert.Equal(t, 123, 123, "they should be equal")
	assert.NotEqual(t, 123, 456, "they should not be equal")
	// assert.Nil(t, objec)

	// if assert.NotNil(t, object) {
	// 	assert.Equal(t, "Something", object.Value)
	// }
}

func TestDivision(t *testing.T) {
	if i, e := Division(6, 2); i != 3 || e != nil { //try a unit test on function
		t.Error("除法函数测试没通过")
	} else {
		t.Log("第一个测试通过了")
	}
}

func BenchmarkDivision(b *testing.B) {
	for i := 0; i < b.N; i++ { //use b.N for looping
		Division(20, 5)
	}
}

func BenchmarkTimeConsumingFunction(b *testing.B) {
	b.StopTimer() //调用该函数停止压力测试的时间计数

	//	 做一些初始化的工作,例如读取文件数据,数据库连接之类的,这样这些时间不影响测试函数本身的性能
	b.StartTimer() //重新开始时间
	for i := 0; i < b.N; i++ {
		Division(4, 5)
	}
}

func TestMain(m *testing.M) {
	setup()
	code := m.Run()
	teardown()
	os.Exit(code)
}
