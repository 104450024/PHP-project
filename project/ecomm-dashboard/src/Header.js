import { Navbar, Nav, NavDropdown } from 'react-bootstrap'
import { Link, useHistory } from 'react-router-dom'
import './bootstrap.css'

function Header() {
  let user = JSON.parse(localStorage.getItem('user-info')) //使用 JSON.parse() 方法處理以上數據，將其轉換為 JavaScript 對象
  const history = useHistory() //history 做頁面跳轉用的
  function logout() {
    localStorage.clear()
    history.push('/login')
  }
  return (
    <div>
      <Navbar bg="light" variant="light">
        <Navbar.Brand href="#home">E-Comm</Navbar.Brand>
        <Nav className="me-auto navbar_warapper">
          {localStorage.getItem('user-info') ? (
            <>
              <Link to="/p">Product List</Link>
              <Link to="/add">Add Product</Link>
              <Link to="/update">Update Product</Link>
              <Link to="/search">Search Product</Link>
            </>
          ) : (
            <>
              <Link to="/login">Login</Link>
              <Link to="/register">Register Product</Link>
            </>
          )}
        </Nav>
        {localStorage.getItem('user-info') ? (
          <Nav>
            <NavDropdown title={user && user.name} onClick={logout}>
              <NavDropdown.Item>logout</NavDropdown.Item>
            </NavDropdown>
          </Nav>
        ) : null}
      </Navbar>
    </div>
  )
}

export default Header
