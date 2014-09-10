<?php
/**
 * Created by PhpStorm.
 * User: Isaiah
 * Date: 8/19/14
 * Time: 11:05 AM
 */ ?>

@extends('layout.master')

@section('contents')

<section class="panel">
    <header class="panel-heading">
        {{{ $stakeholder->name or 'No Branches' }}}
    </header>
    <div class="panel-body">
        <form action='{{ url("stakeholder/edit/{$stakeholder->id}") }}' method="post">
            <div class="form-group">
                <label> Name </label>
                <input type="text" class="form-control" name="name" id="name" placeholder={{{$stakeholder->name or 'Name'}}}>
            </div>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
            <button type="submit" class="btn btn-default pull-right">Cancel</button>
        </form>

    </div>
</section>

@stop