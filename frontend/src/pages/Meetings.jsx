import Navbar from '../components/Navbar';
import axios from 'axios';
import { useState, useEffect } from 'react'
import { useSelector } from 'react-redux';
import { baseUrl } from '../utils/fetchApi';
import { Navigate,useNavigate } from 'react-router-dom';
import { Table } from "flowbite-react";

function Meetings() {
    const user = useSelector((state) => state.auth.user);
    const isLoggedIn = useSelector((state) => state.auth.isLoggedIn);
    const [meetings, setMeetings] = useState(null);
    const navigate = useNavigate();


    useEffect(() => {
        const token = localStorage.getItem('token');

        if (isLoggedIn) {
            axios.get(baseUrl + 'my-meetings/' + user?.id, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': token
                }
            }).then(({ data }) => {
                setMeetings(data.meetings);
            }).catch(({response}) => {
                if (response.status == 401) {
                    localStorage.clear();
                    navigate('/login');
                }
            })
        }
    }, [])

    const handle_delete = (id) => {
        const token = localStorage.getItem('token');

        axios.delete(baseUrl + 'delete-meeting/' + id, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': token
            }
        }).then(({ data }) => {
            const index = meetings.findIndex((meeting) => meeting.id == id);
            meetings.splice(index, 1)
            setMeetings(meetings);
        });
    }

    // if (!isLoggedIn) {
    //     return <Navigate to='/' replace />
    // }

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
                        {meetings?.map((meeting,i) => {
                            return (<Table.Row key={i} className="bg-white dark:border-gray-700 dark:bg-gray-800">
                                <Table.Cell className="whitespace-nowrap font-medium text-gray-900 dark:text-white">
                                    {meeting.agent.name}
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
                                    <button onClick={() => handle_delete(meeting.id)}
                                        className="font-medium text-red-600 hover:underline dark:text-red-500 ml-2"
                                    >
                                        Delete
                                    </button>
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