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
                    <a class="btn btn-success pull-right" href='{{ url("stakeholderBranch/add/{$stakeholder->id}") }}'>
                        New Branch
                    </a>

                </header>

                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Branch Name</th>
                                <th class="numeric">Phone Number</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th class="numeric">Updated</th>
                                <th class="numeric">Updated</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stakeholder->branches as $stakeHolderBranch)
                            @if(!is_null($stakeHolderBranch))
                            <tr>
                                <td>AAC</td>
                                <td>{{$stakeHolderBranch->name}}</td>
                                <td class="numeric">{{$stakeHolderBranch->PhoneNumber}}</td>
                                <td>{{$stakeHolderBranch->address}}</td>
                                <td>{{$stakeHolderBranch->email}}</td>
                                <td class="numeric">{{$stakeHolderBranch->created_at}}</td>
                                <td class="numeric">{{$stakeHolderBranch->updated_at}}</td>
                                <td class="table-condensed col-xs-pull-2">
                                    <div class="btn-group" >
                                        <a  class="btn btn-primary"  href="{{ url("stakeholderBranch/edit/{$stakeHolderBranch->id}") }}">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <form class="form pull-right" action='{{ url("stakeholderBranch/delete/{$stakeHolderBranch->id}") }}' method="post">
                                            <button class="btn  btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="Are you sure you want to delete this user ?">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endif
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

<script src="{{ asset('js/jquery.stepy.js') }}"></script>
@stop