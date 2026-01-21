@extends('manager.template')
@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Users List</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('managers.create.form') }}" class="btn btn-primary mb-3">Add Manager</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile ? $user->mobile : '-' }}</td>
                <td>
                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                    <form action="" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No users found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
