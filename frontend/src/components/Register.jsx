import React from "react";
import { Link } from "react-router-dom";

const Register = () => {
    return (
        <div className="bg-gray-100">
            <div className="min-h-screen w-full p-6 flex justify-center items-center">
                <div className="w-full max-w-sm">
                    <div className="bg-white border p-8 shadow rounded w-full mb-6">
                        <h1 className="mb-6 text-lg text-gray-900 font-thin">
                            Create an Account
                        </h1>
                        <fieldset className="mb-4">
                            <label className="block text-sm text-gray-900 mb-2">
                                Name
                            </label>
                            <input
                                id="name"
                                type="text"
                                className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                                name="name"
                            />
                        </fieldset>
                        <fieldset className="mb-4">
                            <label className="block text-sm text-gray-900 mb-2">
                                E-mail
                            </label>
                            <input
                                id="email"
                                type="email"
                                className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                                name="email"
                            />
                        </fieldset>
                        <fieldset className="mb-4">
                            <label className="block text-sm text-gray-900 mb-2">
                                Password
                            </label>
                            <input
                                id="password"
                                type="password"
                                className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                                name="password"
                            />
                        </fieldset>
                        <fieldset className="mb-4">
                            <label className="block text-sm text-gray-900 mb-2">
                                Confirm Password
                            </label>
                            <input
                                id="password_confirmation"
                                type="password"
                                className="block w-full rounded-sm border bg-white py-2 px-3 text-sm"
                                name="password_confirmation"
                            />
                        </fieldset>
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
