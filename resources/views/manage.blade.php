@extends('layout')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Manage Products</h1>

    <a href="/products/create" class="bg-black text-white py-2 px-4 rounded mb-4 inline-block">Add New Product</a>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Price</th>
                <th class="border border-gray-300 px-4 py-2">Provider</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $product->price }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $product->provider }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="/products/{{ $product->id }}/edit" class="text-blue-500 hover:underline">Edit</a>
                    <form action="/products/{{ $product->id }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
