@extends('app')
    @section('content')
        <h1>あなたの仕事を片付けよう</h1>
        
            <article>
                {!! Form::open(['method' => 'patch', 'action' => ['tasksController@update', $task->id]])!!}
                {!! Form::text('task', null) !!}
                {!! Form::checkbox('check',1)!!}
                {!! Form::submit('Finish') !!}
                {!! Form::close() !!}
            </article>
       
    @stop
