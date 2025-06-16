<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Apply for {{ $job->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen flex flex-col justify-center">

<div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('jobs.apply', $job->id) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <h3 class="text-xl font-semibold mb-4">Apply for {{ $job->title }}</h3>

        <input type="text" name="applicant_name" placeholder="Your Full Name" required
            class="w-full px-4 py-2 border rounded-md" value="{{ old('applicant_name') }}" />

        <input type="email" name="applicant_email" placeholder="Your Email" required
            class="w-full px-4 py-2 border rounded-md" value="{{ old('applicant_email') }}" />

        <textarea name="cover_letter" placeholder="Cover Letter (optional)" rows="4"
            class="w-full px-4 py-2 border rounded-md">{{ old('cover_letter') }}</textarea>

        <label class="block">
            <span>Upload Resume (PDF only, max 2MB)</span>
            <input type="file" name="resume" accept=".pdf" class="mt-2" />
        </label>

        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">
            Submit Application
        </button>
    </form>
</div>

</body>
</html>
