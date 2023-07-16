const express = require('express')
const app = express()
const requestLogger = require('./middleware/requestLogger')
const morgan = require('morgan')
const cors = require('cors')

app.use(express.static('build'))
app.use(cors())
// app.use(requestLogger)
app.use(express.json())
app.use(morgan('dev'))


let notes = [
	{
		id: 1,
		content: "HTML is easy",
		date: "2019-05-30T17:30:31.098Z",
		important: true
	},
	{
		id: 2,
		content: "Browser can execute only Javascript",
		date: "2019-05-30T18:39:34.091Z",
		important: false
	},
	{
		id: 3,
		content: "GET and POST are the most important methods of HTTP protocol",
		date: "2019-05-30T19:20:14.298Z",
		important: true
	}
]

app.get('/', (req, res) => {
	res.send('<h1>Hello World!</h1>')
})

app.get('/api/notes', (req, res) => {
	res.json(notes)
})

app.get('/api/notes/:id', (request, response) => {
	const id = Number(request.params.id)
	const note = notes.find(note => note.id === id)

	if (note) {
		response.json(note)
	} else {
		response.status(404).end()
	}
})

const generateId = (object) => {
	const maxId = object.length > 0
		? Math.max(...object.map(n => n.id))
		: 0
	return maxId + 1
}

app.post('/api/notes', (request, response) => {
	const body = request.body

	if (!body.content) {
		return response.status(400).json({
			error: 'content missing'
		})
	}

	const note = {
		content: body.content,
		important: body.important || false,
		date: new Date(),
		id: generateId(notes),
	}

	notes = notes.concat(note)

	response.json(note)
})

app.delete('/api/notes/:id', (request, response) => {
	const id = Number(request.params.id)
	notes = notes.filter(note => note.id !== id)

	response.status(204).end()
})

let persons = [{
	"name": "Arto Hellas",
	"number": "040-1234567",
	"id": 1
},
{
	"name": "Ada Lovelace",
	"number": "39-44-5323523",
	"id": 2
},
{
	"name": "Dan Abramov",
	"number": "12-43-234345",
	"id": 3
},
{
	"name": "Mary Poppendieck",
	"number": "39-23-6423122",
	"id": 4
}]

app.get('/api/persons', (req, res) => {
	res.json(persons)
})

app.get('/api/info', (req, res) => {
	res.json('Phonebook has info for ' + persons.length + ' people')
})

app.get('/api/persons/:id', (request, response) => {
	const id = Number(request.params.id)
	person = persons.find(person => person.id === id)


	if (person) {
		response.json(person)
	} else {
		response.status(404).end()
	}
})

app.post('/api/persons', (request, response) => {
	const body = request.body
	if (body.name === '' || body.number === '') {
		return response.status(400).json({ error: 'name or number missing' })
	}

	if (persons.find(person => person.name === body.name)) {
		return response.status(400).json({ error: 'name must be unique' })
	}
	const person = {
		name: body.name,
		number: body.number,
		id: generateId(persons),
	}

	persons = persons.concat(person)

	response.json(person)
})

app.delete('/api/persons/:id', (request, response) => {
	const id = Number(request.params.id)
	persons = persons.filter(person => person.id !== id)

	response.status(204).end()
})

const PORT = process.env.PORT || 3001
app.listen(PORT, () => {
	console.log(`Server running on port ${PORT}`)
})
