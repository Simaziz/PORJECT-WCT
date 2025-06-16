<!-- resources/views/jobs.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindWork - Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <!-- Navbar -->
    <nav class="flex justify-between items-center p-4 border-b border-gray-700">
        <div class="text-lg font-bold">FindWork</div>
        <div class="flex items-center space-x-4">
            <a href="#" class="text-sm text-gray-300 hover:text-white">Find Jobs</a>
            <a href="#" class="text-sm text-gray-300 hover:text-white">For Companies</a>
            <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white">Login</a>
<a href="/register" class="...">Sign Up</a> <!-- Only if you have this route -->
        </div>
    </nav>

    <!-- Hero -->
    <section class="text-center py-16 px-4">
        <h1 class="text-4xl font-bold mb-4">Discover more than <span class="text-blue-400">5000+ Jobs</span></h1>
        <p class="text-gray-400 mb-6">Great platform for the job seeker that searching for new career heights and passionate about startups.</p>
        <div class="max-w-xl mx-auto flex gap-2">
            <input type="text" placeholder="Search by title, keyword..." class="flex-grow p-2 rounded bg-gray-800 border border-gray-700">
            <button class="px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded">Search job</button>
        </div>
    </section>

    <!-- Categories -->
    <section class="px-4 py-10">
        <h2 class="text-2xl font-semibold mb-4">Explore by <span class="text-blue-400">category</span></h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ([
                ['Design', 235], ['Sales', 756], ['Marketing', 210], ['Finance', 390],
                ['Technology', 458], ['Engineering', 211], ['Backends', 91], ['Human Resource', 154]
            ] as [$category, $jobs])
            <div class="bg-gray-800 p-4 rounded shadow hover:shadow-lg">
                <h3 class="text-lg font-medium">{{ $category }}</h3>
                <p class="text-sm text-gray-400">{{ $jobs }} jobs available</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-indigo-700 text-white text-center py-12">
        <h2 class="text-3xl font-bold mb-2">Start posting jobs today</h2>
        <p class="text-gray-200 mb-4">Reach thousands of job seekers in one place.</p>
        <button class="px-6 py-2 bg-white text-indigo-700 rounded hover:bg-gray-100">Get Started</button>
    </section>

    <!-- Featured Jobs -->
    <section class="px-4 py-10">
        <h2 class="text-2xl font-semibold mb-4">Featured <span class="text-blue-400">jobs</span></h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach (range(1, 6) as $i)
            <div class="bg-gray-800 p-4 rounded shadow hover:shadow-lg">
                <h3 class="text-lg font-bold">Email Marketing</h3>
                <p class="text-gray-400 text-sm">Dropbox | Full Time | San Francisco</p>
                <span class="inline-block mt-2 px-2 py-1 text-xs bg-blue-600 rounded">Apply Now</span>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Latest Jobs -->
    <section class="px-4 py-10">
        <h2 class="text-2xl font-semibold mb-4">Latest <span class="text-blue-400">jobs open</span></h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach (range(1, 6) as $i)
            <div class="bg-gray-800 p-4 rounded shadow hover:shadow-lg">
                <h3 class="text-lg font-bold">Social Media Assistant</h3>
                <p class="text-gray-400 text-sm">Upwork | Remote | Contract</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 py-8 text-sm text-gray-400 px-4">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h4 class="text-white font-semibold mb-2">Jobninity</h4>
                <p>Find your dream job faster with our reliable job board.</p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-2">About</h4>
                <ul>
                    <li><a href="#" class="hover:text-white">Company</a></li>
                    <li><a href="#" class="hover:text-white">Terms</a></li>
                    <li><a href="#" class="hover:text-white">Privacy</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-2">Get job notifications</h4>
                <input type="email" placeholder="Enter email" class="w-full p-2 rounded bg-gray-700 border border-gray-600 mb-2">
                <button class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-500">Subscribe</button>
            </div>
        </div>
        <p class="text-center mt-8">&copy; 2025 Jobninity. All rights reserved.</p>
    </footer>
</body>
</html>