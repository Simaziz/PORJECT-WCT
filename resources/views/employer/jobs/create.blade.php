<!-- resources/views/employer/jobs/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Post a New Job</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf

        <label class="block mb-2 font-semibold" for="title">Job Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full p-2 border rounded mb-4" />

        <label class="block mb-2 font-semibold" for="company">Company</label>
        <input type="text" name="company" id="company" value="{{ old('company') }}" required class="w-full p-2 border rounded mb-4" />

        <label class="block mb-2 font-semibold" for="location">Location</label>
        <input type="text" name="location" id="location" value="{{ old('location') }}" required class="w-full p-2 border rounded mb-4" />

        <label class="block mb-2 font-semibold" for="employment_type">Employment Type</label>
        <select name="employment_type" id="employment_type" required class="w-full p-2 border rounded mb-4">
            <option value="">-- Select Type --</option>
            <option value="Full-time" {{ old('employment_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
            <option value="Part-time" {{ old('employment_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
            <option value="Contract" {{ old('employment_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
            <option value="Internship" {{ old('employment_type') == 'Internship' ? 'selected' : '' }}>Internship</option>
        </select>

        <label class="block mb-2 font-semibold" for="category">Category</label>
        <input type="text" name="category" id="category" value="{{ old('category') }}" required class="w-full p-2 border rounded mb-4" />

        <!-- Added Job Level -->
        <label class="block mb-2 font-semibold" for="level">Job Level</label>
        <select name="level" id="level" required class="w-full p-2 border rounded mb-4">
            <option value="">-- Select Level --</option>
            <option value="Entry" {{ old('level') == 'Entry' ? 'selected' : '' }}>Entry</option>
            <option value="Mid" {{ old('level') == 'Mid' ? 'selected' : '' }}>Mid</option>
            <option value="Senior" {{ old('level') == 'Senior' ? 'selected' : '' }}>Senior</option>
        </select>

        <label class="block mb-2 font-semibold" for="description">Job Description</label>
        <textarea name="description" id="description" rows="5" required class="w-full p-2 border rounded mb-4">{{ old('description') }}</textarea>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Post Job</button>
    </form>
</div>
@endsection
