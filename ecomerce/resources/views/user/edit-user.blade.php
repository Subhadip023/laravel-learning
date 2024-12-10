<x-layout>

    <div
        class="flex min-h-full  flex-col justify-center w-2/3 px-6 py-12 lg:px-3 bg-slate-300 shadow-lg rounded-lg duration-500">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Edit User</h2>
        </div>

        <div class="mt- sm:mx-auto sm:w-full sm:max-w-sm ">

            <div class="flex  items-center justify-between">
                @if ($user->profile)
                    <div class=" w-fit p-2  h-fit items-center  flex flex-col   gap-2">
                        <h2 class="text-xl font-serif font-bold">
                            User Profile
                        </h2>
                        <div>
                            <img class="w-20 h-20 rounded-full" src="{{ Storage::url($user->profile->path) }}">
                        </div>
                        <div class="flex  items-end gap-x-2  ">
                            <form action="{{ route('profile.edit', ['profile' => $user->profile->id]) }}" method="GET">
                                @csrf
                                @method('get')
                                <button class="bg-green-600 p-2 text-white rounded-lg " type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                    </svg>
                                </button>


                            </form>
                            <form action="{{ route('profile.destroy', ['profile' => $user->profile->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white p-2 rounded-lg"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                    </svg></button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="mt-5 px-auto flex flex-col items-center">
                        <p class="text-blue-600">You Don't have Profile Picture. </p>

                        <a href="/profile/create/{{ $user->id }}">

                            <button class= 'p-2 -px-5 rounded-lg flex items-center gap-2 bg-green-800 text-white'><svg
                                    class=" text-black" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                </svg>Add Profile Pic </button>

                        </a>
                    </div>
                @endif
                {{-- file upload for user  --}}


                <div class="flex gap-2 mt-1  w-fit flex-col items-center">
                    <h2 class="text-xl font-serif font-bold">
                        User file
                    </h2>
                    @if ($user->filepath)
                        @php
                            $fileUrl = Storage::url($user->filepath);
                        @endphp

                        <!-- Check if it's an image -->
                        @if (Str::startsWith(mime_content_type(public_path('storage/' . $user->filepath)), 'image'))
                            <img src="{{ $fileUrl }}" alt="User File" class="w-20 h-20 rounded border">
                        @elseif (Str::endsWith($user->filepath, ['.pdf']))
                            <!-- Embed a PDF -->
                            <iframe src="{{ $fileUrl }}" class="w-30" width="150" height="190"></iframe>
                        @else
                            <!-- Provide a Download Link for Other Files -->
                            <div class="flex flex-col gap-4 items-center">
                                <a href="{{ $fileUrl }}" class="text-blue-500 underline" download>
                                    <svg class="scale-150" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-arrow-down-square"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z" />
                                    </svg>
                                </a>
                                download file
                                {{-- {{$fileUrl}} --}}
                            </div>
                        @endif

                        <div class="flex  items-end gap-x-2  ">
                            <form action="{{ route('user.editfile', ['user' => $user->id]) }}" method="GET">
                                @csrf
                                @method('get')
                                <button class="bg-green-600 p-2 text-white rounded-lg " type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                    </svg>
                                </button>


                            </form>
                           
                            <form action="{{route('user.deletefile',['user' => $user->id])}}"  method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white p-2 rounded-lg"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                    </svg></button>
                            </form>
                        </div>
                    @else
                        <form class="flex items-end" action="{{ route('user.fileupload', ['user' => $user->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <x-input name='userfile' label='Upload file' type='file' id='userfile' />
                            <button class="bg-green-600 text-white p-1 mb-1 rounded-lg h-fit"
                                type="submit">Upload</button>

                        </form>
                    @endif
                </div>






            </div>
@if (! $user->address)

@if (!$user->role->name==='Admin')
<div class="  ">
    <a href="/address/create"
        class="flex mx-auto  text-green-700 items-center border-2 border-green-500 p-2 h-fit gap-1 w-fit my-2 rounded-lg hover:text-green-500">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
        </svg> Add address

    </a>
</div>
@endif




@endif

<div class="mt-2">
    @if ($user->address)
    <h2 class="font-bold text-xl">Your Address</h2>

    {{$user->address->street}}, {{$user->address->city}}, {{$user->address->state}}, Pin code: {{$user->address->postal_code}}, {{$user->address->country}}
   @if (auth()->user()->role->name=='Admin')
   <a href="/admin/{{$user->id}}/add-address"
    class="flex mx-auto  text-green-700 items-center border-2 border-green-500 p-2 h-fit gap-1 w-fit my-2 rounded-lg hover:text-green-500">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
      </svg> Edit address
    
    </a>
   @else
   <form action="{{route('address.create')}}" method="GET">
    @csrf
    <button class="flex mx-auto  text-green-700 items-center border-2 border-green-500 p-2 h-fit gap-1 w-fit my-2 rounded-lg hover:text-green-500">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
      </svg> Edit address
    </button>
    </form>
   @endif
   @else 

    
    @endif

</div>


            <form class="space-y-6" action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PATCH')

                @auth
                    @if (auth()->user()->role->name == 'Admin')
                        <div class=" flex gap-2 items-center">
                            <label for="role" class="font-bold">Select User Role</label><br>
                            <select name="role" class="p-2 text-md" id="role">
                                <option value="1"
                                    @if ($user->role->name === 'Admin') @selected(true) @endif>Admin</option>
                                <option value="2"
                                    @if ($user->role->name === 'Editor') @selected(true) @endif>Editor</option>
                                <option value="3"
                                    @if ($user->role->name === 'User') @selected(true) @endif>User</option>



                            </select>
                        </div>
                    @endif
                @endauth


                <x-input name="name" id="name" label="Username" type="text"
                    value="{{ $user->name }}" />
                <x-input name="email" id="email" label="Email address" type="email"
                    value="{{ $user->email }}" />

                <x-input name="phone" id="phone" label="Phone number" type="text"
                    value="{{ $user->phone }}" />
                <h3 class="block text-md font-medium text-gray-900"> Select Your Gender</h3>
                <div class="flex gap-1">

                    <input type="radio" id='male' name="Gender" value="Male"
                        @if ($user->Gender === 'Male') @checked(true) @endif>
                    <label for="male">Male</label>
                    <input type="radio" id='female' name="Gender" value="Female"
                        @if ($user->Gender === 'Female') @checked(true) @endif>
                    <label for="female">Female</label>
                    <br>
                </div>
                @error('Gender')
                    <span class= "text-red-600 duration-200">{{ $message }}</span>
                @enderror
                <h3 class="block text-md font-medium text-gray-900"> Select Your Hobbies</h3>
                @php
                // Decode the stored hobbies from JSON for the current user
                $hobbies = json_decode($user->hobbies, true) ?? [];
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

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>
                </div>
            </form>



        </div>
    </div>
</x-layout>
