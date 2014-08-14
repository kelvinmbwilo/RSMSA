@extends('layout.master')

@section('contents')

<!--main content start-->
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Stakeholders

                    <button type="submit" class="btn btn-success pull-right"  data-toggle="modal" data-target="#myModal" value="Finish" >
                        New Stakeholder
                    </button>

                </header>

                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Stakeholder Name</th>
                                <th class="numeric">Phone</th>
                                <th class="numeric">Address</th>
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
                                <td class="numeric">{{$stakeHolder->phoneNumber}}</td>
                                <td>{{$stakeHolder->address}}</td>
                                <td class="numeric">{{$stakeHolder->created_at}}</td>
                                <td class="numeric">{{$stakeHolder->updated_at}}</td>
                                <td>
                                    <a class="btn btn-info" href='{{ url("stakeholderBranch/{$stakeHolder->id}") }}'>
                                        <i class="fa fa-level-down"></i>
                                        Branches
                                    </a>
                                </td>
                                <td class="table-condensed col-xs-pull-2">
                                    <div class="btn-group" >
                                        <button type="submit" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" value="Edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
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

<!-- New Stakeholder Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Stakeholder</h4>
            </div>
            <div class="modal-body">

                @include('stakeholder.form_wizard')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete modal -->

<div class="modal fade bs-example-modal-sm " style="padding-top: 30%" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content">

            @include('stakeholder.delete')

        </div>
    </div>
</div>

<!--script for this page-->

<script src="{{ asset('js/jquery.stepy.js') }}"></script>

<script>
    //step wizard

    $(function() {
        $('#default').stepy({
            backLabel: 'Previous',
            block: true,
            nextLabel: 'Next',
            titleClick: true,
            titleTarget: '.stepy-tab'
        });
    });
</script>

@stop