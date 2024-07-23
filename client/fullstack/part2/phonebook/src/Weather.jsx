import axios from 'axios';
import React, { useEffect, useState } from 'react';

const Weather = ({ city }) => {
  const [weather, setWeather] = useState({})

  useEffect(() => {
    const api_key = process.env.REACT_APP_API_KEY
    if (city) {
      console.log('effect')
      axios
        .get('https://api.weatherstack.com/current?access_key = ' + { api_key } + '&query=' + city)
        .then(response => {
          console.log('promise fulfilled')
          setWeather(response.data)
        })
      console.log('render', setWeather.length, 'countries')

    }
  }, [city])

  return (
    <div>
      <h2>Weather in {city}</h2>
      <div>temperature:{weather.current.tempeture}</div>
      <img src={weather.current.weather_icons} alt="" />
      <div>wind:{weather.current.wind_speed}</div>
    </div>
  )
}

export default Weather
