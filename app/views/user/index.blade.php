@extends('layout.master')

@section('contents')



<div class="panel panel-success">


<div class="panel-heading">list of users<a href="{{ url('user/add') }}" class="btn btn-success btn-xs pull-right">
        New user <i class="fa fa-plus"></i> </a></div>
    @if ($alert = Session::get('alert-success'))
    <div class="alert alert-success">
        {{ $alert }}
    </div>
    @endif
    <div class="panel-body">

<table  class="display table table-bordered table-striped" id="dynamic-table">
<thead>
<tr>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th>User Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Role</th>
    <th>Stakeholder</th>
    <th>Action</th>
</thead>
<tbody>
@foreach(User::all() as $user)
<tr>

    <td>{{ $user->firstName }}</td>
    <td>{{ $user->middleName }}</td>
    <td>{{ $user->lastName}}</td>
    <td>{{ $user->username }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->phoneNumber }}</td>
    <td>{{ $user->role }}</td>
    <td>@if($user->stakeholder){{ $user->stakeholder->stakeholder->name}} - {{ $user->stakeholder->name }}@endif</td>
    <td class="table-condensed col-xs-pull-2">
        <div class="btn-group btn-group-xs" >
            <a href="{{ url('user/edit')}}/{{$user->id}}" class="btn btn-info" title="edit">
                <i class="fa fa-edit"></i>
            </a>
            <a data-toggle="modal" class="open-DeleteDialog btn btn-danger" data-id="{{$user->id}}" href="#deleteDialog" title="delete">
                <i class="fa fa-trash-o"></i>
            </a>
        </div>
    </td>

</tr>
@endforeach

</tbody>

</table>
</div>
</div>


<!-- Delete modal -->

<div class="modal fade bs-example-modal-sm" id="deleteDialog" role="dialog" aria-hidden="true" style="padding-top: 20%" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-body">


            <?php
                $user_id = 'userId';
            ?>
            @include('user.delete')

        </div>
    </div>
</div>


<script>
    $(document).on("click", ".open-DeleteDialog", function(){
        var myId = $(this).data('id');
        $(".modal-body #DeleteButton").attr("href","{{url('user/delete')}}/"+myId);
    });
</script>

<!--dynamic table initialization -->
<script src="{{ asset('js/dynamic_table_init.js') }}"></script>


@stop