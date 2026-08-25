<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="bg=white shadow-md px-4 py-3 ">
       <div class="flex justify-between items-center">
         <div class="text-xl font-bold text-gray-800 hover:text-blue-500 cursor-pointer">
            Qiuz System
        </div>
        <div class="space-x-4 font-bold">
            <a class="text-gray-700 hover:text-blue-500" href="">Categories</a>
            <a class="text-gray-700 hover:text-blue-500" href="">Quiz</a>
            <a class="text-gray-700 hover:text-blue-500" href="">Welcome {{ $name }}</a>
            <a class="text-gray-700 hover:text-blue-500" href="">Login</a>
        </div>

       </div>
    </nav>
    
</body>
</html>