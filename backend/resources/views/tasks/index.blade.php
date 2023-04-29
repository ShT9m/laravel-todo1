@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="h3">{{ config('app.name') }}</h1>
    <form action="{{ route('store') }}" method="post">
        @csrf
        {{-- Cross site request forgeries --}}
        {{-- to validate the request /security / for CSRF protection --}}
        <div class="row gx-2 mb-3">
    `       <div class="col-9">
                <input type="text" name="name" class="form-control" placeholder="Create a task"
                value="{{ old('name') }}" autofocus>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-plus"></i> Add</button>
            </div>
            {{-- Error message here --}}
            @error('name')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
    </form>
    @if($tasks->isNotEmpty())
        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item d-flex align-items-center">
                    {{-- Tasks --}}
                    <p class="mb-0 me-auto">{{ $task->name }}</p>

                    {{-- Action Buttons --}}
                    <a href="{{ route('edit', $task->id) }}" class="btn btn-outline-secondary btn-sm border border-0" title="Edit"><i class="fa-solid fa-pen"></i></a>
                    <form action="{{ route('destroy', $task->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm border border-0" title="Delete">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
