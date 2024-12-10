<x-layout title="Dashbord">
    <div class="bg-gray-200 shadow-xl rounded-lg	 w-2/3 h-fit my-4 p-2 flex flex-col gap-2" >  
        <h1 class="text-2xl text-center">Welcome to the Dashboard!</h1>
        <div class="  h-fit my-4 p-2 flex items-center text-lg flex-col gap-2" >  
        
            {{$user->name}}
    
            <p></p>
            {{$user->email}}
            <a class="bg-green-500 hover:bg-green-700 p-2 min-w-fit w-fit text-white px-4 rounded-lg">Edit</a>
    
    
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 p-2 mt-10 min-w-fit rounded-lg hover:bg-red-700">Logout</button>
        </form>

    </div>
   
</x-layout>