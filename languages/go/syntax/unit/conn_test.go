package unit

import (
	"io"
	"net"
	"net/http"
	"net/http/httptest"
	"testing"

	"github.com/agiledragon/gomonkey/v2"
	. "github.com/smartystreets/goconvey/convey"
)

func handleError(t *testing.T, err error) {
	t.Helper()
	if err != nil {
		t.Fatal("failed", err)
	}
}

func TestConn(t *testing.T) {
	ln, err := net.Listen("tcp", "127.0.0.1:0")
	handleError(t, err)
	defer ln.Close()

	http.HandleFunc("/hello", helloHandler)
	go http.Serve(ln, nil)

	resp, err := http.Get("http://" + ln.Addr().String() + "/hello")
	handleError(t, err)

	defer resp.Body.Close()
	body, err := io.ReadAll(resp.Body)
	handleError(t, err)

	if string(body) != "hello world" {
		t.Fatal("expected hello world, but got", string(body))
	}
}

func TestConnByMock(t *testing.T) {
	w := httptest.NewRecorder()
	req := httptest.NewRequest("GET", "http://example.com/foo", nil)

	helloHandler(w, req)
	bytes, _ := io.ReadAll(w.Result().Body)

	if string(bytes) != "hello world" {
		t.Fatal("expected hello world, but got", string(bytes))
	}
}

func TestHttpGetWithTimeOut(t *testing.T) {

    Convey("TestHttpGetWithTimeOut", t, func() {
        Convey("TestHttpGetWithTimeOut normal", func() {
            ts := httptest.NewServer(http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
                w.WriteHeader(http.StatusOK)
                w.Write([]byte("TestHttpGetWithTimeOut success!!"))
                if r.Method != "GET" {
                    t.Errorf("Except 'Get' got '%s'", r.Method)
                }
                if r.URL.EscapedPath() != "/要访问的url" {
                    t.Errorf("Expected request to '/要访问的url', got '%s'", r.URL.EscapedPath())
                }
            }))
            // api := ts.URL
            defer ts.Close()
            // var header = make(map[string]string)
            // HttpGetWithTimeOut(api, header, 30)
        })
	})
}
func TestExec(t *testing.T) {
    Convey("test has digit", t, func() {
        Convey("for succ", func() {
            // outputExpect := "xxx-vethName100-yyy"
            // guard := Patch(osencap.Exec, func(_ string, _ ...string) (string, error) {
            //     return outputExpect, nil
            // })
            // defer guard.Unpatch()
            // output, err := osencap.Exec(any, any)
            // So(output, ShouldEqual, outputExpect)
            // So(err, ShouldBeNil)
        })
    })
}

var num = 10 //全局变量

func TestApplyGlobalVar(t *testing.T) {
	Convey("TestApplyGlobalVar", t, func() {
		Convey("change", func() {
			patches := gomonkey.ApplyGlobalVar(&num, 150)
			defer patches.Reset()
			So(num, ShouldEqual, 150)
		})

		Convey("recover", func() {
			So(num, ShouldEqual, 10)
		})
	})
}
