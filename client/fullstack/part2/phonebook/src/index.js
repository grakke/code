import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import Countries from './Countries';
import './index.css';
import Notes from './Notes.js';

ReactDOM.render(
	<App />,
	document.getElementById('root')
);

ReactDOM.render(
	<Notes />,
	document.getElementById('note')
)

ReactDOM.render(
	<Countries />,
	document.getElementById('country')
)
