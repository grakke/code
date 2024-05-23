package unit

func StringSliceEqual(a, b []string) bool {
    if len(a) != len(b) {
        return false
    }

    if (a == nil) != (b == nil) {
        return false
    }

    for i, v := range a {
        if v != b[i] {
            return false
        }
    }
    return true
}

func Hello() string {
    return "Hello, world"
}

func CheckUrl(url string) bool {
    var urlList = [2]string{"learnku.com", "xdcute.com"}
    for v := range urlList {
        if urlList[v] == url {
            return true
        }
    }
    return false
}
