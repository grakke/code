import React, { useEffect, useState } from 'react'
import personService from './services/persons'

const deleteById = (id) => {
  // TODO:名字已存在用户，进行更新
  personService.deleteById(id)
}

const Display = ({ persons, kw }) => {
  persons = kw ? persons.filter(person => person['name'].toLowerCase().indexOf(kw.toLowerCase()) !== -1) : persons

  return (
    <div>
      <h2>Numbers</h2>
      {persons.map((person, index) => (
        <p key={index}> name:{person.name} number:{person.number}
          <button onClick={deleteById(person.id)} >
            delete
          </button>
        </p>
      ))
      }
    </div >
  )
}

const App = () => {
  const [persons, setPersons] = useState([
    { name: 'Arto Hellas' }
  ])
  const [newName, setNewName] = useState('')
  const [newNumber, setNewNumber] = useState('')
  const [kw, setKw] = useState('')

  useEffect(() => {
    console.log('effect')
    personService.getAll()
      .then(initialPersons => {
        console.log('promise fulfilled')
        setPersons(initialPersons)
      })
  }, [])

  const nameObject = {
    name: newName,
    number: newNumber
  }

  const addNewName = (event) => {
    event.preventDefault()

    personService.create(nameObject)
      .then(returnedNote => {
        setPersons(persons.concat(returnedNote))
        setNewName('')
      })

    setNewName('')
    setNewNumber('')
  }

  const handleNameChange = (event) => setNewName(event.target.value)
  const handleNumberChange = (event) => setNewNumber(event.target.value)
  const handleKwChange = (event) => setKw(event.target.value)

  return (
    <div>
      <h2>Phone Book</h2>
      <h2>add a new</h2>

      <form onSubmit={addNewName}>
        <div>name: <input value={newName} onChange={handleNameChange} /></div>
        <div>number: <input value={newNumber} onChange={handleNumberChange} /></div>
        <div>
          <button type="submit">add</button>
        </div>
      </form>
      <h2>Numbers</h2>
      <div>filter shown with <input value={kw} onChange={handleKwChange} /></div>
      <Display persons={persons} kw={kw}></Display>
    </div >
  )
}

export default App
