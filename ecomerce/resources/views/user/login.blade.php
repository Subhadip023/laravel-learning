<x-layout title="Login">
    <div class="flex min-h-full flex-col justify-center w-2/3  px-6 py-12 lg:px-3 bg-slate-400/20 shadow-lg rounded-e-lg " >
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
        </div>
      
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action='{{route("user.loginpost")}}' method="POST">
            @csrf
            @method('POST')
            <x-input name="email" id="email" label="Email address" type='email'/>
            <x-input name="password" id="password" label="Password " type='password'/>

            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
          </form>
      
          <p class="mt-10 text-center text-sm/6 text-gray-500">
            Don't have an Account?
            <a href="/register" class="font-semibold text-indigo-600 hover:text-indigo-500">Register</a>
          </p>
        </div>
      </div>
</x-layout>