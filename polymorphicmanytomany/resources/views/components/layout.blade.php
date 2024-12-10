<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>{{$title??"Welcome"}}</title>
    
</head>
<body class="bg-gray-900 text-white flex flex-col ">
    <div class="flex flex-col  items-center justify-center min-h-screen">
        
{{$slot}}

    </div>
</body>
</html>