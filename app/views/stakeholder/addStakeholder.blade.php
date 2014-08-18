<section class="panel">
    <header class="panel-heading">
        Add New Stakeholder
    </header>
    <div class="panel-body">
        <span id="responce" style="opacity: 0; color: "> Successful.. </span>
        {{ Form::open(array('action' => 'StakeholderController@store' , 'method' => 'post', 'class'=>'form')) }}
             <div class="form-group">
                 <label>Name</label>
                 <input type="text" id="name" class="form-control" name="name"/>
             </div>
                {{ Form::submit('Submit', array('class' => 'btn pull-right')) }}
        {{ Form::close() }}

        @if ($errors->any())
        <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
        @endif
    </div>
</section>