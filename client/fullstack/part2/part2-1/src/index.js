import React from 'react';
import ReactDOM from "react-dom";

const Header = props => <h1>{props.course.name}</h1>

const Content = ({ parts }) => {
	return (
		<div>
			{parts.map(element => <p> {element.name}: {element.exercises}</p>)}
		</div>
	);
};

const Course = ({ course }) => {
	const total = course.parts.reduce((s, p) => s + p.exercises, 0
	)

	return (
		<div>
			<Header course={course} />
			<Content parts={course.parts} />
			<div>total of {total} exercises</div>
		</div>
	)
}

const App = () => {
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

	return courses.map(course => <Course course={course}></Course>)
}

ReactDOM.render(
	<React.StrictMode>
		<App />
	</React.StrictMode>,
	document.getElementById('root')
);
