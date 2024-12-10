<x-layout title="Register">
    <div
        class="flex min-h-full flex-col justify-center w-2/3 px-6 py-12 lg:px-3 bg-slate-400/20 shadow-lg rounded-e-lg duration-500">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Create an account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <!-- Display Validation Errors -->
            {{-- @if ($errors->any())
              <div class="mb-4 text-red-600">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif --}}

            <form class="space-y-6" action="{{ route('user.store') }}" method="POST">
                @csrf
                <x-input name="name" id="name" label="Username" type="text" value="{{ old('name') }}" />
                <x-input name="email" id="email" label="Email address" type="email"
                    value="{{ old('email') }}" />
                <x-input name="phone" id="phone" label="Phone number" type="number"
                    value="{{ old('phone') }}" />
                <h3 class="block text-md font-medium text-gray-900"> Select Your Gender</h3>
                <div class="flex gap-1">

                    <input type="radio" id='male' name="Gender" value="Male" >
                    <label for="male">Male</label>
                    <input type="radio" id='female' name="Gender" value="Female">
                    <label for="female">Female</label>
                    <br>
                </div>
                
                <h3 class="block text-md font-medium text-gray-900"> Select Your Hobbies</h3>
                @php
    // Decode the stored hobbies from JSON for the current user
    $hobbies =  [];
@endphp

<div class="mt-4 flex flex-wrap gap-x-4">
    <label>
        <input type="checkbox" name="hobbies[]" value="Reading" class="mr-2"
            {{ in_array('Reading', old('hobbies', $hobbies)) ? 'checked' : '' }}> Reading
    </label>
    <br>
    <label>
        <input type="checkbox" name="hobbies[]" value="Traveling" class="mr-2"
            {{ in_array('Traveling', old('hobbies', $hobbies)) ? 'checked' : '' }}> Traveling
    </label>
    <br>
    <label>
        <input type="checkbox" name="hobbies[]" value="Coding" class="mr-2"
            {{ in_array('Coding', old('hobbies', $hobbies)) ? 'checked' : '' }}> Coding
    </label>
    <br>
    <label>
        <input type="checkbox" name="hobbies[]" value="Music" class="mr-2"
            {{ in_array('Music', old('hobbies', $hobbies)) ? 'checked' : '' }}> Music
    </label>
    <br>
    <label>
        <input type="checkbox" name="hobbies[]" value="Sports" class="mr-2"
            {{ in_array('Sports', old('hobbies', $hobbies)) ? 'checked' : '' }}> Sports
    </label>
</div>

                @error('hobbies')
                    <span class= "text-red-600 duration-200">{{ $message }}</span>
                @enderror


                <x-input name="password" id="password" label="Password" type="password" />
                <x-input name="password_confirmation" id="confirm-password" label="Confirm Password" type="password" />


                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        up</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Already have an Account?
                <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Login</a>
            </p>
        </div>
    </div>
</x-layout>
