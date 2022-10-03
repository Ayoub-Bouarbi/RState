import Navbar from '../components/Navbar';
import axios from 'axios';
import React, { useEffect, useState } from 'react'
import { GoStar, GoLocation } from 'react-icons/go';
import { useParams } from 'react-router-dom'
import { fetchApi, baseUrl } from '../utils/fetchApi';
import { Modal, Toast } from 'flowbite-react'
import { useSelector } from 'react-redux';
import { FaInfo } from 'react-icons/fa';

const PropertyDetails = () => {
    const [property, setProperty] = useState({});
    const [showModal, setShowModal] = useState(false);
    const [place, setPlace] = useState("");
    const [date, setDate] = useState(null);
    const [time, setTime] = useState(null);

    const { slug } = useParams();

    const isLoggedIn = useSelector((state) => state.auth.isLoggedIn);
    const user = useSelector((state) => state.auth.user);



    useEffect(() => {
        fetchApi(baseUrl + 'property/' + slug)
            .then(({ data }) => {
                setProperty(data);
            })

    }, [slug]);

    const setMeeting = () => {
        const token = localStorage.getItem('token');

        let data = { "property_id": property?.id, "agent_id": property?.agent?.id, "user_id": user?.id, date, time, place }

        axios.post(baseUrl + 'meeting', data, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': token
            }
        }).then((res) => {
            setShowModal(false);
        });
    }

    return (
        <>
            <Navbar />
            <section>
                <div className="max-w-screen-xl px-4 py-8 mx-auto">
                    <div className="grid items-start grid-cols-1 gap-8 md:grid-cols-2">
                        <div className="grid grid-cols-2 gap-4 md:grid-cols-1">
                            <div className="grid grid-cols-2 gap-4 lg:mt-4">
                                {property?.images?.map((image, i) => {
                                    return <div key={i} className="aspect-w-1 aspect-h-1">
                                        <img
                                            alt="Property"
                                            className="object-cover rounded-xl"
                                            src={'http://localhost:8000/public/image/' + image.fileName}
                                        />
                                    </div>
                                })}
                            </div>
                        </div>

                        <div className="sticky top-0">
                            <strong className="border border-blue-600 rounded-full tracking-wide px-3 font-medium py-0.5 text-xs bg-gray-100 text-blue-600 uppercase">{property.for}</strong>
                            <div className="flex justify-between mt-8">
                                <div className="max-w-[35ch]">
                                    <h1 className="text-2xl font-bold">
                                        {property.name} <strong className={"border rounded-full tracking-wide px-3 font-medium py-0.5 text-sm bg-gray-100 " + (property.status === 'Active' ? "border-blue-600 text-blue-600" : "border-red-600 text-red-600")}>{property.status}</strong>
                                    </h1>
                                    <div className="flex mt-2 -ml-0.5 items-center">
                                        {Array(5)
                                            .fill("")
                                            .map((_, i) => (
                                                <GoStar
                                                    key={i}
                                                    className={
                                                        i < 4
                                                            ? "text-teal-500"
                                                            : "text-gray-300"
                                                    }
                                                />
                                            ))}
                                        <span className="ml-2 text-gray-600 font-sm">
                                            35 reviews
                                        </span>
                                    </div>
                                </div>
                                <p className="text-lg font-bold">
                                    {property.price}DH / wk
                                </p>
                            </div>
                            <div className="mt-4">
                                <div className="pb-6 max-w-none">
                                    <p>
                                        {property.description}
                                    </p>
                                </div>
                            </div>
                            <div className="mt-2">
                                <div className="flex flex-column justify-between">
                                    <div>
                                        <div className="mt-2">
                                            <p className='mb-1 text-sm font-medium uppercase'>Property Type</p>
                                            <div className="mb-2">
                                                <p className="inline-block px-3 py-1 text-sm font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white">{property?.property_type?.name}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <p className="mb-2 text-sm font-medium uppercase">Property Specification</p>

                                            <div className="flow-root">
                                                <div className="flex flex-wrap -m-0.5">
                                                    <span className="inline-block px-3 py-1 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white">
                                                        {property.rooms} Rooms
                                                    </span>
                                                    <span className="inline-block px-3 py-1 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white">
                                                        {property.beds} Beds
                                                    </span>
                                                    <span className="inline-block px-3 py-1 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white">
                                                        {property.baths} Baths
                                                    </span>
                                                </div>
                                            </div>
                                            <div className="mt-2">
                                                <p className='mb-1 text-sm font-medium uppercase'>Property Location</p>
                                                <div className="flex items-center">
                                                    <GoLocation className="mr-1" />
                                                    <span>{property.address}</span>  &#44; <span>{property?.city?.name}</span>&#44; <span>{property?.city?.country?.name}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button onClick={() => setShowModal(true)} className="block mt-8 px-5 py-3 text-xs font-medium text-white bg-green-600 rounded hover:bg-green-500">
                                            Set a Meeting
                                        </button>
                                        <Modal
                                            show={showModal}
                                            size="lg"
                                            popup={true}
                                            onClose={() => setShowModal(false)}
                                        >
                                            <Modal.Header />
                                            <Modal.Body>
                                                {isLoggedIn ?
                                                    <div className="p-6">
                                                        <div className="grid grid-cols-2 gap-4">
                                                            <div className="form-group mb-6">
                                                                <label className="form-label text-sm inline-block mb-2 text-gray-700">Agent Name</label>
                                                                <input type="text" disabled defaultValue={property?.agent?.name} className="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0"
                                                                    placeholder="Agent Name" />
                                                            </div>

                                                            <div className="form-group mb-6">
                                                                <label className="form-label text-sm inline-block mb-2 text-gray-700">Client Name</label>
                                                                <input type="text" disabled defaultValue={user?.first_name + ' ' + user?.last_name} className="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0"
                                                                    placeholder="Client Name" />
                                                            </div>
                                                        </div>
                                                        <div className="form-group mb-6">
                                                            <label className="form-label text-sm inline-block mb-2 text-gray-700">Places</label>
                                                            <select onChange={(e) => setPlace(e.target.value)} id="place" className="form-select block w-full px-3 py-1.5 text-base font-normal text-gray-700 border border-solid border-gray-300 rounded m-0" aria-label="Default select example">
                                                                <option disabled>Select The Meeting place</option>
                                                                <option>Place One</option>
                                                                <option>Place Two</option>
                                                                <option>Place Three</option>
                                                                <option>Place Fourth</option>
                                                                <option>Place Fifth</option>
                                                            </select>
                                                        </div>
                                                        <div className="grid grid-cols-2 gap-4">
                                                            <div className="form-group mb-6">
                                                                <label className="form-label text-sm inline-block mb-2 text-gray-700">Meeting Date</label>
                                                                <input onChange={(e) => setDate(e.target.value)} type="date" id='date' className="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0" />
                                                            </div>

                                                            <div className="form-group mb-6">
                                                                <label className="form-label text-sm inline-block mb-2 text-gray-700">Meeting Time</label>
                                                                <input onChange={(e) => setTime(e.target.value)} type="time" id='time' className="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0" />
                                                            </div>
                                                        </div>

                                                        <button onClick={() => setMeeting()} className="block mt-8 px-5 py-3 text-xs font-medium w-full text-white bg-green-600 rounded hover:bg-green-500">
                                                            Set a Meeting
                                                        </button>
                                                    </div>
                                                    :
                                                    <div className="space-x-4 divide-x divide-gray-200 dark:divide-gray-700">
                                                        <Toast>
                                                            <FaInfo className="h-5 w-5 text-blue-600 dark:text-blue-500" />
                                                            <div className="pl-4 text-sm font-normal">
                                                                You must Sign In, to Setup a meeting.
                                                            </div>
                                                        </Toast>
                                                    </div>}
                                            </Modal.Body>
                                        </Modal>
                                    </div>
                                    <div>
                                        <p className='mb-1 text-sm font-medium uppercase'>Property Agent</p>
                                        <div>
                                            <img src="https://billiardport.com/assets/pages/media/profile/profile_user.jpg" alt="Agent Profile" className="w-[200px] h-[200px] rounded-lg" />
                                            <h1 className="mt-1 text-sm font-medium uppercase">{property?.agent?.name}</h1>
                                            <p className="mt-1 text-xs">{property?.agent?.email}</p>
                                            <p className="mt-1 text-xs">{property?.agent?.phoneNumber}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </>
    )
}

export default PropertyDetails