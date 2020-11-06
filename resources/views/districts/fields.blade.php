<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', 'Region:') !!}
    <select class="form-control" name="region_id">
        @foreach($regions as $region)
            <option value="{{$region->id}}" {{ isset($districts->region_id) && $districts->region_id == $region->id ? 'selected' : '' }}>{{$region->name}}</option>
        @endforeach
    </select>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'District:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'required' => 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('districts.index') }}" class="btn btn-default">Cancel</a>
</div>
