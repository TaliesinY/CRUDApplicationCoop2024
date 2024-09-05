@extends('layout')
@section('content')
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Create a Listing</h2>
            <p class="mb-4">Post a Product</p>
        </header>

        <form method="POST" action="/products">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Product Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"/>

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2">Price</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price"/>

                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="provider" class="inline-block text-lg mb-2">Provider</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="provider"/>

                @error('provider')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="url" class="inline-block text-lg mb-2">Company Logo URL</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="url" rows="1"></textarea>
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Product Description</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"></textarea>
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Create Product</button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
@endsection
