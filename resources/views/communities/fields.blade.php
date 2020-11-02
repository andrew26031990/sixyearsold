<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'District:') !!}
    <select class="form-control" name="district_id">
        @foreach($districts as $district)
            <option value="{{$district->id}}" {{ isset($communities->district_id) && $communities->district_id == $district->id ? 'selected' : '' }}>{{$district->name}}</option>
        @endforeach
    </select>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('communities.index') }}" class="btn btn-default">Cancel</a>
</div>
