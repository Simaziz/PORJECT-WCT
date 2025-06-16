@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Pending User Approvals</h3>

    @if($newUsersCount > 0)
        <div class="alert alert-info">
            You have {{ $newUsersCount }} new user(s) pending approval.
        </div>
    @else
        <div class="alert alert-success">
            No users pending approval.
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Approve</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendingUsers as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.users.approve', $user->id) }}">
                            @csrf
                            <button type="submit">Approve</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No pending users.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
