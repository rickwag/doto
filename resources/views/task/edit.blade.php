@extends('layouts.app')

@section('content')
    <div class="tasks-index">
        <header class="d-flex justify-content-between align-items-center m-3">
            <h3>Add New Task</h3>

            <a href="{{ route('tasks.index') }}"><i class="fa-solid fa-home"></i></a>
        </header>

        <form class="text-light" action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
            </div>

            @error('title')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="3" class="form-control">
                    {{ $task->description }}
                </textarea>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-danger" type="button" onclick="delete_task(<?php echo $task->id; ?>)">Delete</button>
            </div>
        </form>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function delete_task(id) {

            let result = confirm('Are you sure you want to delete the task?');

            if (!result) return; 

            $.ajax({
                type: 'DELETE',
                url: '/tasks/delete' + '/' + id,
                data: '_token = <?php echo csrf_token(); ?>',
                success: function(data) {
                    console.log(data.msg);

                    window.location.href = '/';
                }
            });
        }
    </script>
@endsection
