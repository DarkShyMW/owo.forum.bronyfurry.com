import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";

const Login = () => {
    const [email, setEmail] = useState("");
    const [password, serPassword] = useState("");

    const handleSubmit = (e) => {
        e.preventDefault();
        console.log({ email, password });
        setEmail("");
        setPassword("");
    };
return (
    <main classname='login'>
        <h1 className='loginTitle'>Войти в свой аккаунт</h1>
        <form className="loginForm" onSubmit={handleSubmit}>
            <label htmlFor="email">Email</label>
            <input
                type='text'
                name='email'
                id='email'
                required
                value={email}
                onChange={(e) => setEmail(e.target.value)}
            />
            <label htmlFor='password'>Пароль</label>
            <input 
                type='password'
                name='password'
                id='password'
                required
                value={password}
                onChange={(e) => setPassword(e.target.value)}
            />
            <button className="loginBtn">Войти</button>
            <p>
                Нет аккаунта? Создайте! <Link to='/register'>Создать!</Link>
            </p>
        </form>
    </main>
);
};