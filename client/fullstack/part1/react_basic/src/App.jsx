import { useState, React } from 'react'

import './App.css'

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

const Header = ({ course }) => {
  return (
    <h2>Compontent: {course} </h2>
  )
}
const Part = ({ info }) => {
  return (
    <p>
      {info.name}: {info.exercises}
    </p>
  )
}

const Content = ({ parts }) => {
  return (
    <div>
      <Part info={parts[0]} />
      <Part info={parts[1]} />
      <Part info={parts[2]} />
    </div>
  )
}
const Total = ({ parts }) => {
  return (
    <p>Number of exercises: {parts[0].exercises + parts[1].exercises + parts[2].exercises}</p>
  )
}
const Display = ({ count }) => {
  return (
    <div>count is {count}</div>
  )
}
const Button = (props) => {
  return (
    <button onClick={props.onClick}>
      {props.text}
    </button>
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

  const name = 'Peter'
  const age = 37
  const friends = ['Peter', 'Maya']

  const course = {
    name: 'Half Stack application development',
    parts: [
      {
        name: 'Fundamentals of React',
        exercises: 10
      },
      {
        name: 'Using props to pass data',
        exercises: 7
      },
      {
        name: 'State of a component',
        exercises: 14
      }
    ]
  }

  const increaseByOne = () => setCount(count + 1)
  const decreaseByOne = () => setCount(count - 1)
  const setToZero = () => setCount(0)

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

      <div>
        <Header course={course.name} />
        <Content parts={course.parts} />
        <Total parts={course.parts} />
        <Footer />
      </div>

      <div className="card">
        <h2>stateful</h2>
        <Display count={count} />
        <Button onClick={increaseByOne} text='plus' />
        <Button onClick={setToZero} text='zero' />
        <Button onClick={decreaseByOne} text='minus' />
      </div>
    </>
  )
}

export default App
