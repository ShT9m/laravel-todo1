@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<h1 class="h3">Edit Task</h1>
<form action="{{ route('update', $task->id) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row gx-2 mb-3">
        <div class="col-10">
            <input type="text" name="name" id="name" value="{{ old('name', $task->name) }}" class="form-control" autofocus>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-success w-100">
            <i class="fa-solid fa-check"></i>Save
            </button>
        </div>
        @error('name')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
</form>

@endsection
