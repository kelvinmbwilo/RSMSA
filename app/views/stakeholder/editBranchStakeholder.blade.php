@extends('layout.master')

@section('contents')

<section class="panel">
    <header class="panel-heading">
        {{{ $stakeHolderBranch->name or 'No Branches' }}}
    </header>
    <div class="panel-body">
        <form class="form" action='{{ url("stakeholderBranch/edit/{$stakeHolderBranch->id}") }}' method="post">
            <div class="form-group">
                <label >Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder={{{$stakeHolderBranch->name or 'Name'}}}>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder={{{$stakeHolderBranch->PhoneNumber or 'Phone Number'}}}>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control"name="address" id="address" placeholder={{{$stakeHolderBranch->address or 'Address'}}}>
            </div>
            <div class="form-group">
                <label >Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder={{{$stakeHolderBranch->email or 'Email'}}}>
            </div>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </form>

    </div>
</section>

@stop