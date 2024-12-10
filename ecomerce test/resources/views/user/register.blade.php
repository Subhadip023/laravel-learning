<x-layout title="Register">
    

    <div class="flex min-h-full flex-col justify-center w-2/3  px-6 py-12 lg:px-3 bg-slate-400/20 shadow-lg rounded-e-lg " >
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create an account</h2>
        </div>
      
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action={{route('user.store')}} method="POST">
            @csrf

            <x-input name="name" id="name" label="Username" type='text'/>
            <x-input name="Email" id="email" label="Email address" type='email'/>
            <x-input name="phone" id="phone" label="Phone number" type='number'/>
            <x-input name="password" id="password" label="Password " type='password'/>
            <x-input name="confirm password" id="confirm-password" label="confirm Password " type='password'/>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
              </div>
          </form>
      
          <p class="mt-10 text-center text-sm/6 text-gray-500">
            Already have an Account ?
            <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Login</a>
          </p>
        </div>
      </div>


</x-layout>