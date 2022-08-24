@section('title', 'Create Property')

@php

$status = Session::get('status');

@endphp

@extends('layout.master')


@section('content')

    <div class="px-10 bg-white w-full">
        <h1 class="text-2xl my-4 text-gray-500">Create Property</h1>
        @if ($status)
            <div class="px-4 py-2 bg-green-300 text-green-700 my-4">
                {{ $status }}
            </div>
        @endif
        <form class="w-1/2" action="{{ route('property.store') }}" method="POST">
            @csrf
            <div class="form-group mb-6">
                <input type="text"
                    class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white
          border border-solid border-gray-300
          rounded
          m-0 @error('name') border-red-400 @enderror"
                    id="name" name="name" value="{{ old('name') }}" placeholder="Name">
                @error('name')
                    <p class="text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-6">
                <input type="text"
                    class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white
          border border-solid border-gray-300
          rounded
          m-0 @error('address') border-red-400 @enderror"
                    id="address" value="{{ old('address') }}" name="address" placeholder="Address">
                @error('address')
                    <p class="text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div class="form-group mb-6">
                    <input type="text"
                        class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white
          border border-solid border-gray-300
          rounded
          m-0 @error('price') border-red-400 @enderror"
                        id="price" value="{{ old('price') }}" name="price" placeholder="price">
                    @error('price')
                        <p class="text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-6">
                    <input type="text"
                        class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white
          border border-solid border-gray-300
          rounded
          m-0 @error('status') border-red-400 @enderror"
                        id="status" value="{{ old('status') }}" name="status" placeholder="status">
                    @error('status')
                        <p class="text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-6">
                    <input type="number"
                        class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white
          border border-solid border-gray-300
          rounded
          m-0 @error('rooms') border-red-400 @enderror"
                        id="rooms" value="{{ old('rooms') }}" name="rooms" placeholder="rooms">
                    @error('rooms')
                        <p class="text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-6">
                <textarea cols='4' rows="6"
                    class="form-control block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white
      border border-solid border-gray-300
      rounded
      m-0 @error('description') border-red-400 @enderror"
                    id="description" name="description" placeholder="description">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <select type="text"
                        class="form-control block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white
            border border-solid border-gray-300
            rounded
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('property_type_id') border-red-400 @enderror"
                        id="property_type_id" name="property_type_id">
                        <option class="text-gray-700" disabled selected>Select Property Type</option>
                        @foreach ($propertyTypes as $propertyType)
                            <option value={{ $propertyType->id }}>{{ $propertyType->name }}</option>
                        @endforeach
                    </select>
                    @error('property_type_id')
                        <p class="text-xs text-red-400">you must select a property type</p>
                    @enderror
                </div>
                <div class="form-group mb-6">
                    <select type="text"
                        class="form-control block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white
                border border-solid border-gray-300
                rounded
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('city_id') border-red-400 @enderror"
                        id="city_id" name="city_id">
                        <option class="text-gray-700" disabled selected>Select City</option>
                        @foreach ($cities as $city)
                            <option value={{ $city->id }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                        <p class="text-xs text-red-400">you must select a City</p>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-6">
                <select type="text"
                    class="form-control block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white
        border border-solid border-gray-300
        rounded
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('agent_id') border-red-400 @enderror"
                    id="agent_id" name="agent_id">
                    <option class="text-gray-700" disabled selected>Select Agent</option>
                    @foreach ($agents as $agent)
                        <option value={{ $agent->id }}>{{ $agent->name }}</option>
                    @endforeach
                </select>
                @error('agent_id')
                    <p class="text-xs text-red-400">you must select a agent</p>
                @enderror
            </div>
            <button type="submit"
                class="
        w-full
        px-6
        py-2.5
        bg-blue-600
        text-white
        font-medium
        text-xs
        leading-tight
        uppercase
        rounded
        shadow-md
        hover:bg-blue-700 hover:shadow-lg
        focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
        active:bg-blue-800 active:shadow-lg
        transition
        duration-150
        ease-in-out">Create</button>
        </form>
    </div>

@endsection
