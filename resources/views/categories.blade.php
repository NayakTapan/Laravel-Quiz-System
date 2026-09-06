<!DOCTYPE html>
<html lang="en">
<head>
    <title>Categories</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-nevbar name={{$name}}></x-nevbar>

    @if(session('category'))
    <div class="bg-green-800 text-white pl-5">{{ session('category') }}</div>
    @endif

    <div class="bg-gray-100 flex justify-center pt-10">
    <div class=" bg-white p-8 rounded-2xl  shadow-lg w-full max-w-sm">
    <h2 class="text-2xl text-center text-gray-800 mb-6 ">Categories Add </h2>
    @error('user')
       <div class="text-red-500">{{$message}}</div>
       @enderror
    <form action="/add-category" method="post" class="space-y-4">
        @csrf
        <div>
            <label for="" class="text-gray-600 mb-1">Add Category</label>
            <input type="text"placeholder="Enter Category name" name="category"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
       {{-- @error('name')
       <div class="text-red-500">{{$message}}</div>
       @enderror --}}
        </div>
        {{-- <div>
            <label for="" class="text-gray-600 mb-1">Password</label>
            <input type="password"placeholder="Enter Admin password" name="password"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
            @error('password')
       <div class="text-red-500">{{$message}}</div>
       @enderror
        </div> --}}
        <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white" >Add</button>
    </form>
    </div>
    </div>
    
</body>
</html>