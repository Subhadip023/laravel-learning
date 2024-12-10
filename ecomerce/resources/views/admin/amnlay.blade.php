<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/productImageUploader.js', 'resources/js/adminLayout.js'])

</head>

<body class=" flex min-h-screen">

    <aside id="sideBar" class="  w-[15%] h-screen bg-blue-900  text-white flex flex-col  justify-between duration-500">

        <div class="flex justify-center bg-gray-200 rounded-md hover:bg-gray-300 m-2 h-[5%]">
            <a href="/admin"
                class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <img class="h-10 hover:scale-95 duration-300" src="{{ asset('images/logo.png') }}"
                    alt="Ecommerce logo" />
                <span class="ml-3 text-xl">Ecommerce</span>
            </a>
        </div>

        <div class="h-[85%]   overflow-y-auto  py-5   px-0 scroll-bar pt-5 ">
            <nav class="md:ml-auto md:mr-auto">


                <ul>
                    <li>
                        <a href="/admin">
                            <p class="text-center hover:text-gray-800 hover:bg-gray-300 p-2 text-xl mb-5 ">Dashbord</p>
                        </a>
                    </li>


                    <li><a href="/admin/users">
                            <p class="pl-5 hover:text-gray-800 hover:bg-gray-300 p-2 text-xl mb-2">

                                Users</p>
                        </a>
                    </li>
                    <li><a href="/admin/produts">
                            <p class="pl-5 hover:text-gray-800 hover:bg-gray-300 p-2 text-xl mb-2">Products</p>
                        </a></li>
                    <li><a href="/admin/orders">
                            <p class="pl-5 hover:text-gray-800 hover:bg-gray-300 p-2 text-xl mb-2">Orders</p>
                        </a></li>


                </ul>
            </nav>

        </div>
        <div class="h-[6%] flex items-center justify-evenly border-t border-gray-500">
            <img class="w-10 h-10 rounded-full" src="{{ Storage::url(auth()->user()->profile->path) }}" alt="">

            <p>{{ auth()->user()->name }}</p>
        </div>

    </aside>
    <section class="w-[85%]"  id="mainManu">

        <div class="bg-gray-200 shadow-lg border-b-2 shadow-gray-500 p-3 flex items-center h-[7%] justify-between duration-300">

            <button id="sideBarController" class="scale-150 border hover:border-gray-500 duration-300 border-black rounded-full p-1 font-bold">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                  </svg>
            
            </button>
            <p class="text-xl ml-10 font-mono">
                {{ auth()->user()->name }} ({{ auth()->user()->role->name }})

            </p>


        </div>
        <section class="h-[93%]  ">
            @if (session('success'))
            <div id="successMsg" class="bg-green-400 text-gray-700 w-[95%] p-2 px-5 rounded-md font-serif text-2xl mx-auto mt-1">
                {{ session('success') }}
          
            </div>
            @endif
            
            @if (session('error'))
            <div id="successMsg" class="bg-red-400 text-gray-700 w-[95%] p-2 px-5 rounded-md font-serif text-2xl mx-auto mt-1">
                {{ session('error') }}
          
            </div>
            @endif
           <section class="w-[95%]  min-h-[98%] m-auto my-auto flex flex-wrap items-center justify-center">
            {{-- {{$slot}} --}}


           </section>

    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
