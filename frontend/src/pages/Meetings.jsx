import Navbar from '../components/Navbar';
import axios from 'axios';
import { useState, useEffect } from 'react'
import { useSelector } from 'react-redux';
import { baseUrl } from '../utils/fetchApi';
import { Navigate } from 'react-router-dom';
import { Table } from "flowbite-react";

function Meetings() {
    const user = useSelector((state) => state.auth.user);
    const isLoggedIn = useSelector((state) => state.auth.isLoggedIn);
    const [meetings, setMeetings] = useState(null);


    useEffect(() => {
        if (isLoggedIn) {
            const token = localStorage.getItem('token');

            axios.get(baseUrl + 'my-meetings/' + user?.id, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': token
                }
            }).then(({ data }) => {
                setMeetings(data.meetings);
            });
        }
    }, [])


    if (!isLoggedIn) {
        return <Navigate to='/' replace />
    }

    return (
        <>
            <Navbar />
            <div>
                <Table hoverable={true} className="w-2/3 mx-auto my-10">
                    <Table.Head>
                        <Table.HeadCell>
                            Agent Name
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Place
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Date
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Time
                        </Table.HeadCell>
                        {/* <Table.HeadCell>
                            Property
                        </Table.HeadCell> */}
                        <Table.HeadCell>
                            <span className="sr-only">
                                Edit
                            </span>
                        </Table.HeadCell>
                    </Table.Head>
                    <Table.Body className="divide-y">
                        {meetings?.map((meeting) => {
                            return (<Table.Row className="bg-white dark:border-gray-700 dark:bg-gray-800">
                                <Table.Cell className="whitespace-nowrap font-medium text-gray-900 dark:text-white">
                                    { meeting.agent.name }
                                </Table.Cell>
                                <Table.Cell>
                                    {meeting.place}
                                </Table.Cell>
                                <Table.Cell>
                                    {meeting.date}
                                </Table.Cell>
                                <Table.Cell>
                                    {meeting.time}
                                </Table.Cell>
                                {/* <Table.Cell>
                                    <Link to={'/property/' + {meeting.property.slug}}>{meeting.property.name}</Link>
                                </Table.Cell> */}
                                <Table.Cell>
                                    <a
                                        href="/tables"
                                        className="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                    >
                                        Edit
                                    </a>
                                </Table.Cell>
                            </Table.Row>)
                        })}

                    </Table.Body>
                </Table>
            </div>
        </>
    )
}

export default Meetings