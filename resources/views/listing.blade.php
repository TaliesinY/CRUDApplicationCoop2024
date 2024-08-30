@extends('layout')

@section('content')


<div>
    <h1 style="font-size:3rem" >Search Results</h1>
</div>
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @unless(count($products) == 0)
        @foreach($products as $product)
        <div class="bg-gray-50 border border-gray-200 rounded p-6">
            <div class="flex">
                <img class="hidden w-48 mr-6 md:block" src="{{$product['url']}}" alt=""/>
                <div>
                    <h3 class="text-2xl"><a href="products/{{$product['id']}}">{{$product['name']}}</a></h3>
                    <div class="text-xl font-bold mb-4">${{$product['price']}}</div>
                    <ul class="flex">
                    </ul>
                    <div class="text-lg mt-4"><i class="fa-solid fa-location-dot"></i> {{$product['provider']}}</div>
                </div>
            </div>
        </div>
        @endforeach
    @else
    <p>No products Found</p>
    @endunless
</div>
@endsection
