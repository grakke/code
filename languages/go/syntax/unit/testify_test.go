package unit

import (
	"fmt"
	"testing"

	"github.com/stretchr/testify/assert"
)

func TestSomething(t *testing.T) {

	//断言相等
	assert.Equal(t, 123, 123, "they should be equal")

	//断言不相等
	assert.NotEqual(t, 123, 456, "they should not be equal")

	// assert.Nil(t, object)

	// if assert.NotNil(t, object) {
	// 	// now we know that object isn't nil, we are safe to make
	// 	// further assertions without causing any errors
	// 	assert.Equal(t, "Something", object.Value)
	// }
}

func TestCheckUrl2(t *testing.T) {
    ok := CheckUrl("learnku.com")
    assert.True(t, ok)
}

func TestCheckUrl3(t *testing.T) {
    assert := assert.New(t)
    var tests = []struct {
        input    string
        expected bool
    }{
        {"xdcute.com", true},
        {"xxx.com", false},
    }
    for _, test := range tests {
        fmt.Println(test.input)
        assert.Equal(CheckUrl(test.input), test.expected)
    }
}