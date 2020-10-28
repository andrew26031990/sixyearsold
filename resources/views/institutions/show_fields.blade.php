<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country Id:') !!}
    <p>{{ $institutions->country_id }}</p>
</div>

<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('region_id', 'Region Id:') !!}
    <p>{{ $institutions->region_id }}</p>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', 'District Id:') !!}
    <p>{{ $institutions->district_id }}</p>
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

