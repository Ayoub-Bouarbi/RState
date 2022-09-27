import React from "react";
import axios from 'axios';
import { Link } from "react-router-dom";
import { useSelector, useDispatch } from 'react-redux'
import { useNavigate } from "react-router-dom";
import { setLogOut } from '../Reducers/AuthSlice';
import { baseUrl } from '../utils/fetchApi';
import { Dropdown } from 'flowbite-react';

const Navbar = () => {
    const user = useSelector((state) => state.auth.user);
    const isLoggedIn = useSelector((state) => state.auth.isLoggedIn);
    const dispatch = useDispatch();
    const navigate = useNavigate();

    const handle_logout = () => {
        const token = localStorage.getItem('token');
        axios.get(baseUrl + 'logout',{
            headers: {
                'Content-Type': 'application/json',
                'Authorization': token
            }
        }).then((res) => {
            console.log(token)
            dispatch(setLogOut()); 
            localStorage.clear();
            navigate('/');
        }).catch((err) => {
            console.warn(err.message);
        })
    }

    return (
        <header className="text-gray-600 body-font">
            <div className="container mx-auto flex flex-wrap justify-between p-5 flex-col md:flex-row items-center">
                <Link to={'/'} className="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        stroke="currentColor"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        className="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                        viewBox="0 0 24 24"
                    >
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span className="ml-3 text-xl">RealEstate</span>
                </Link>
                {!isLoggedIn ?
                    <div className="flex items-center">
                        <Link
                            to={"/login"}
                            className="hover:text-gray-900"
                        >
                            Login
                        </Link>
                        <span className="mx-1"> / </span>
                        <Link
                            to={"/register"}
                            className="hover:text-gray-900"
                        >
                            Register
                        </Link>
                    </div>
                    :
                    <div className="flex items-center">
                        <Dropdown
                            label={`Hi, ${user.name}`}
                            inline={true}
                        >
                            <Dropdown.Item onClick={() => handle_logout()}>
                                Sign out
                            </Dropdown.Item>
                        </Dropdown>
                    </div>}
            </div>
        </header>
    );
};

export default Navbar;
