import React, { useState } from 'react'
import ReactDOM from 'react-dom'

const App = ({ anecdotes }) => {
    const [selected, setSelected] = useState(0)

    const nextAnecdote = () => {
        setSelected(Math.floor(Math.random() * (anecdotes.length)))
    }

    const points = [0, 0, 0, 0, 0]
    const copy = [...points]
    const vote = (selected) => copy[selected] + 1

    return (
        <div>
            {anecdotes[selected]}<br />
            has {copy[selected]} votes <br />
            <button onClick={nextAnecdote} >next anecdote</button>
            <button onClick={vote} >vote</button>
            <h2>Anecdotes with most votes</h2>
        </div>
    )
}

const anecdotes = [
    'If it hurts, do it more often',
    'Adding manpower to a late software project makes it later!',
    'The first 90 percent of the code accounts for the first 90 percent of the development time...The remaining 10 percent of the code accounts for the other 90 percent of the development time.',
    'Any fool can write code that a computer can understand. Good programmers write code that humans can understand.',
    'Premature optimization is the root of all evil.',
    'Debugging is twice as hard as writing the code in the first place. Therefore, if you write the code as cleverly as possible, you are, by definition, not smart enough to debug it.'
]

ReactDOM.render(
    <App anecdotes={anecdotes} />,
    document.getElementById('root')
)
