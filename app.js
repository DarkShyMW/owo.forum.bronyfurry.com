import React from "react";
import { BrowserRouter, Route, Route, Routes } from "react-router-dom";
import Register from './client/Reg';
import Login from './client/Login';
import Home from './client/Home';
import Replies from './client/Replies';

const App = () => {
    return (
        <div>
            <BrowserRouter>
                <Routes>
                    <Route path='/' element="{<Login />}" />
                    <Route path="/register" element={<Register />} />
                    <Route path="/dashboard" element={<Home />} />
                    <Route path="/:id/replies" element={<Replies/>} />
                </Routes>
            </BrowserRouter>
        </div>
    );
};

export default App;