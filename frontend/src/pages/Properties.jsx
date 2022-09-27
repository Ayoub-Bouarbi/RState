import React, { useState, useEffect } from "react";
import Navbar from "../components/Navbar";
import PropertyCard from "../components/PropertyCard";
import { baseUrl, fetchApi } from "../utils/fetchApi";

const Properties = () => {
    const [properties, setProperties] = useState([]);
    useEffect(() => {
        fetchApi(baseUrl + "properties").then(({ data }) => {

            setProperties(data);
        });
    }, []);

    return (
        <>
            <Navbar />
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

export default Properties;
