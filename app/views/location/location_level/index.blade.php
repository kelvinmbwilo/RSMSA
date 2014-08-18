@extends('layout.master')

@section('contents')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Location Levels
                    <a class="btn btn-success pull-right" href={{ url('location/level/add') }}>
                    New Location Level
                    </a>

                </header>

                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $j = 0 ?>
                            @foreach($levels as $level)
                            <tr>
                                <td>{{ ++$j }}</td>
                                <td>{{$level->name}}</td>
                                <td>{{$level->parentId}}</td>
                                <td>
                                    <a class="btn btn-info" href='{{ url("location/level/{$level->id}/units") }}'>
                                        <i class="fa fa-level-down"></i>
                                        Administrative Units
                                    </a>
                                </td>
                                <td class="table-condensed col-xs-pull-2">
                                    <div class="btn-group" >
                                        <a class="btn btn-primary" href="{{ url("location/level/edit/{$level->id}") }}">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        {{ Form::open(array('action' => array('LocationLevel@destroy', $stakeHolder->id), 'method' => 'post', 'class' => 'pull-right')) }}
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
@stop