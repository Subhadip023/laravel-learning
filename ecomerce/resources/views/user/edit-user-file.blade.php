<x-layout>
    <h2 class="text-2xl font-bold my-5">Update user Profile</h2>
    <div class="bg-gray-300 p-4 rounded-lg w-fit py-10 px-12">
        <!-- Display the user's name -->
        <h2 class="text-black text-xl mb-4">User: {{$user->name}}</h2>
@auth
    @if (auth()->user()->role->name=='Admin')
        <a href="/admin/users">users page </a>
    @endif
@endauth
    

        <!-- File Upload Form -->
        <div class="w-50">
            <form action="{{route('user.fileupload',['user'=>$user->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                
                @if ($user->filepath)
                @php
                $fileUrl = Storage::url($user->filepath);
                @endphp
                
                <!-- Check if it's an image -->
                @if (Str::startsWith(mime_content_type(public_path('storage/'.$user->filepath)), 'image'))
                <img src="{{ $fileUrl }}" alt="User File" class="w-20 h-20 rounded border">
                @elseif (Str::endsWith($user->filepath, ['.pdf']))
                <!-- Embed a PDF -->
                <iframe src="{{ $fileUrl }}" class="w-30" width="150" height="190" ></iframe>
                @else
                <!-- Provide a Download Link for Other Files -->
                <a href="{{ $fileUrl }}" class="text-blue-500 underline" download>
                    Download File
                </a>
                
                              
                
                @endif
                @endif

                <!-- File Input -->
                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">
                    Upload File
                </label>
                {{-- <input type="number " name="user_id" value="{{$user->id}}" 
                    hidden/> --}}
               
                <input 
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" 
                    aria-describedby="file_input_help" 
                    id="file_input" 
                    type="file" 
                    name="userfile"
                    required
                >
                @error('userfile')
                <span class= "text-red-600 duration-200">{{ $message }}</span>
                @enderror
                    
               

                <!-- Help Text -->
                {{-- <p class="mt-1 text-sm text-gray-500" id="file_input_help">
                    SVG, PNG, JPG, or GIF (MAX. 800x400px).
                </p> --}}

                <button 
                    type="submit" 
                    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-layout>
