<x-layout>
    <h2 class="text-2xl font-bold my-5">Update user Profile</h2>
    <div class="bg-gray-300 p-4 rounded-lg w-fit py-10 px-12">
        <!-- Display the user's name -->
        <h2 class="text-black text-xl mb-4">User: {{$user->name}}</h2>

        <!-- File Upload Form -->
        <div class="w-50">
            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
               

                <!-- File Input -->
                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">
                    Upload Image
                </label>
                <input type="number " name="user_id" value="{{$user->id}}" 
                    hidden/>
               
                <input 
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" 
                    aria-describedby="file_input_help" 
                    id="file_input" 
                    type="file" 
                    name="avatar"
                    required
                >

                <!-- Help Text -->
                <p class="mt-1 text-sm text-gray-500" id="file_input_help">
                    SVG, PNG, JPG, or GIF (MAX. 800x400px).
                </p>

                <button 
                    type="submit" 
                    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-layout>
