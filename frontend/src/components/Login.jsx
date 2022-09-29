import React, { useEffect, useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import { baseUrl } from "../utils/fetchApi";
import { useDispatch, useSelector } from 'react-redux';
import { setLogIn } from "../Reducers/AuthSlice";
import axios from "axios";


const Login = () => {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const dispatch = useDispatch();
    const navigate = useNavigate();


    let isLoggedIn = useSelector((state) => state.auth.isLoggedIn);

    useEffect(() => {
        if (isLoggedIn)
            navigate('/');
    }, [isLoggedIn]);


    const handle_login = () => {
        let data = { email, password };
        axios.post(baseUrl + 'login', data)
            .then(({ data }) => {
                dispatch(setLogIn(data));

                localStorage.setItem('token', `${data.authorisation.type} ${data.authorisation.token}`);
                navigate('/');
            });
    }

    return (
        <>
            <div className="bg-gray-100">
                <div className="min-h-screen w-full p-6 flex justify-center items-center">
                    <div className="w-full max-w-sm">
                        <div className="bg-white border p-8 shadow rounded w-full mb-6">
                            <h1 className="mb-6 text-lg text-gray-900 font-thin">
                                Login to your account
                            </h1>
                            <fieldset className="mb-4">
                                <label className="block text-sm text-gray-900 mb-2">
                                    Email address
                                </label>
                                <input
                                    id="email"
                                    type="email"
                                    onChange={(e) => setEmail(e.target.value)}
                                    className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                                    placeholder="email"
                                />
                            </fieldset>
                            <fieldset className="mb-4">
                                <div className="w-full flex justify-between items-center">
                                    <label className="block text-sm text-gray-900 mb-2">
                                        Password
                                    </label>
                                    <a
                                        className="text-xs font-thin text-blue no-underline hover:underline"
                                        href="/"
                                    >
                                        Forgotten password?
                                    </a>
                                </div>
                                <input
                                    id="password"
                                    onChange={(e) => setPassword(e.target.value)}
                                    type="password"
                                    className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                                    placeholder="password"
                                />
                            </fieldset>
                            <div className="pt-1 pb-5 text-sm text-gray-darker font-thin">
                                <label>
                                    <input
                                        className="mr-1"
                                        type="checkbox"
                                        name="remember"
                                        id="remember"
                                    />
                                    Remember me
                                </label>
                            </div>
                            <button
                                type="submit"
                                onClick={() => handle_login()}
                                className="block w-full bg-indigo-500 text-white rounded-sm py-3 text-sm tracking-wide"
                            >
                                Sign in
                            </button>
                        </div>
                        <p className="text-center text-sm text-gray-600 font-thin">
                            Don't have an account yet?
                            <Link
                                to={"/register"}
                                className="text-indigo-500 no-underline hover:underline"
                            >
                                Sign up
                            </Link>
                        </p>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Login;
