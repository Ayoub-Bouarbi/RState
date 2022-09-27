import React from "react";
import { FaStar } from 'react-icons/fa';
import { Link } from "react-router-dom";

const PropertyCard = ({
    imageUrl,
    imageAlt,
    beds,
    baths,
    title,
    formattedPrice,
    rooms,
    rating,
    reviewCount,
    slug
}) => {
    return (
        <>
            <div className="max-w-sm m-4 border-1 rounded-lg overflow-hidden">
                <img src={imageUrl} alt={imageAlt} />
                <div className="py-6">
                    <div className="flex items-baseline">
                        <span className="rounded-full px-2 text-teal-800 bg-teal-300">New</span>
                        <div className="text-gray-500 font-semibold text-xs uppercase ml-2">
                        {rooms} rooms &bull; {beds} beds &bull; {baths} baths
                        </div>
                    </div>

                    <div className="mt-1 font-semibold line-tight">
                        <Link to={'/property/' + slug} >{title}</Link>
                    </div>
                    <div>
                        {formattedPrice}
                        <span className="text-gray-600 text-sm"> DH / wk</span>
                    </div>
                    <div className="flex mt-2 items-center">
                        {Array(5)
                            .fill("")
                            .map((_, i) => (
                                <FaStar
                                    key={i}
                                    className={
                                        i < rating
                                            ? "text-teal-500"
                                            : "text-gray-300"
                                    }
                                />
                            ))}
                        <span className="ml-2 text-gray-600 font-sm">
                            {reviewCount} reviews
                        </span>
                    </div>
                </div>
            </div>
        </>
    );
};

export default PropertyCard;
