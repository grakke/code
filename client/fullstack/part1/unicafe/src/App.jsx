import { useState, React } from 'react'

import './App.css'

const Button = (props) => (
  <button onClick={props.handleClick}>
    {props.text}
  </button>
)
const StatisticLine = ({ name, score }) => (
  <tr>
    <td width='140px'>
      {name}
    </td>
    <td>
      {score}
    </td>
  </tr>
)

const Statistics = ({ good, bad, neutral }) => {
  let all = good + bad + neutral
  let average = (good + bad * -1) / all
  average = !isNaN(average) ? average : 0
  let positive = good ? (good / all) * 100 + '%' : 0

  if (all === 0) {
    return `No feedback given`
  }

  return (
    <div>
      <h2>statistics</h2>
      <table>
        <StatisticLine name='good' score={good} />
        <StatisticLine name='neutral' score={neutral} />
        <StatisticLine name='bad' score={bad} />
        <StatisticLine name='all' score={all} />
        <StatisticLine name='average' score={average} />
        <StatisticLine name='positive' score={positive} />
      </table>
    </div>
  )
}
const points = [0, 0, 7, 11, 8, 9, 0, 99]

const App = () => {
  const [good, setGood] = useState(0)
  const [neutral, setNeutral] = useState(0)
  const [bad, setBad] = useState(0)

  const anecdotes = [
    'If it hurts, do it more often.',
    'Adding manpower to a late software project makes it later!',
    'The first 90 percent of the code accounts for the first 90 percent of the development time...The remaining 10 percent of the code accounts for the other 90 percent of the development time.',
    'Any fool can write code that a computer can understand. Good programmers write code that humans can understand.',
    'Premature optimization is the root of all evil.',
    'Debugging is twice as hard as writing the code in the first place. Therefore, if you write the code as cleverly as possible, you are, by definition, not smart enough to debug it.',
    'Programming without an extremely heavy use of console.log is same as if a doctor would refuse to use x-rays or blood tests when diagnosing patients.',
    'The only way to go fast, is to go well.'
  ]
  const [selected, setSelected] = useState(0)
  const nextIndex = parseInt(Math.random() * anecdotes.length, 10)
  console.log(nextIndex)
  const handleVote = () => {
    // const copy = { ...points }
    // copy[2] += 1
  }
  const mostVotesCount = () => {
    let index = 0
    for (let i = 1; i < anecdotes.length; i++) {
      if (points[i] >= points[index]) {
        index = i
      }
    }
    return index
  }
  const mostVotesIndex = mostVotesCount()
  console.log(mostVotesIndex)
  return (
    <div>
      <div>
        <h2>give feedback</h2>
        <div>
          <Button handleClick={() => setGood(good + 1)} text="good" />
          <Button handleClick={() => setNeutral(neutral + 1)} text="neutral" />
          <Button handleClick={() => setBad(bad + 1)} text="bad" />
        </div>

        <Statistics good={good} bad={bad} neutral={neutral} />
      </div>

      <div>
        <h2>Anecdote of the Day</h2>
        <div id='anecdote'>
          {anecdotes[selected]}
        </div>
        <div id='anecdote'>
          <p> has {points[selected]} votes</p>
        </div>
        <Button handleClick={handleVote} text="Vote" index={selected} />
        <Button handleClick={() => setSelected(nextIndex)} text="Next anecdote" />

        <h2>Anecdote of the most votes</h2>
        <div id='anecdote'>
          {anecdotes[mostVotesIndex]}
        </div>
        <div id='anecdote'>
          <p> has {points[mostVotesIndex]} votes</p>
        </div>
      </div>
    </div>
  )
}

export default App