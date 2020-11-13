<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', __('message.country')) !!}
    <select class="form-control" name="country_id" required>
        @foreach($countries as $country)
            <option value="{{$country->id}}" {{ isset($regions->country_id) && $regions->country_id == $country->id ? 'selected' : '' }}>{{$country->name}}</option>
        @endforeach
    </select>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('message.region')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'required' => 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('message.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('regions.index') }}" class="btn btn-default">{{__('message.cancel')}}</a>
</div>
