<x-layout title="LogIn">

    <div>
        <h2 class="text-3xl text-green-400 my-4 text-center font-bold font-mono mb-7">LogIN User</h2>
    
    
        <form action="/login" method="POST" class="bg-gray-200 shadow-xl rounded-lg p-10 ">
    @method('post')
            @csrf
        <div class=" flex flex-col w-[500px] gap-2 mb-5">
            <label for="email">Email </label>
    <input type="text" name="email" id='name' class="w-full rounded-lg text-xl px-5 py-2 border-none" placeholder="Enter email "
    value={{old('email')}}
    >@error('email')
    <span class="error">{{ $message }}</span>
    
    @enderror 
        </div>
        <div class=" flex flex-col w-[500px] gap-2 mb-5">
            <label for="password">password </label>
    <input type="password" name="password" id='password' class="w-full rounded-lg text-xl px-5 py-2 "
    placeholder="Enter password "
    >
    @error('password')
    <span class="error">{{ $message }}</span>
    
    @enderror        </div>
        <button class="bg-green-500 p-2 px-5 rounded-xl hover:bg-green-300">submit</button>
    </form>
    </div>
    
    
    </x-layout>
    