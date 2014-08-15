@extends('layout.master')

@section('contents')

<section class="panel">
    <header class="panel-heading">
        {{{ $stakeholder->name or 'No Branches' }}}
    </header>
    <div class="panel-body">
        {{ Form::open(array('action' => array('StakeholderController@edit', $stakeholder->id), 'method' => 'post')) }}
            <div class="form-group">
                <label> Name </label>
                <input type="text" class="form-control" name="name" id="name" placeholder={{{$stakeholder->name or 'Name'}}}>
            </div>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
            <button type="submit" class="btn btn-default pull-right">Cancel</button>
        {{ Form::close() }}

    </div>
</section>

@stop