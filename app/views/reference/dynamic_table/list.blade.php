@extends('layout.master')
@section('contents')

<section class="panel panel-success">
    <header class="panel-heading ">
        List of Reference reference
    </header>
    <div class="panel-body">
        <div class="col-sm-12">
            @if(isset($msg))
            <div class="alert alert-success fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                <strong>SUCCESS!</strong>Importation of Data was Successful.
            </div>
            @endif
            </div>
        </div>
</section>

@stop