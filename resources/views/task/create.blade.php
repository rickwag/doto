@extends('layouts.app')

@section('content')
    <div class="tasks-index">
        <header class="d-flex justify-content-between align-items-center m-3">
            <h3>Add New Task</h3>

            <a href="{{ route('tasks.index') }}"><i class="fa-solid fa-home"></i></a>
        </header>

        <form class="text-light" action="{{route('tasks.store')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            @error('title')
                <div class="alert alert-warning">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="3" class="form-control">
                    {{old('description')}}
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
