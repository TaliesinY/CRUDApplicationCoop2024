<h1>{{ $heading }}</h1>
@foreach ($products as $product)
    <h2><a href="\products\{{$product['id']}}">{{ $product['id'] }}</a></h2>
    <h2>{{ $product['name'] }}</h2>
@endforeach
