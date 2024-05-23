package unit

import (
	"testing"

	"github.com/smartystreets/goconvey/convey"
	. "github.com/smartystreets/goconvey/convey"
)

func TestStringSliceEqual(t *testing.T) {
	Convey("TestStringSliceEqual的描述", t, func() {
		a := []string{"hello", "goconvey"}
		b := []string{"hello", "goconvey"}
		So(StringSliceEqual(a, b), ShouldBeTrue)
	})
}

func TestStringSliceEqual1(t *testing.T) {
	Convey("TestStringSliceEqual", t, func() {
		Convey("true when a != nil  && b != nil", func() {
			a := []string{"hello", "goconvey"}
			b := []string{"hello", "goconvey"}
			So(StringSliceEqual(a, b), ShouldBeTrue)
		})

		Convey("true when a ＝= nil  && b ＝= nil", func() {
			So(StringSliceEqual(nil, nil), ShouldBeTrue)
		})
	})
}
func TestHello(t *testing.T) {
	got := Hello()
	want := "Hello, world"

	if got != want {
		t.Errorf("got %q want %q", got, want)
	}
}

func TestCheckUrl(t *testing.T) {
	Convey("TestCheckTeachUrl", t, func() {
		Convey("TestCheckTeachUrl true", func() {
			ok := CheckUrl("learnku.com")
			So(ok, convey.ShouldBeTrue)
		})

		Convey("TestCheckTeachUrl false", func() {
			ok := CheckUrl("xxxxxx.com")
			So(ok, convey.ShouldBeFalse)
		})

		Convey("TestCheckTeachUrl null", func() {
			ok := CheckUrl("")
			So(ok, convey.ShouldBeFalse)
		})
	})
}

func TestSpec(t *testing.T) {

	// Only pass t into top-level Convey calls
	Convey("Given some integer with a starting value", t, func() {
		x := 1

		Convey("When the integer is incremented", func() {
			x++

			Convey("The value should be greater by one", func() {
				So(x, ShouldEqual, 2)
			})
		})
	})
}
