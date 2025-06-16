<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JobHuntly Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen flex items-center justify-center">

    <div class="flex w-full max-w-6xl shadow-lg rounded-2xl overflow-hidden">
        <!-- Left Side -->
        <div class="w-1/2 bg-gray-100 p-10 flex flex-col justify-center items-center text-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Graph_icon.svg/2048px-Graph_icon.svg.png" class="w-10 h-10 mb-4" alt="Graph Icon">
            <p class="text-xl font-bold">100K+</p>
            <p class="text-gray-600 mb-8">People got hired</p>

            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-40 h-40 rounded-full object-cover border-4 border-white shadow mb-4">
            <div class="text-left px-4">
                <p class="text-sm font-bold">Adam Sandler</p>
                <p class="text-xs text-gray-500 mb-2">Lead Engineer at Canva</p>
                <p class="text-sm italic text-gray-800">“Great platform for the job seeker that searching for new career heights.”</p>
            </div>
        </div>

        <!-- Right Side -->
        <div class="w-1/2 bg-white p-10">
            <div class="flex space-x-4 justify-center mb-8">
                <button class="px-4 py-2 font-semibold text-white bg-indigo-600 rounded-full">Job Seeker</button>
                <button class="px-4 py-2 font-semibold text-indigo-600 bg-transparent border-b-2 border-indigo-600">Company</button>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Welcome Back, Dude</h2>

            <!-- SESSION MESSAGES -->
            @if(session('message'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm text-center">
                    {{ session('message') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 text-red-800 p-3 rounded mb-4 text-sm text-center">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 text-red-800 p-3 rounded mb-4 text-sm text-center">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <a href="#" class="flex items-center justify-center border border-indigo-200 px-4 py-2 rounded mb-4 hover:bg-indigo-50">
                <img src="https://www.google.com/images/branding/product/ico/googleg_lodp.ico" alt="Google" class="w-5 h-5 mr-2">
                <span class="text-indigo-700 font-medium">Login with Google</span>
            </a>

            <div class="flex items-center my-4">
                <div class="flex-grow h-px bg-gray-300"></div>
                <span class="px-2 text-sm text-gray-500">Or login with email</span>
                <div class="flex-grow h-px bg-gray-300"></div>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" required class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="mr-2 text-indigo-600">
                    <label for="remember" class="text-sm text-gray-600">Remember me</label>
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">Login</button>
            </form>

            <p class="text-sm text-center mt-4 text-gray-600">
                Don’t have an account?
                <!-- Sign Up link removed -->
            </p>
        </div>
    </div>

</body>
</html>
