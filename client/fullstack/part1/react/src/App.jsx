import { useState, React } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'

const Hello = (props) => {
  return (
    <div>
      Hello {props.name}, you are {props.age} years old
    </div>
  )
}

const Header = (props) => {
  return (
    <h1> {props.course} </h1>
  )
}
const Part = (props) => {
  return (
    <p>
      {props.info.part} {props.info.exercises}
    </p>
  )
}
const Content = (props) => {
  return (
    <div>
      <Part info={props.course_info[0]} />
      <Part info={props.course_info[1]} />
      <Part info={props.course_info[2]} />
    </div>
  )
}
const Total = (props) => {
  return (
    <p>Number of exercises {props.exercises1 + props.exercises2 + props.exercises3}</p>
  )
}

const Footer = () => {
  return (
    <div>
      greeting app created by <a href='https://github.com/grakke'>henry</a>
    </div>
  )
}

function App() {
  const [count, setCount] = useState(0)
  const now = new Date()
  const a = 10
  const b = 20
  console.log(now, a + b)
  const friends = ['Peter', 'Maya']

  const course = 'Half Stack application development'
  const courseInfo = [
    { part: 'Fundamentals of React', exercises: 10 },
    { part: 'Using props to pass data', exercises: 7 },
    { part: 'State of a component', exercises: 14 }
  ]

  return (
    <>
      <h1>Greetings</h1>
      <p>Hello world, it is {now.toString()}</p>
      <p>
        {a} plus {b} is {a + b}
      </p>
      <Hello name='henry' age={37} />
      <p>{friends}</p>
      <div className="card">
        <button onClick={() => setCount((count) => count + 1)}>
          count is {count}
        </button>
      </div>

      {/* Exercises */}
      <Header course={course} />
      <Content course_info={courseInfo} />
      <Total exercises1={courseInfo[0].exercises} exercises2={courseInfo[1].exercises} exercises3={courseInfo[2].exercises} />
      <Footer />
    </>
  )
  // Cannot read properties of undefined (reading 'createElement')
  return React.createElement(
    'div',
    null,
    React.createElement(
      'p', null, 'Hello world, it is ', now.toString()
    ),
    React.createElement(
      'p', null, a, ' plus ', b, ' is ', a + b
    )
  )
}

export default App
