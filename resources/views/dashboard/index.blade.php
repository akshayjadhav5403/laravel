@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
        <p class="mb-2">Welcome back, {{ $user->name }}!</p>
        <p class="mb-0">You currently have the following roles:</p>
        <ul class="mb-0">
            @forelse($roles as $role)
                <li>{{ $role }}</li>
            @empty
                <li>No roles assigned.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
