<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Quiz</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-nevbar name={{$name}}></x-nevbar>




    <div class="bg-gray-100 flex flex-col items-center min-h-screen1 pt-5">
        <div class=" bg-white p-8 rounded-2xl  shadow-lg w-full max-w-md">

            @if(!session('quizDetails'))
        <h2 class="text-2xl text-center text-gray-800 mb-6 ">Add Quiz </h2>

        <form action="/add-quiz" method="get" class="space-y-4">
            @csrf
            <div>
                {{-- <label for="" class="text-gray-600 mb-1">Add Category</label> --}}
                <input type="text"placeholder="Enter Quiz name" name="quiz"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
            </div>

            <div>
                <select type="text" name="category_id"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                @foreach ($categories as $category )
                <option value="{{$category->id}}">{{$category->name}}</option>
                    
                @endforeach
                </select>
            </div>
            
    
            {{-- @error('category')
            <div class="text-red-500">{{$message}}</div>
            @enderror
     --}}
            <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white" >Add</button>
        </form>

        @else
        <span class="text-green-500 font-blod">Quiz : {{ session('quizDetails')->name }} </span>
        <h2 class="text-2xl text-center text-gray-800 mb-6 ">Add MCQs </h2>

        <form action="/add-mcq" method="POST" class="space-y-5">
            <div>
            @csrf
                <textarea type="text"placeholder="Enter Your Question name" name="question"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none"></textarea>
            </div>

            <div>
                <input type="text"placeholder="Enter First Option name" name="a"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
            </div>
            <div>
                <input type="text"placeholder="Enter Second Option name" name="b"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
            </div>
            <div>
                <input type="text"placeholder="Enter Third Option name" name="c"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
            </div>
            <div>
                <input type="text"placeholder="Enter Forth Option name" name="d"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
            </div>

            <div>
                <select name="correct_ans"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                <option>Select Right Answer</option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>

                </select>
            </div>
            <button type="submit" name="submit" value="add-more" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white" >Add More</button>
            <button type="submit" name="submit" value="done" class="w-full bg-green-500 rounded-xl px-4 py-2 text-white" >Add And Submit</button>


        </form>
        @endif


        </div>
    </div>

</body>
</html>