package user

import "github.com/gorilla/sessions"

const (
	//64位
	cookieStoreAuthKey = "..."
	//AES encrypt key必须是16或者32位
	cookieStoreEncryptKey = "..."
)

var sessionStore *sessions.CookieStore

func init() {
	sessionStore = sessions.NewCookieStore(
		[]byte(cookieStoreAuthKey),
		[]byte(cookieStoreEncryptKey),
	)

	sessionStore.Options = &sessions.Options{
		HttpOnly: true,
		MaxAge:   60 * 15,
	}

}
