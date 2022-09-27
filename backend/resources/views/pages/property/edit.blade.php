@section('title', 'Update Property')

@php

$status = Session::get('status');

@endphp

@extends('layout.master')


@section('content')
    <div class="px-10 bg-white w-full">
        <h1 class="text-2xl my-4 text-gray-500">Update Property</h1>
        @if ($status)
            <div class="px-4 py-2 bg-green-300 text-green-700 my-4">
                {{ $status }}
            </div>
        @endif
        <form class="flex justify-between" action="{{ route('property.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mr-2">
                <input hidden value="{{ $property->id }}" name="id" id="id" />
                <div class="form-group mb-6">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0 @error('name') border-red-400 @enderror"
                        id="name" name="name" value="{{ $property->name }}" placeholder="Name">

                    @error('name')
                        <p class="text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-6">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0 @error('address') border-red-400 @enderror"
                        id="address" name="address" value="{{ $property->address }}" placeholder="Address">

                    @error('address')
                        <p class="text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid grid-cols-3 gap-4">

                    <div class="form-group mb-6">
                        <input type="text"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0 @error('price') border-red-400 @enderror"
                            id="price" name="price" value="{{ $property->price }}" placeholder="price">

                        @error('price')
                            <p class="text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-6">
                        <input type="text"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0 @error('status') border-red-400 @enderror"
                            id="status" name="status" value="{{ $property->status }}" placeholder="status">

                        @error('status')
                            <p class="text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-6">
                        <select
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0 @error('for') border-red-400 @enderror"
                            id="for" name="for">
                            <option value='renting' class="text-gray-700" {property.for=='renting' ? selected : '' }>Renting</option>
                            <option value='buying' class="text-gray-700" {property.for=='buying' ? selected : '' }>Buying</option>
                        </select>
                        @error('for')
                            <p class="text-xs text-red-400">you must select a property for</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="form-group mb-6">
                        <input type="number"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0 @error('beds') border-red-400 @enderror"
                            id="beds" name="beds" value="{{ $property->beds }}" placeholder="beds">

                        @error('beds')
                            <p class="text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-6">
                        <input type="number"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0 @error('baths') border-red-400 @enderror"
                            id="baths" name="baths" value="{{ $property->baths }}" placeholder="baths">

                        @error('baths')
                            <p class="text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-6">
                        <input type="number"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0 @error('rooms') border-red-400 @enderror"
                            id="rooms" name="rooms" value="{{ $property->rooms }}" placeholder="rooms">

                        @error('rooms')
                            <p class="text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-6">
                    <textarea type="number" cols='4' rows="6"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0 @error('description') border-red-400 @enderror"
                        id="description" name="description" placeholder="description">{{ $property->description }}
                </textarea>
                    @error('description')
                        <p class="text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group mb-6">
                        <select type="text"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0 @error('property_type_id') border-red-400 @enderror"
                            id="property_type_id" name="property_type_id">
                            <option class="text-gray-700" disabled selected>Select Property Type</option>
                            @foreach ($propertyTypes as $propertyType)
                                <option {{ $propertyType->id == $property->property_type_id ? 'selected' : '' }}
                                    value={{ $propertyType->id }}>{{ $propertyType->name }}</option>
                            @endforeach
                        </select>

                        @error('property_type_id')
                            <p class="text-xs text-red-400">you must select property type</p>
                        @enderror
                    </div>
                    <div class="form-group mb-6">
                        <select type="text"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded m-0 @error('city_id') border-red-400 @enderror"
                            id="city_id" name="city_id">
                            <option class="text-gray-700" disabled selected>Select City</option>
                            @foreach ($cities as $city)
                                <option {{ $city->id == $property->city_id ? 'selected' : '' }} value={{ $city->id }}>
                                    {{ $city->name }}</option>
                            @endforeach
                        </select>

                        @error('city_id')
                            <p class="text-xs text-red-400">you must select city</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-6">
                    <select type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white  border border-solid border-gray-300 rounded m-0 @error('agent_id') border-red-400 @enderror"
                        id="agent_id" name="agent_id">
                        <option class="text-gray-700" disabled selected>Select Agent</option>
                        @foreach ($agents as $agent)
                            <option {{ $agent->id == $property->agent_id ? 'selected' : '' }} value={{ $agent->id }}>
                                {{ $agent->name }}</option>
                        @endforeach
                    </select>

                    @error('agent_id')
                        <p class="text-xs text-red-400">you must select agent</p>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md transition duration-150 ease-in-out">Update</button>
            </div>
            <div class="ml-2">
                <label>Choose Images</label>
                <input type="file" name="images[]" multiple>
            </div>
        </form>
    </div>

@endsection
