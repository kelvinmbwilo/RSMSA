@extends('layout.master')

@section('contents')
<a href="{{ url('reference/add') }}" class="btn btn-success pull-right">Add new</a>
@if(isset($email))
<h3 class="text-success"> {{ $email }}</h3>
@endif
<div class="adv-table">
<table  class="display table table-bordered table-striped" id="dynamic-table">
<thead>
<tr>
    <th>#no</th>
    <th>Name</th>
    <th>Last Update</th>
</tr>
</thead>
<tbody>
@foreach(Reference::all() as $ref)
<tr>
    <td>{{ $ref->id }}</td>
    <td>{{ $ref->name }}</td>
    <td>{{ $ref->updated_at }}</td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <th>#no</th>
    <th>Name</th>
    <th>Last Update</th>
</tr>
</tfoot>
</table>
</div>
<script src="{{ asset('js/dynamic_table_init.js') }}"></script>
@stop