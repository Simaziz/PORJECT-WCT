<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h2 class="text-2xl font-bold mb-6">Your Favorite Jobs</h2>

    @if ($favorites->count())
        <div class="space-y-6">
            @foreach ($favorites as $job)
                <div class="bg-white rounded-lg shadow overflow-hidden flex flex-col md:flex-row items-center md:items-start">

                    <!-- Job Image -->
                    <div class="w-full md:w-1/3 h-48 md:h-48 overflow-hidden">
                        <img src="{{ asset('images/office.jpeg') }}" alt="Job Image" class="object-cover w-full h-full" />
                    </div>

                    <!-- Job Details -->
                    <div class="flex-1 p-6">
                        <h3 class="text-lg font-semibold">{{ $job->title }}</h3>
                        <p class="text-gray-600">{{ $job->company }} • {{ $job->location }}</p>
                        <p class="text-sm text-gray-500 mt-1">{{ $job->category ?? 'N/A' }} • {{ $job->employment_type ?? 'N/A' }}</p>
                    </div>

                    <!-- Apply Button -->
                    <div class="p-6">
                        <a href="{{ route('jobs.apply.form', $job->id) }}"
                           class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                           Apply
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $favorites->links() }}
        </div>
    @else
        <p class="text-gray-500">You haven’t favorited any jobs yet.</p>
    @endif
</div>
@endsection

    
</body>
</html>