package handler

import (
	"bytes"
	"fmt"
	"io"
	"net/http"
	"strings"
)

func ReceiveFileHandler(w http.ResponseWriter, r *http.Request) {
	// Parse the multipart form
	err := r.ParseMultipartForm(32 << 20) // 32 MB
	var buf bytes.Buffer
	file, header, err := r.FormFile("file")
	if err != nil {
		panic(err)
	}
	defer file.Close()

	name := strings.Split(header.Filename, ".")
	fmt.Printf("File name %s\n", name[0])
	io.Copy(&buf, file)
	contents := buf.String()
	fmt.Println(contents)

	buf.Reset()
}
