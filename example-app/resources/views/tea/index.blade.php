<x-layout title="Tea home page">

    <ul>
        @foreach ($teas as $tea)
           
        <li  class=" bg-blue-500 p-3 rounded-xl m-2 hover:bg-blue-800">
            <a href="/teas/{{$tea['id']}}">{{$tea['name']}}</a>

        </li>
        @endforeach
    </ul>
</x-layout>