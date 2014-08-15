@extends('layout.master')

@section('contents')

<a href="{{ url('user/add') }}" class="btn btn-success pull-right">Add new user</a>

<div class="panel-body">
<div class="adv-table">
<table  class="display table table-bordered table-striped" id="dynamic-table">
<thead>
<tr>
    <th>firstname</th>
    <th>middlename</th>
    <th>lastname</th>
    <th>username</th>
    <th>email</th>
    <th>phonenumber</th>
    <th>role</th>
    <th>stakeholderbranchid</th>
    <th>action</th>
</thead>
<tbody>
@foreach(User::all() as $user)
<tr>

    <td>{{ $user->	firstName }}</td>
    <td>{{ $user->middleName }}</td>
    <td>{{ $user->lastName}}</td>
    <td>{{ $user->username }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->phoneNumber }}</td>
    <td>{{ $user->role }}</td>
    <td>{{ $user->stakeholderBranchId }}</td>
    <td></td>

</tr>
@endforeach

</tbody>
<tfoot>
<tr>
    <th>firstname</th>
    <th>middlename</th>
    <th>lastname</th>
    <th>username</th>
    <th>email</th>
    <th>phonenumber</th>
    <th>role</th>
    <th>stakeholderbranchid</th>
    <th>action</th>

</tr>
</tfoot>
</table>
</div>
</div>


<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>


@stop