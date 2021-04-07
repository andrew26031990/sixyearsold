<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', __('message.country')) !!}
    <p>{{ $institutions->c_name }}</p>
</div>

<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('region_id', __('message.region')) !!}
    <p>{{ $institutions->r_name }}</p>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', __('message.district')) !!}
    <p>{{ $institutions->d_name }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('message.institution')) !!}
    <p>{{ $institutions->name }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('message.address')) !!}
    <p>{{ $institutions->address }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('message.tax_identification_number')) !!}
    <p>{{ $institutions->code }}</p>
</div>

