@extends('layout.master')
@section('contents')

<section class="panel">
    <header class="panel-heading">
        Add New Stakeholder
    </header>
    <div class="panel-body">
        <span id="responce" style="opacity: 0; color: "> Successful.. </span>
      <form class="form" action='{{ url("data/add/getcolumn") }}' method="post">
        <div class="form-group">
            <label class="col-lg-2 control-label">Select Type</label>
            <div class="col-lg-10">
                <select name="select" class="form-control">
                    <option>-- select one --</option>
                    @foreach($table as $tbl)
                    <option value="{{ $tbl->id }}">{{ $tbl->categoryName }}</option>
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