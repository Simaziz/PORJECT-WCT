<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>JobHuntly - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen flex flex-col">

  <!-- Header -->
  <header class="bg-white shadow w-full">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-indigo-600">FindWork</h1>
      <nav class="space-x-6">
        <a href="{{ route('home') }}" class="text-indigo-600 border-b-2 border-indigo-600">Find Jobs</a>
        <a href="#" class="text-gray-600 hover:text-indigo-600">Browse Companies</a>
      </nav>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm">Logout</button>
      </form>
    </div>
  </header>

  <!-- Search Section -->
  <section class="bg-white py-12 w-full">
    <div class="max-w-5xl mx-auto text-center px-4">
      <h2 class="text-4xl font-bold mb-4">Find your <span class="text-indigo-500">dream job</span></h2>
      <form method="GET" action="{{ route('jobs.search') }}" class="flex flex-col md:flex-row justify-center gap-4">
        <input
          type="text"
          name="keyword"
          placeholder="Job title or keyword"
          value="{{ request('keyword') }}"
          class="w-full md:w-1/3 px-4 py-2 border rounded-md"
          aria-label="Job title or keyword"
        />
        <select
          name="location"
          class="w-full md:w-1/3 px-4 py-2 border rounded-md"
          aria-label="Select Location"
        >
          <option value="" {{ request('location') == '' ? 'selected' : '' }}>Any Location</option>
          <!-- <option value="non location" {{ request('location') == 'non location' ? 'selected' : '' }}>No Location</option> -->
          @foreach(['Phnom Penh', 'Siem Reap', 'Battambang', 'Sihanoukville', 'Kampong Cham', 'Takeo', 'Kampot', 'Kandal', 'Prey Veng', 'Pursat'] as $loc)
            <option value="{{ $loc }}" {{ request('location') == $loc ? 'selected' : '' }}>{{ $loc }}</option>
          @endforeach
        </select>
        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md">Search</button>
      </form>
    </div>
  </section>
<div class="flex  justify-end m-4">
  <a href="{{ route('jobs.favorites') }}" 
     class="inline-block px-4 py-2 bg-pink-400 text-white rounded-md hover:bg-pink-500 transition">
     My Favorites
  </a>
</div>







  <!-- Job Listings -->
  <main class="flex-grow w-full px-4 py-10 bg-gray-50">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-xl font-semibold mb-6">Job Listings</h2>

      @if ($jobs->count())
        <div class="space-y-6">
          @foreach ($jobs as $job)
            <div class="bg-white rounded-lg shadow overflow-hidden flex flex-col md:flex-row items-center md:items-start">

              <!-- Job Image -->
              <div class="w-full md:w-1/3 h-48 md:h-48 overflow-hidden">
                <img src="{{ asset('images/office.jpeg') }}" alt="Test Image" class="object-cover w-full h-full" />
              </div>

              <!-- Job Details -->
              <div class="flex-1 p-6">
                <h3 class="text-lg font-semibold">{{ $job->title }}</h3>
                <p class="text-gray-600">{{ $job->company }} • {{ $job->location }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ $job->category }} • {{ $job->employment_type ?? 'N/A' }}</p>
              </div>

              <!-- Favorite Form -->
              <div class="p-6">
        <form action="{{ route('jobs.favorite', $job) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit">
        @if(auth()->user()->favorites->contains($job))
            ❤️ Unfavorite
        @else
            🤍 Favorite
        @endif
    </button>
</form>

</form>

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

        <!-- Pagination -->
        <div class="mt-8">
          {{ $jobs->withQueryString()->links() }}
        </div>
      @else
        <p class="text-center text-gray-500">No jobs found.</p>
      @endif
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-10 mt-auto w-full">
    <div class="max-w-7xl mx-auto px-4 text-center text-sm text-gray-400">
      © 2025 JobHuntly. All rights reserved.
    </div>
  </footer>

</body>
</html>
