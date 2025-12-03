<div class="list-group">
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>

    @if(auth()->user()->hasRole('super-admin'))
        <a href="{{ route('admin.roles') }}" class="list-group-item list-group-item-action">Role Management</a>
    @endif

    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor'))
        <a href="#" class="list-group-item list-group-item-action">Content</a>
    @endif

    @if(auth()->user()->hasRole('viewer'))
        <a href="#" class="list-group-item list-group-item-action">Reports</a>
    @endif
</div>
