import React from 'react';
import ReactDOM from 'react-dom/client'
import App from './App';
import Countries from './Countries';
import './index.css';

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>,
)

// ReactDOM.createRoot(document.getElementById('country')).render(
//   <React.StrictMode>
//     <Countries />
//   </React.StrictMode>,
// )
