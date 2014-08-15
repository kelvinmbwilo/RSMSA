@extends('layout.master')

@section('contents')

<section class="panel">
    <header class="panel-heading">
        {{{ $stakeHolderBranch->name or 'No Branches' }}}
    </header>
    <div class="panel-body">
        <form role="form">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="Sumatra" placeholder={{{$stakeHolderBranch->name or 'Name'}}}>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="number" class="form-control" id="+255 712 223 234" placeholder={{{$stakeHolderBranch->PhoneNumber or 'PhoneNumber'}}}>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" id="P O Box 2003 Arusha" placeholder={{{$stakeHolderBranch->address or 'Address'}}}>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder={{{$stakeHolderBranch->email or 'Email'}}}>
            </div>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
            <button type="submit" class="btn btn-default pull-right">Cancel</button>
        </form>

    </div>
</section>

@stop