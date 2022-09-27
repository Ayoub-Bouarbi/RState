import Navbar from "../components/Navbar";
import { useEffect,useState } from 'react';
import { baseUrl, fetchApi } from "../utils/fetchApi";
import PropertyCard from "../components/PropertyCard";
import heroImg from '../assets/hp-hero-desktop-xl.jpg';

const Home = () => {
    const [properties, setProperties] = useState([]);

    useEffect(() => {
        fetchApi(baseUrl + "properties").then(({ data }) => {
            setProperties(data);
        });

    }, []);

    return (
        <>
            <Navbar />
            <div style={{ backgroundImage: `url(${heroImg})` }}
                className={"w-full h-96 bg-cover bg-center flex justify-center items-center"}>
                <div className="flex flex-col justify-center items-center">
                    <h1 className=" text-center text-5xl text-white font-bold drop-shadow-lg uppercase">To each their
                        <span className="text-amber-500"> home.℠</span>
                    </h1>
                    <p className="mt-5 text-center text-lg text-white opacity-70">Let’s find a home that’s perfect for you</p>
                    <div className="flex items-center my-4">
                        <input className="p-2 h-[50px] w-[600px]" placeholder="address,street, city, zipcode" type="text" />
                        <button className="h-[50px] bg-teal-500 px-6 text-white">Search</button>
                    </div>
                </div>
            </div>
            <section className="text-gray-600 body-font">
                <div className="container px-5 py-24 mx-auto">
                    <div className="flex flex-wrap -m-4">
                        {properties.map((property, i) => {
                            return <PropertyCard
                                key={i}
                                imageUrl="https://bit.ly/2Z4KKcF"
                                imageAlt="Rear view of modern home with pool"
                                slug={property.slug}
                                beds={property.beds}
                                baths={property.baths}
                                rooms={property.rooms}
                                title={property.name}
                                formattedPrice={property.price}
                                rating='4'
                                reviewCount="35"
                            />
                        })
                        }
                    </div>
                </div>
            </section>
        </>
    );
};

export default Home;
