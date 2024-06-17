import React from 'react';
import './app.css';
import ReactDOM from 'react-dom/client';
import ExampleComponent from './components/ExampleComponent';
import Menu from './components/Navbar/Menu'

const rootElement = document.getElementById('app');

if (rootElement) {
    const root = ReactDOM.createRoot(rootElement);
    root.render(<Menu />);
}
