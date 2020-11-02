<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $groups->name }}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:') !!}
    <p>{{ $groups->c_name }}</p>
</div>

<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('region_id', 'Region:') !!}
    <p>{{ $groups->r_name }}</p>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', 'District:') !!}
    <p>{{ $groups->d_name }}</p>
</div>

<!-- Institution Id Field -->
<div class="form-group">
    {!! Form::label('institution_id', 'Institution:') !!}
    <p>{{ $groups->i_name }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $groups->address }}</p>
</div>

