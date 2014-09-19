@extends('layout.master')

@section('contents')
<div class="row">
    <div class="col-lg-6 col-md-offset-2 ">
        <section class="panel panel-success">
            <header class="panel-heading">
                List of Database for mapping with the form
            </header>
         <form class="form-horizontal" id="default" method="post" action="{{ url('formDatabase/1') }}">
             <?php $i=1;?>
            @foreach($tableNames as $key=>$table)
            <br>
            <br>
            <fieldset><legend>{{ $table }}</legend><input type="checkbox" value="{{$key}} name"check"{{$i++}}>

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

