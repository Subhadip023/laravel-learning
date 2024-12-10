import React from 'react';
import ReactDOM from 'react-dom/client';

function App() {
    return <h1>Hello, React with Vite in Laravel!</h1>;
}

const root = document.getElementById('react-root');
if (root) {
    const app = ReactDOM.createRoot(root);
    app.render(<App />);
}
