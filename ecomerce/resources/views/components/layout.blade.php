<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/productImageUploader.js'])

    <title>{{ $title ?? 'Ecomerce' }}</title>
</head>

<body class="">
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <x-logo />

            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                @foreach ($categories as $cat)
                    <a href="/products/category/{{ $cat->name }}"
                        class="mr-5 hover:text-gray-900">{{ $cat->name }}</a>
                @endforeach
            </nav>



            @guest
                <a href="/login">
                    <button
                        class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Sing
                        In
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button></a>
            @endguest
            @auth

                <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                    data-dropdown-placement="left-start" class="w-10 h-10 rounded-full cursor-pointer"
                    src="{{ auth()->user() && auth()->user()->profile ? Storage::url(auth()->user()->profile->path) : Storage::url('avatars/dumy-user.png') }}"
                    alt="User dropdown">


                <div id="userDropdown" class="z-10 hidden bg-white divide-y  divide-gray-100 rounded-lg shadow w-44">
                    <div class="px-4 py-3 text-sm text-gray-900">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="font-medium truncate">{{ auth()->user()->email }}</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="avatarButton">
                        <li>
                            <a href="/user/{{ auth()->user()->id }}/edit" class="block px-4 py-2 hover:bg-gray-100">Edit
                                Profile</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a>
                        </li>
                        @if (auth()->user()->role->name == 'Admin')
                            <li>
                                <a href="/admin" class="block px-4 py-2 hover:bg-gray-100">Admin</a>
                            </li>
                        @endif

                    </ul>
                    <div class="py-1">
                        {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a> --}}

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('POST')
                            <button class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">logout
                                {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg> --}}
                            </button>
                        </form>
                    </div>
                </div>


            @endauth

        </div>

    </header>

    {{-- body of the page  --}}
    @if (session('success'))
        <div id="successMsg" class=" bg-green-400 text-gray-700 w-3/4 p-2 px-5 rounded-md font-serif text-2xl mx-auto">
            {{ session('success') }}

        </div>
    @endif

    @if (session('error'))
        <div id="successMsg" class="bg-red-400 text-gray-700 w-3/4 p-2 px-5 rounded-md font-serif text-2xl mx-auto">
            {{ session('error') }}

        </div>
    @endif
    <section class=" w-4/5 min-h-[80vh] mx-auto flex  items-center justify-center overflow-y-auto py-2">

        {{ $slot }}
    </section>

    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">

            <x-logo />

            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">©
                2024 Subhadip Chakraborty
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                        </path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none"
                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                        </path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </footer>

</body>
<script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

</html>
