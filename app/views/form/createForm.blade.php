@extends('layout.master')
@section('contents')

<section class="panel panel-success">
    <header class="panel-heading ">
       Select a Form
    </header>
    <div class="panel-body">
        <span id="responce" style="opacity: 0; color: "> Successful.. </span>

        <form class="form" action='{{url("form_creation")}}' method="post">
            <div class="form-group">
                <label class="col-lg-2 control-label">Select Form</label>
                <div class="col-lg-10">

                    <select name="select" class="form-control" required="required">
                        <option>-- select one --</option>
                        @foreach($fom as $formDetails)
                        <option value="{{ $formDetails->id }}">{{$formDetails->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{ Form::submit('Insert', array('class' => 'btn pull-right btn-info')) }}
                {{ Form::close() }}

                @if ($errors->any())
                <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
                @endif
            </div>
            <form class="form" action='{{url("databaseCredentials")}}' method="get">

                {{ Form::submit('Import', array('class' => 'btn pull-right btn-info')) }}

            </form>
</section>

@stop