<html lang="en">
<head>
    <link rel="icon" href="images/Customlogo.png" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend:{
                    colors: {
                        laravel: '#2d94ef',
                    },
                },
            },
        }
    </script>
    <title>Laravel App</title>
</head>
<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/"
         ><img class="w-24" src="{{asset('images/customlogobl.png')}}" alt="" class="logo"/>
        </a>
        <ul class="flex space-x-5 mr-8 text-lg">
            @auth
            <li class="font-bold">
                <span class="font-bold">
                    Welcome {{auth()->user()->name}}
                </span>
            </li>
            <li class="font-bold">
                <a href="/listings/manage" class="hover:text-laravel">
                <i class="fa-solid fa-gear" ></i> Manage
                </a>
            </li>
            <li class="font-bold">
                <form class="inline" method="POST" action="/logout">
                    @csrf
                <button type="submit" class="hover:text-laravel">
                    <i class="fa-solid fa-door-closed"></i> Logout
                </button>
                </form>
            </li>
            @else
            <li class="font-bold ">
                <a href="/register" class="hover:text-laravel">
                <i class="fa-solid fa-user-plus"></i> Register
                </a>
            </li>
            <li class="font-bold">
                <a href="/login" class="hover:text-laravel">
                <i class="fa-solid fa-arrow-right-to-bracket" ></i> Login
                </a>
            </li>
            @endauth
        </ul>
    </nav>
    <main>
        {{$slot}}
    </main>
    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start 
        font-bold bg-laravel text-black h-24 mt-24 opacity-90 md:justify-center"
    >
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        <a
            href="/listings/create"
            class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
        >Post Job</a
        >
    </footer>
    <x-flash_message />
</body>
</html>