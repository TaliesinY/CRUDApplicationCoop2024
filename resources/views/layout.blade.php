<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#363636",
                        },
                    },
                },
            };
        </script>
        <title>CRUD Application for Coop Term 2024-2025</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4" style="background-color:rgba(36, 36, 36) opacity-90">
            <a href="/"><h1 style="font-size:3rem"><b>ONLINE STORE</b></h1></a>
            <form action="/" class="flex-grow mx-4">
                <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                    <div class="absolute top-4 left-3">
                        <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                    </div>
                    <input type="text" name="search" class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search Online Products..."/>
                    <div class="absolute top-2 right-2">
                        <button type="submit" class="h-10 w-20 text-white rounded-lg bg-black hover:bg-black">Search</button>
                    </div>
                </div>
            </form>

            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font-bold uppercase">Welcome {{auth()->user()->name}}</span>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>Manage Listings</a>
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>

                @else
                <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a></li>
                <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
                </li>
                @endauth
            </ul>
        </nav>

        <main>
            @yield('content')
        </main>
        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>
        <a href="/products/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5" >Post Product</a>
    </footer>
</body>
</html>
