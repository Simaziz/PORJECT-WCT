@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-indigo-600">👨‍💼 Employer Dashboard</h1>
    <p class="mt-4 text-gray-700">Welcome, {{ Auth::user()->name }}! You can now post jobs here.</p>
</div>
@endsection
@auth
    @if(Auth::user()->role === 'employer')
       <a href="{{ route('jobs.create') }}" class="inline-block mt-6 bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
    Post a New Job
</a>

    @endif
@endauth
