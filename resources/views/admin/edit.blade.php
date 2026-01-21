@extends('admin.template')
@yield('title', 'Admin Dashboard')
@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Edit Manager</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('managers.edit', $manager->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $manager->first_name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $manager->last_name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $manager->email) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Manager</button>
        <a href="{{ route('managers.list') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
