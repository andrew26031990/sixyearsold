<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('message.group')) !!}
    <p>{{ $groups->name }}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', __('message.country')) !!}
    <p>{{ $groups->c_name }}</p>
</div>

<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('region_id', __('message.region')) !!}
    <p>{{ $groups->r_name }}</p>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', __('message.district')) !!}
    <p>{{ $groups->d_name }}</p>
</div>

<!-- Institution Id Field -->
<div class="form-group">
    {!! Form::label('institution_id', __('message.institution')) !!}
    <p>{{ $groups->i_name }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('message.address')) !!}
    <p>{{ $groups->address }}</p>
</div>

