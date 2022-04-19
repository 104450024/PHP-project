import React, { useState, useEffect } from 'react'
import { useHistory } from 'react-router-dom'
import Header from './Header'
function Regist() {
  useEffect(() => {
    if (localStorage.getItem('user-info')) {
      history.push('/add')
    }
  }, [])
  const [name, setName] = useState('')
  const [password, setPassword] = useState('')
  const [email, setEmail] = useState('')
  const history = useHistory()

  async function signup() {
    let item = { name, password, email }
    console.warn(item)
    let result = await fetch('http://localhost:8000/api/register', {
      method: 'POST',
      body: JSON.stringify(item),
      headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
      },
    })
    result = await result.json()

    localStorage.setItem('user-info', JSON.stringify(result))
    history.push('/add')
  }
  return (
    <>
      <Header />
      <div className="col-sm-15 offest-sm-3">
        <h1>Register Page</h1>
        <input
          type="text"
          value={name}
          onChange={(e) => setName(e.target.value)}
          className="form-controll"
          placeholder="name"
        />
        <br />
        <input
          type="password"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          className="form-controll"
          placeholder="password"
        />
        <br />
        <input
          type="text"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
          className="form-controll"
          placeholder="email"
        />
        <br />
        <button onClick={signup} type="button" className="btn btn-primary">
          Sign up
        </button>
      </div>
    </>
  )
}

export default Regist
