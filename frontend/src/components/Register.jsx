import React, { useEffect, useState } from "react";
import axios from "axios";
import { Link, useNavigate } from "react-router-dom";
import { baseUrl } from '../utils/fetchApi';
import { useDispatch, useSelector } from "react-redux";
import { setLogIn } from "../Reducers/AuthSlice";


const Register = () => {
    const [firstName, setFirstName] = useState("");
    const [lastName, setLastName] = useState("");
    const [userName, setUsername] = useState("");
    const [phoneNumber, setPhoneNumber] = useState("");
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [rePassword, setRePassword] = useState("");
    const dispatch = useDispatch();
    const navigate = useNavigate();

    let isLoggedIn = useSelector((state) => state.auth.isLoggedIn);

    useEffect(() => {
        if (isLoggedIn)
            navigate('/');
    }, [isLoggedIn]);


    const handle_register = () => {
        const data = { 'first_name': firstName, 'last_name': lastName, 'phone_number': phoneNumber, 'username': userName, email, password, 'password_confirmation': rePassword }
        axios.post(baseUrl + 'register', data)
            .then(({ data }) => {
                dispatch(setLogIn(data));
                navigate('/');
            });
    }


    return (
        <div className="bg-gray-100">
            <div className="min-h-screen w-full p-6 flex justify-center items-center">
                <div className="w-full max-w-md">
                    <div className="bg-white border p-8 shadow rounded w-full mb-6">
                        <h1 className="mb-6 text-lg text-gray-900 font-thin">
                            Create an Account
                        </h1>
                        <div className="grid grid-cols-2 gap-4">
                            <fieldset className="mb-4">
                                <label className="block text-sm text-gray-900 mb-2">
                                    Name
                                </label>
                                <input
                                    placeholder="first name"
                                    onChange={(e) => setFirstName(e.target.value)}
                                    type="text"
                                    className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                                />
                            </fieldset>
                            <fieldset className="mb-4">
                                <label className="block text-sm text-gray-900 mb-2">
                                    Name
                                </label>
                                <input
                                    placeholder="last name"
                                    onChange={(e) => setLastName(e.target.value)}
                                    type="text"
                                    className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                                />
                            </fieldset>
                        </div>

                        <fieldset className="mb-4">
                            <label className="block text-sm text-gray-900 mb-2">
                                Username
                            </label>
                            <input
                                placeholder="username"
                                onChange={(e) => setUsername(e.target.value)}
                                type="text"
                                className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                            />
                        </fieldset>
                        <fieldset className="mb-4">
                            <label className="block text-sm text-gray-900 mb-2">
                                Phone Number
                            </label>
                            <input
                                placeholder="phone number"
                                onChange={(e) => setPhoneNumber(e.target.value)}
                                type="text"
                                className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                            />
                        </fieldset>
                        <fieldset className="mb-4">
                            <label className="block text-sm text-gray-900 mb-2">
                                E-mail
                            </label>
                            <input
                                placeholder="email"
                                onChange={(e) => setEmail(e.target.value)}
                                type="email"
                                className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                            />
                        </fieldset>
                        <div className="grid grid-cols-2 gap-4">
                        <fieldset className="mb-4">
                            <label className="block text-sm text-gray-900 mb-2">
                                Password
                            </label>
                            <input
                                placeholder="password"
                                onChange={(e) => setPassword(e.target.value)}
                                type="password"
                                className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                            />
                        </fieldset>
                        <fieldset className="mb-4">
                            <label className="block text-sm text-gray-900 mb-2">
                                Confirm Password
                            </label>
                            <input
                                placeholder="password confirmation"
                                onChange={(e) => setRePassword(e.target.value)}
                                type="password"
                                className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                            />
                        </fieldset>
                        </div>
                        <div className="pt-1 pb-5 text-sm text-gray-darker font-thin">
                            <label>
                                <input
                                    className="mr-1"
                                    type="checkbox"
                                    name="agree"
                                    id="agree"
                                />
                                Agree Terms & Conditions
                            </label>
                        </div>
                        <button
                            type="submit"
                            onClick={handle_register}
                            className="block w-full bg-indigo-500 text-white rounded-sm py-3 text-sm tracking-wide"
                        >
                            Sign up
                        </button>
                    </div>
                    <p className="text-center text-sm text-gray-600 font-thin">
                        Already have an account?
                        <Link
                            to={"/login"}
                            className="text-indigo-500 no-underline hover:underline"
                        >
                            Log in
                        </Link>
                    </p>
                </div>
            </div>
        </div>
    );
};

export default Register;
