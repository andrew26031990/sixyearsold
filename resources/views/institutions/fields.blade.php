<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'Country:') !!}
    <select class="form-control" name="country_id">
        @foreach($countries as $country)
            <option value="{{$country->id}}" {{ isset($institutions->country_id) && $institutions->country_id == $country->id ? 'selected' : '' }}>{{$country->name}}</option>
        @endforeach
    </select>
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', 'Region:') !!}
    <select class="form-control" name="region_id">
        @foreach($regions as $region)
            <option value="{{$region->id}}" {{ isset($institutions->region_id) && $institutions->region_id == $region->id ? 'selected' : '' }}>{{$region->name}}</option>
        @endforeach
    </select>
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'District:') !!}
    <select class="form-control" name="district_id">
        @foreach($districts as $district)
            <option value="{{$district->id}}" {{ isset($institutions->district_id) && $institutions->district_id == $district->id ? 'selected' : '' }}>{{$district->name}}</option>
        @endforeach
    </select>
</div>
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('institutions.index') }}" class="btn btn-default">Cancel</a>
</div>
