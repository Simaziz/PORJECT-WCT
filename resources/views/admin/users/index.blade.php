@extends('layouts.app')

@section('content')
<h2>Pending Users</h2>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@foreach ($pendingUsers as $user)
    <div>
        <strong>{{ $user->name }}</strong> ({{ $user->email }})
        <form action="/admin/users/{{ $user->id }}/approve" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Approve</button>
        </form>
        <form action="/admin/users/{{ $user->id }}/reject" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Reject</button>
        </form>
    </div>
@endforeach
@endsection
