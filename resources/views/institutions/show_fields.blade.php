<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:') !!}
    <p>{{ $institutions->c_name }}</p>
</div>

<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('region_id', 'Region:') !!}
    <p>{{ $institutions->r_name }}</p>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', 'District:') !!}
    <p>{{ $institutions->d_name }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $institutions->name }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $institutions->address }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $institutions->code }}</p>
</div>

