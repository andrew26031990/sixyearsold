<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('region_id', __('message.region')) !!}
    <p>{{ $districts->r_name }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('message.district')) !!}
    <p>{{ $districts->name }}</p>
</div>

