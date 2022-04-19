import logo from './logo.svg'
import './App.css'
import { Button } from 'react-bootstrap'
import Header from './Header'
import { BrowserRouter, Route } from 'react-router-dom'
import { Switch } from 'react-router-dom'

import Login from './Login'
import Regist from './Regist'
import AddProduct from './AddProduct'
import UpdateProduct from './UpdateProduct'
import Protected from './Protected'
import ProductList from './ProductList'
import SearchProduct from './SearchProduct'
function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <switch>
          {/* <h1>E-Comm Project</h1> */}
          <h1>Ecomm Project</h1>
          <Route path="/login">
            <Login />
          </Route>
          <Route path="/register">
            <Regist />
          </Route>
          <Route path="/p">
            <Protected Cmp={ProductList} />
            {/* <AddProduct />*/}
          </Route>

          <Route path="/add">
            <Protected Cmp={AddProduct} />
            {/* <AddProduct />*/}
          </Route>
          <Route path="/update/:id">
            <Protected Cmp={UpdateProduct} />
            {/* <UpdateProduct />*/}
          </Route>

          <Route path="/search">
            <Protected Cmp={SearchProduct} />
            {/* <SearchProduct />*/}
          </Route>
        </switch>
      </BrowserRouter>
    </div>
  )
}

export default App
