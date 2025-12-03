@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">Role Management</div>
    <div class="card-body">
        <p class="mb-3">Only super-admins can view this page.</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Label</th>
                    <th>Users</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->label ?? '—' }}</td>
                        <td>{{ $role->users()->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $roles->links() }}
    </div>
</div>
@endsection
