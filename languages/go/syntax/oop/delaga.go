package oop

import "fmt"

type Widget struct {
	X, Y int
}

type Label struct {
	Widget        // Embedding (delegation)
	Text   string // Aggregation
	X      int    // Override
}

func (label Label) Paint() {
	// [0xc4200141e0] - Label.Paint("State")
	fmt.Printf("[%p] - Label.Paint(%q)\n",
		&label, label.Text)
}

type Button struct {
	Label // Embedding (delegation)
}

func NewButton(x, y int, text string) Button {
	return Button{Label{Widget{x, y}, text, x}}
}
func (button Button) Paint() { // Override
	fmt.Printf("[%p] - Button.Paint(%q)\n",
		&button, button.Text)
}
func (button Button) Click() {
	fmt.Printf("[%p] - Button.Click()\n", &button)
}

type ListBox struct {
	Widget          // Embedding (delegation)
	Texts  []string // Aggregation
	Index  int      // Aggregation
}

func (listBox ListBox) Paint() {
	fmt.Printf("[%p] - ListBox.Paint(%q)\n",
		&listBox, listBox.Texts)
}
func (listBox ListBox) Click() {
	fmt.Printf("[%p] - ListBox.Click()\n", &listBox)
}

type Painter interface {
	Paint()
}

type Clicker interface {
	Click()
}
