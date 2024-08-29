@extends('layout')
@section('content')

<div class="mx-4 max-w-7xl">
    <div class="flex">
        <div class="w-1/2 mr-6">
            <img class="w-full mb-4" src="{{$product['url']}}" alt="Product Image"/>
        </div>

        <div class="w-1/2">
            <h3 class="text-3xl font-bold mb-2">{{$product['name']}}</h3>
            <div class="text-2xl font-bold mb-4">${{$product['price']}}</div>
            <div class="text-lg mt-4"><i class="fa-solid fa-location-dot"></i> {{$product['provider']}}</div>
            <h3 class="text-2xl font-bold mb-4">Product Description</h3>
            <div class="text-lg space-y-6">
                <p>{{$product['description']}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
