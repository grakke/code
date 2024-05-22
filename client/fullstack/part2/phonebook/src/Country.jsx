import Weather from './Weather.jsx';

const Country = ({ countries }) => {

  console.log('len', countries.length, countries.length === 1)
  if (countries.length >= 10) {
    return <div>Too many matches, specify another filter</div>
  }

  if (countries.length === 1) {
    return (
      <div>
        <h1>{countries[0]['name']}</h1>
        Capital:{countries[0]['capital']}
        Population:{countries[0]['population']}
        <h2>languages</h2>
        <ul>
          {countries[0]['languages'].map((language, index) => <li key={index} >{language.name}</li>)}
        </ul>
        <div><img src={countries[0]['flag']} alt="" /></div>
        <Weather city={countries[0]['capital']}></Weather>
      </div>
    )
  }

  if (1 < countries.length < 10) {
    return (
      <ul>
        {countries.map((country, index) => <li key={index} >{country.name}</li>)}
      </ul>
    )
  }

}

export default Country
