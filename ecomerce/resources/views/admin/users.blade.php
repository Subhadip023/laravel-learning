<x-layout-admin>
   
   
    
    <div class="relative overflow-x-auto">
    
        <div class=" h-20 flex items-center justify-evenly">

            <div class="relative flex gap-x-3 items-center overflow-x-auto">

                Select user per page
                <form method="GET" action="{{ route('admin.users.index') }}">
                    <select name="perPage" onchange="this.form.submit()" class=" form-select px-2 py-1 border rounded">
                        <option value="3" {{ request('perPage') == 3 ? 'selected' : '' }}>3</option>
                        <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('perPage') == 5 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                    </select>
                </form>
        </div>

            <a href="/register"><button class="bg-blue-700 text-white p-2 rounded-lg px-5">Add user</button></a>

        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 ">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        User name
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        User Image
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Hobbies
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        Role
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        File
                    </th>


                    <th scope="col" class="px-6 py-3 text-center">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr class="bg-white border-b ">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap  ">
                            {{ $user['name'] }}
                        </th>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap  ">
                            <div>


                            </div>
                            @if ($user->profile)
                                <img class="w-20 h-20" src="{{ Storage::url($user->profile->path) }}"
                                    alt="Profile Image">
                            @else
                                <a href="/profile/create/{{ $user->id }}">

                                    <svg class=" text-green-600 mx-auto scale-150" xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-plus-circle"
                                        viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                    </svg>

                                </a>
                            @endif
                        </th>

                        <td class="px-6 py-4">{{ $user->Gender }}</td>


                        <td class="px-6 py-4">

                            @php
                                $hobbies = json_decode($user->hobbies);
                            @endphp

                            @if ($hobbies)
                                <ul>
                                    @foreach ($hobbies as $hobby)
                                        <li>{{ $hobby }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No hobbies selected yet.</p>
                            @endif
                        </td>


                        <td class="px-6 py-4">{{ $user->role->name }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center p-4">

                                @if ($user->filepath)
                                    @php
                                        $fileUrl = Storage::url($user->filepath);
                                    @endphp

                                    <!-- Check if it's an image -->
                                    @if (Str::startsWith(mime_content_type(public_path('storage/' . $user->filepath)), 'image'))
                                        <img src="{{ $fileUrl }}" alt="User File" class="w-20 h-20 rounded border">
                                    @elseif (Str::endsWith($user->filepath, ['.pdf']))
                                        <!-- Embed a PDF -->
                                        <iframe src="{{ $fileUrl }}" width="150" height="190"></iframe>
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
                                @else
                                    <p>No file uploaded.</p>
                                @endif
                            </div>


                        </td>


                        <td class="px-6 py-4">
                            {{ $user['email'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user['phone'] }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($user->address)
                                {{ $user->address->street }}, {{ $user->address->city }},
                                {{ $user->address->state }}, Pin code: {{ $user->address->postal_code }},
                                {{ $user->address->country }}
                            @else
                                <a href="/admin/{{ $user->id }}/add-address"
                                    class="flex mx-auto  text-green-700 items-center border-2 border-green-500 p-2 h-fit gap-1 w-fit my-2 rounded-lg hover:text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                                    </svg> Add address

                                </a>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex ">


                                <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white p-2 rounded-lg"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                        </svg></button>
                                </form>

                                <form action="{{ route('user.edit', ['user' => $user->id]) }}" method="GET">
                                    @csrf
                                    @method('get')
                                    <button class="bg-green-600 ml-2 text-white p-2 rounded-lg"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                        </svg></button>

                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        <div class="mt-4 p-3">
            {{ $users->links() }}
        </div>
    </div>

  
    
</x-layout-admin>
