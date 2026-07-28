package handler

import (
	"fmt"
	"net/http"

	"github.com/gorilla/securecookie"
)

var hashKey = securecookie.GenerateRandomKey(64)

// 签名
// var s = securecookie.New(hashKey, nil)
// 加密
var blockKey = securecookie.GenerateRandomKey(32)
var s = securecookie.New(hashKey, blockKey)

func SetCookieHandler(w http.ResponseWriter, r *http.Request) {
	encoded, err := s.Encode("cookie-name", "cookie-value")
	if err == nil {
		cookie := &http.Cookie{
			Name:  "cookie-name",
			Value: encoded,
			Path:  "/",
		}
		http.SetCookie(w, cookie)
		fmt.Fprintln(w, encoded)
	}
}

func ReadCookieHandler(w http.ResponseWriter, r *http.Request) {
	if cookie, err := r.Cookie("cookie-name"); err == nil {
		var value string
		if err = s.Decode("cookie-name", cookie.Value, &value); err == nil {
			fmt.Fprintln(w, value)
		}
	}
	for _, cookie := range r.Cookies() {
		fmt.Fprintf(w, "Cookie field %q, Value %q\n", cookie.Name, cookie.Value)
	}
}
