@extends('admin.template')
@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Managers List</h3>

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
            @forelse($managers as $manager)
            <tr>
                <td>{{ $manager->id }}</td>
                <td>{{ $manager->first_name }} {{ $manager->last_name }}</td>
                <td>{{ $manager->email }}</td>
                <td>{{ $manager->mobile ? $manager->mobile : '-' }}</td>
                <td>
                    <a href="{{ route('managers.edit.form', $manager->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('managers.delete', $manager->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No managers found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
