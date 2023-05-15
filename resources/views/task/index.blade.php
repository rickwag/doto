@extends('layouts.app')

@section('content')
    <div class="tasks-index">
        <header class="d-flex justify-content-between align-items-center m-3">
            <h3>Tasks</h3>

            <a href="{{ route('tasks.create') }}"><i class="fa-solid fa-plus"></i></a>
        </header>

        <ol class="list-group list-group-numbered">

            @foreach ($tasks as $key => $task)
                <a href="{{ route('tasks.edit', $task) }}">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold" style="<?php echo $task->status ? 'text-decoration-line:line-through; text-decoration-color: red' : ''; ?>">{{ $task->title }}</div>
                            {{ $task->description }}
                        </div>

                        <input type="checkbox" name="complete" id="complete-{{ $key }}" class="form-check-input"
                            <?php echo $task->status == 1 ? 'checked' : ''; ?> onclick="change_status(<?php echo $task->id; ?>)">
                    </li>
                </a>
            @endforeach
        </ol>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function change_status(id) {
            let status = 0;
            if ($('#' + event.target.id).is(':checked')) {
                status = 1;
            }

            $.ajax({
                type: 'POST',
                url: '/tasks/check' + '/' + id + '/' + status,
                data: '_token = <?php echo csrf_token(); ?>',
                success: function(data) {
                    console.log(data.msg);

                    window.location.href = '/';
                }
            });
        }
    </script>
@endsection
