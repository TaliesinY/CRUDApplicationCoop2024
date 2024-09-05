<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#EF3B2D",
                    },
                },
            },
        };
    </script>
    <title>CRUD Application for Coop Term 2024-2025</title>
</head>
<body class="bg-gray-50 text-gray-600">
    <nav class="bg-gray-700 text-white p-6 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-3xl font-bold">ONLINE STORE</a>
            <form action="/products/listing" class="flex-grow mx-4">
                <div class="relative">
                    <input type="text" name="search" class="h-10 w-full pl-10 pr-24 rounded-lg border-0 focus:ring-2 focus:ring-laravel" placeholder="Search Online Products..."/>
                    <button type="submit" class="absolute top-0 right-0 h-full w-24 text-white bg-laravel rounded-r-lg hover:bg-red-600">Search</button>
                </div>
            </form>
            <ul class="flex space-x-6">
                @auth
                <li><span class="font-bold uppercase">Welcome {{auth()->user()->name}}</span></li>
                <li><a href="/admin" class="hover:underline">Manage Listings</a></li>
                <li>
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline">Logout</button>
                    </form>
                </li>
                @else
                <li><a href="/register" class="hover:underline">Register</a></li>
                <li><a href="/login" class="hover:underline">Login</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <main class="container mx-auto mt-8">
        @yield('content')
    </main>

    <footer class="sticky bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>
        <a href="/products/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5" >Post Product</a>
    </footer>
