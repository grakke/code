import { useState, React } from 'react'

import './App.css'
import Course from './components/Course'

const Hello = ({ name, age }) => {
  const bornYear = () => new Date().getFullYear() - age

  return (
    <div>
      <p>
        Hello {name}, you are {age} years old
      </p>
      <p>So you were probably born in {bornYear()}</p>
    </div>
  )
}

const Display = ({ count }) => <div>count is {count}</div>
const Button = ({ onClick, text }) =>
  <button onClick={onClick}>
    {text}
  </button>

const History = (props) => {
  if (props.allClicks.length === 0) {
    return (
      <div>
        the app is used by pressing the buttons
      </div>
    )
  }
  return (
    <div>
      Button press history: {props.allClicks.join(' ')}
    </div>
  )
}

const Footer = () => {
  return (
    <div>
      greeting app created by <a href='https://github.com/grakke'>henry</a>
    </div>
  )
}

const App = () => {
  const now = new Date()
  const a = 10
  const b = 20
  console.log(now, a + b)

  const name = 'Peter'
  const age = 37
  const friends = ['Peter', 'Maya']

  const courses = [{
    id: 1,
    name: 'Half Stack application development',
    parts: [
      {
        name: 'Fundamentals of React',
        exercises: 10,
        id: 1
      },
      {
        name: 'Using props to pass data',
        exercises: 7,
        id: 2
      },
      {
        name: 'State of a component',
        exercises: 14,
        id: 3
      },
      {
        name: 'Redux',
        exercises: 11,
        id: 4
      }
    ]
  },
    {
      name: 'Node.js',
      id: 2,
      parts: [
        {
          name: 'Routing',
          exercises: 3,
          id: 1
        },
        {
          name: 'Middlewares',
          exercises: 7,
          id: 2
      }
    ]
  }
  ]

  const [count, setCount] = useState(0)

  const increaseByOne = () => setCount(count + 1)
  const decreaseByOne = () => setCount(count - 1)
  const setToZero = () => setCount(0)

  const [clicks, setClicks] = useState({
    left: 0, right: 0
  })
  const [allClicks, setAll] = useState([])
  const [total, setTotal] = useState(0)

  const handleLeftClick = () => {
    setAll(allClicks.concat('L'))
    const updatedLeft = clicks.left + 1
    setClicks({ ...clicks, left: updatedLeft })
    setTotal(updatedLeft + clicks.right)
  }
  const handleRightClick = () => {
    setAll(allClicks.concat('R'))
    const updateRight = clicks.right + 1
    setClicks({ ...clicks, right: updateRight })
    setTotal(clicks.left + updateRight)
  }

  return (
    <>
      <div>
        <h2>Direct Rendering:Greetings </h2>
        <p>Hello world, it is {now.toString()}</p>
        <p>
          {a} plus {b} is {a + b}
        </p>
        <Hello name={name} age={age} />
        <p>{friends}</p>
      </div>

      {courses.map(course =>
        <div id={course.id}><Course course={course} /></div>)}

      <Footer />
      <div className="card">
        <h2>stateful</h2>
        <Display count={count} />
        <Button onClick={increaseByOne} text='plus' />
        <Button onClick={setToZero} text='zero' />
        <Button onClick={decreaseByOne} text='minus' />
      </div>

      <div>
        <h2>A more complex state</h2>
        {clicks.left}
        <Button onClick={handleLeftClick} text='left' />
        <Button onClick={handleRightClick} text='right' />
        {clicks.right}
        <p>{allClicks.join(' ')}</p>
        <p>Total: {total}</p>
        <History allClicks={allClicks} />
      </div>
    </>
  )
}

export default App
