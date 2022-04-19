import Header from './Header'
import { withRouter } from 'react-router-dom'
import { useState, useEffect } from 'react'
function UpdateProduct(props) {
  const [id, setId] = useState([])
  const [name, setName] = useState('')
  const [price, setPrice] = useState('')
  const [description, setDescription] = useState('')
  const [file, setFile] = useState('')
  const [data, setData] = useState([])
  console.warn('props', props.match.params.id)
  useEffect(async () => {
    let result = await fetch(
      'http://localhost:8000/api/product/' + props.match.params.id
    )

    result = await result.json()
    setData(result)
  }, [])

  async function updateProduct() {
    fetch('http://localhost:8000/api/updateProduct/' + this.data.id, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(this.state),
    }).then((result) => {
      result.json().then((resp) => {
        alert('the form has been update')
      })
    })
  }

  return (
    <div>
      <Header />
      <h1>Update Product</h1>
      <input type="text" defaultValue={data.name} />
      <br />
      <br />
      <input type="text" defaultValue={data.price} />
      <br />
      <br />
      <input type="text" defaultValue={data.description} />
      <br />
      <br />
      <input type="file" defaultValue={data.file_path} />
      <br />
      <br />
      <img
        style={{ width: 100 }}
        src={'http://localhost:8000/' + data.file_path}
      />
      <br />
      <br />
      <button onClick={updateProduct}>Update Product</button>
    </div>
  )
}

export default withRouter(UpdateProduct)
