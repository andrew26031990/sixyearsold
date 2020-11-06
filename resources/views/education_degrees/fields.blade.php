<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Education degree:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('educationDegrees.index') }}" class="btn btn-default">Cancel</a>
</div>
