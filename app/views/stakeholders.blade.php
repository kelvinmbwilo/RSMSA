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
                                <th class="numeric">Created</th>
                                <th class="numeric">Updated</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stakeHolder as $stakeHolder)
                            <tr>
                                <td>AAC</td>
                                <td>{{$stakeHolder->name}}</td>
                                <td class="numeric">{{$stakeHolder->phoneNumber}}</td>
                                <td class="numeric">{{$stakeHolder->created_at}}</td>
                                <td class="numeric">{{$stakeHolder->updated_at}}</td>
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

<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                @include('layout.form_wizard')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
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