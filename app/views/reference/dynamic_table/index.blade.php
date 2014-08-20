@extends('layout.master')
@section('contents')

<section class="panel">
    <header class="panel-heading">
        References
    </header>
    <div class="panel-body">
        <span id="responce" style="opacity: 0; color: "> Successful.. </span>
        <form class="form" action='{{url("dynamic_table/getColumn")}}' method="post">
            <div class="form-group">
                <label class="col-lg-2 control-label">Select Reference Type</label>
                <div class="col-lg-10">
                    <select name="select" class="form-control">
                        <option>-- select one --</option>
                        @foreach($reference as $ref)
                        <option value="{{ $ref->id }}">{{$ref->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{ Form::submit('Submit', array('class' => 'btn pull-right')) }}
                {{ Form::close() }}

                @if ($errors->any())
                <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
                @endif
            </div>
</section>

@stop