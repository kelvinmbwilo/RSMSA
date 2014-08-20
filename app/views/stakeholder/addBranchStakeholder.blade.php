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
        Add New Branch for {{ $stakeholder->name }}
    </header>
    <div class="panel-body">
        <form class="form" action='{{ url("stakeholderBranch/add/{$stakeholder->id}") }}' method="post">
            <div class="form-group">
                <label >Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder="Enter phone number">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control"name="address" id="address" placeholder="Enter address">
            </div>
            <div class="form-group">
                <label >Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </form>

    </div>
</section>

@stop