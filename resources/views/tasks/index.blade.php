@extends('app')
    @section('content')
        {!! Form::open(['url' => 'tasks/index']) !!}
            <div class="form-group">
                {!! Form::label('task', 'タスク') !!}
                {!! Form::text('task', null) !!}
                <br>
                {!! Form::label('published_at', 'Published On:') !!}
                {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Add Task') !!}
            </div>
        {!! Form::close() !!}
        @foreach ($taskList as $task)
            <article>
                {!! Form::open(['method' => 'patch', 'action' => ['tasksController@check', $task->id]])!!}
                {{ $task->task }}
                {!! Form::checkbox('check',1)!!}
                {!! Form::submit('Finish') !!}
                <a href="index/{{$task->id}}/delete">削除</a>
                {!! Form::close() !!}
            </article>
        @endforeach
        <hr>
        <h2>完了したタスクはこちら</h2>  
        @foreach ($doneList as $task)
            <article>
                {!! Form::open(['method' => 'patch', 'action' => ['tasksController@check', $task->id]])!!}
                {{ $task->task }}
                {!! Form::checkbox('check',0)!!}
                {!! Form::submit('retry') !!}
                <a href="index/{{$task->id}}/delete">削除</a>
                {!! Form::close() !!}
            </article>
        @endforeach
    @stop

