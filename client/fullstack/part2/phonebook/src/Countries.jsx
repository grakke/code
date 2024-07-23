import axios from 'axios';
import React, { useEffect, useState } from 'react';
import Country from './Country';

const Countries = (props) => {
  const [countries, setCountries] = useState([])
  const [kw, setKw] = useState('')

  const handleKwChange = (event) => setKw(event.target.value)

  useEffect(() => {
    if (kw) {
      console.log('effect')
      axios
        .get('https://restcountries.eu/rest/v2/name/' + kw)
        .then(response => {
          console.log('promise fulfilled')
          setCountries(response.data)
        })
      console.log('render', setCountries.length, 'countries')

    }
  }, [kw])

  return (
    <div>
      <h1>Countries</h1>
      <div>filter shown with <input value={kw} onChange={handleKwChange} /></div>

      <Country countries={countries}></Country>

    </div >
  )
}

export default Countries
