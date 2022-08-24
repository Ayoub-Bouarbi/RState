@section('title', 'Update City')

@php

$status = Session::get('status');

@endphp

@extends('layout.master')


@section('content')

    <div class="px-10 bg-white w-full">
        <h1 class="text-2xl my-4 text-gray-500">Edit City</h1>
        @if ($status)
            <div class="px-4 py-2 bg-green-300 text-green-700 my-4">
                {{ $status }}
            </div>
        @endif
        <form class="w-1/2" action="{{ route('city.update') }}" method="POST">
            @csrf
            <div class="form-group mb-6">
                <input hidden value="{{ $city->id }}" name="id" id="id" />
                <input type="text"
                    class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          border border-solid border-gray-300
          rounded
          m-0 @error('name') border-red-400 @enderror"
                    id="name" name="name" value="{{ $city->name }}" placeholder="Name">
                @error('name')
                    <p class="text-xs text-red-400">{{ $message }}</p>
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
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="country_id" name="country_id">
                    <option class="text-gray-700" disabled selected>Select Country Name</option>
                    @foreach ($countries as $country)
                        <option @if ($country->id == $city->country_id) selected @endif value={{ $country->id }}>
                            {{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country_id')
                    <p class="text-xs text-red-400"> {{ $message }} </p>
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
        ease-in-out">Update</button>
        </form>
    </div>

@endsection
