@extends('layout.master')

@section('contents')

<!--main content start-->
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <button type="submit" class="btn btn-success pull-right"  data-toggle="modal" data-target="#myModal" value="Finish" >
                        New Branch
                    </button>

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
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm" >
                                            <i class="fa fa-trash-o"></i>
                                        </button>
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

<!-- Delete modal -->

<div class="modal fade bs-example-modal-sm " style="padding-top: 20%" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content">

            @include('stakeholder.delete')

        </div>
    </div>
</div>

<!--script for this page-->

<script src="{{ asset('js/jquery.stepy.js') }}"></script>
@stop