@section('title', 'Update Property Type')

@php

$status = Session::get('status');

@endphp

@extends('layout.master')


@section('content')

    <div class="px-10 bg-white w-full">
        <h1 class="text-2xl my-4 text-gray-500">Edit Property Type</h1>
        @if ($status)
            <div class="px-4 py-2 bg-green-300 text-green-700 my-4">
                {{ $status }}
            </div>
        @endif
        <form class="w-1/2" action="{{ route('propertyType.update') }}" method="POST">
            @csrf
            <div class="form-group mb-6">
                <input hidden value="{{ $propertyType->id }}" name="id" id="id" />
                <input type="text"
                    class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          @error('name') border-red-400 @enderror"
                    id="name" name="name" value="{{ $propertyType->name }}" placeholder="Name">
                @error('name')
                    <p class="text-xs text-red-400">{{ $message }}</p>
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
