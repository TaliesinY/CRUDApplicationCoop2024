@extends('layout')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Edit Product</h1>

    <form action="/products/{{ $product->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" class="border rounded w-full py-2 px-3">
        </div>
        <div class="mb-4">
            <label for="price" class="block text-sm font-bold mb-2">Price</label>
            <input type="text" name="price" id="price" value="{{ $product->price }}" class="border rounded w-full py-2 px-3">
        </div>
        <div class="mb-4">
            <label for="provider" class="block text-sm font-bold mb-2">Provider</label>
            <input type="text" name="provider" id="provider" value="{{ $product->provider }}" class="border rounded w-full py-2 px-3">
        </div>
        <div class="mb-4">
            <label for="url" class="block text-sm font-bold mb-2">URL</label>
            <input type="text" name="url" id="url" value="{{ $product->url }}" class="border rounded w-full py-2 px-3">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-bold mb-2">Description</label>
            <textarea name="description" id="description" class="border rounded w-full py-2 px-3">{{ $product->description }}</textarea>
        </div>
        <button type="submit" class="bg-black text-white py-2 px-4 rounded">Update Product</button>
    </form>
</div>
@endsection
