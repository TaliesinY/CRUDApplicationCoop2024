@extends('layout')
@section('content')

<h1>{{$heading}}</h1>
@unless(count($products) == 0)
@foreach($products as $product)
    <h2><a href="/products/{{$product['id']}}">{{$product['name']}}</a></h2>
    <h2>{{$product['price']}}</h2>
@endforeach
@else
<p>No products Found</p>
@endunless

@endsection
