@extends('layout.master')
@section('contents')
@include('stakeholder.delete')
<!--main content start-->
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Stakeholders
                    <a class="btn btn-success pull-right" href={{ url('stakeholder/add') }}>
                        New Stakeholder
                    </a>

                </header>

                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Stakeholder Name</th>
                                <th class="numeric">Created</th>
                                <th class="numeric">Updated</th>
                                <th>Branches</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stakeHolder as $stakeHolder)
                            <tr>
                                <td>AAC</td>
                                <td>{{$stakeHolder->name}}</td>
                                <td class="numeric">{{$stakeHolder->created_at}}</td>
                                <td class="numeric">{{$stakeHolder->updated_at}}</td>
                                <td>
                                    <a class="btn btn-info" href='{{ url("stakeholder/{$stakeHolder->id}") }}'>
                                        <i class="fa fa-level-down"></i>
                                        Branches
                                    </a>
                                </td>
                                <td class="table-condensed col-xs-pull-2">
                                    <div class="btn-group" >
                                        <a class="btn btn-primary" href="{{ url("stakeholder/edit/{$stakeHolder->id}") }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {{ Form::open(array('action' => array('StakeholderController@destroy', $stakeHolder->id), 'method' => 'post', 'class' => 'pull-right')) }}
                                            <button class="btn  btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="Are you sure you want to delete this user ?">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>

    </div>
    <!-- page end-->
</section>
<!--script for this page-->

<script src="{{ asset('js/jquery.stepy.js') }}"></script>
@stop