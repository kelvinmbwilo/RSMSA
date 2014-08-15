@extends('layout.master')

@section('contents')


<section class="panel">
    <header class="panel-heading">
        Add New Stakeholder
    </header>
    <div class="panel-body">
        {{ Form::open(array('action' => 'StakeholderController@store' , 'method' => 'post', 'class'=>'form')) }}
        <ul>

            <li class="form-control">
                {{ Form::text('name') }}
            </li>
            <li>
                {{ Form::submit('Submit', array('class' => 'btn pull-right')) }}
            </li>
        </ul>
        {{ Form::close() }}

        @if ($errors->any())
        <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
        @endif
    </div>
</section>

@stop