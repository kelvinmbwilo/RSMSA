@extends('layout.master')

@section('contents')

<section class="panel panel-success">
    <header class="panel-heading">
        Enter Details for the Form <b>{{$formD->name}}</b>
    </header>

    <div class="panel-body">
        <div class="col-md-8 col-md-offset-2">
        <form class="form" action='{{url("form_processing")}}' method="post">
            <input type="hidden" value="{{$formD->id}}"  name="formId">
            <?php $m=0;?>
            <?php $f=1;?>
            @foreach($formData as $formDetails)
                <input type="hidden" value="{{$formDetails->id}}"  name="{{$f++}}_formData">

                <br>
                <fieldset><legend>{{ $formDetails->dataForm->name }}</legend>
                  @if( $formDetails->dataForm->hasReference == "false")
                   @foreach($formDetails->dataForm->options as $option)

                    <div class="form-group">
                        <label for="option{{ $option->options->id }}">{{ $option->options->name }}</label>
                        @if(count($option->options->categoryOptions) !== 0)
                          <select class="form-control" name="{{ $option->data->id }}_option_{{ $option->options->id }}">
                              @foreach($option->options->categoryOptions as $category)
                               <option value="{{ $category->category->id }}" >{{ $category->category->name }}</option>
                              @endforeach
                          </select>
                        @else
                        <input type="text" name="{{ $option->data->id }}_option_{{ $option->options->id }}" class="form-control" id="exampleInputEmail1" placeholder="{{ $option->options->name }}">
                        @endif
                    </div>
                   @endforeach
                 @endif

                    @if( $formDetails->dataForm->hasReference == "true")
                    @foreach($formDetails->dataForm->options as $option)

                    <div class="form-group">
                        <label for="option{{ $option->options->id }}">{{ $option->options->name }}</label>
                        @if(count($option->options->categoryOptions) !== 0)
                        <select class="form-control" name="{{ $option->data->id }}_option_{{ $option->options->id }}">
                            @foreach($option->options->categoryOptions as $category)
                            <option value="{{ $category->category->id }}" >{{ $category->category->name }}</option>
                            @endforeach
                        </select>
                        @else
                        <input type="text" name="{{ $option->data->id }}_option_{{ $option->options->id }}" class="form-control" id="exampleInputEmail1" placeholder="{{ $option->options->name }}">
                        @endif
                    </div>
                    @endforeach
                    @endif
                </fieldset>
            @endforeach

        {{ Form::submit('Submit', array('class' => 'btn pull-right btn-info')) }}
        </form>
        </div>
    </div>
</section>
</div>
</section>


@stop