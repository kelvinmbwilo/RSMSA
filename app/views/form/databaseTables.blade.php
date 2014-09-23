@extends('layout.master')

@section('contents')
<div class="row">
    <div class="col-lg-6 col-md-offset-2 ">
        <section class="panel panel-success">
            <header class="panel-heading">
               Select The List of Database for mapping with the form
            </header>
         <form class="form-horizontal" id="default" method="post" action='{{ url("formDatabase/{$form}") }}'>
             <?php $i=1;?>
            @foreach($tableNames as $key=>$table)
            <br>
            <br>
            <fieldset><legend><input type="checkbox" value="{{$table}}" name="list[{{$i++}}]">{{ $table }}</legend>

                @foreach($response[$key] as $option)
                <div class="form-group">

                        <label>{{$option}}:</label>
                </div>
                @endforeach
            </fieldset>
            @endforeach
             <div class="form-group">
                 <div class="col-md-6 text-center">
                     <input type="submit" value="Done" class="btn btn-info">
                 </div>
             </div>
         </form>
        </section>
    </div>
</div>

@stop

