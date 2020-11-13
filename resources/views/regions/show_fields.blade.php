<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', __('message.country')) !!}
    <p>{{ $regions->c_name }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('message.region')) !!}
    <p>{{ $regions->name }}</p>
</div>

