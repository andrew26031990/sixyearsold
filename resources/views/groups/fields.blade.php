<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('message.group')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

{{--<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', __('message.country')) !!}
    <select class="form-control" name="country_id" required>
        <option value="-1">{{__('message.choose_country')}}</option>
        @foreach($countries as $country)
            <option value="{{$country->id}}" {{ isset($groups->country_id) && $groups->country_id == $country->id ? 'selected' : '' }}>{{$country->name}}</option>
        @endforeach
    </select>
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', __('message.region')) !!}
    <select class="form-control" name="region_id" required disabled>
        <option value="-1">{{__('message.choose_region')}}</option>
        --}}{{--@foreach($regions as $region)
            <option value="{{$region->id}}" {{ isset($groups->region_id) && $groups->region_id == $region->id ? 'selected' : '' }}>{{$region->name}}</option>
        @endforeach--}}{{--
    </select>
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', __('message.district')) !!}
    <select class="form-control" name="district_id" required disabled>
        <option value="-1">{{__('message.choose_district')}}</option>
        --}}{{--@foreach($districts as $district)
            <option value="{{$district->id}}" {{ isset($groups->district_id) && $groups->district_id == $district->id ? 'selected' : '' }}>{{$district->name}}</option>
        @endforeach--}}{{--
    </select>
</div>

<!-- Institution Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institution_id', __('message.institution')) !!}
    <select class="form-control" name="institution_id" required disabled>
        <option value="-1">Выберите учреждение</option>
        --}}{{--@foreach($institutions as $institution)
            <option value="{{$institution->id}}" {{ isset($groups->institution_id) && $groups->institution_id == $institution->id ? 'selected' : '' }}>{{$institution->name}}</option>
        @endforeach--}}{{--
    </select>
</div>--}}

<!-- Country Id Field -->
{{--<div class="form-group col-sm-6">
    {!! Form::label('country_id', __('message.country')) !!}
    <select class="form-control" name="country_id" required>
        <option value="-1">{{__('message.choose_country')}}</option>
        @foreach($countries as $country)
            @if(isset($country->id))
                <option value="{{$country->id}}" {{ ($groups->country_id == $country->id) ? 'selected' : '' }}>{{$country->name}}</option>
                @break
            @endif
        @endforeach
    </select>
</div>--}}
<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', __('message.region')) !!}
    <select class="form-control" name="region_id" required>
        @if(isset($groups->id))
            @foreach($regions as $region)
                <option value="{{$region->id}}" {{ ($groups->region_id == $region->id) ? 'selected' : '' }}>{{$region->name}}</option>
            @endforeach
        @else
            @foreach($regions as $region)
                <option value="">Выберите область</option>
                <option value="{{$region->id}}">{{$region->name}}</option>
            @endforeach
        @endif
        {{--@foreach($regions as $region)
            @if(isset($region->id))
                <option value="{{$region->id}}" {{ ($groups->region_id == $region->id) ? 'selected' : '' }}>{{$region->name}}</option>
                @break
            @endif
        @endforeach--}}
    </select>
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', __('message.district')) !!}
    <select class="form-control" name="district_id" readonly required>
        @if(isset($groups->id))
            @foreach($districts as $district)
                <option value="{{$district->id}}" {{ ($groups->district_id == $district->id) ? 'selected' : '' }}>{{$district->name}}</option>
            @endforeach
        @else
            @foreach($districts as $district)
                <option value="">Выберите область</option>
                <option value="{{$district->id}}">{{$district->name}}</option>
            @endforeach
        @endif
    </select>
</div>

<!-- Institution Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institution_id', __('message.district')) !!}
    <select class="form-control" name="institution_id" readonly required>
        @if(isset($groups->id))
            @foreach($institutions as $institution)
                <option value="{{$institution->id}}" {{ ($groups->institution_id == $institution->id) ? 'selected' : '' }}>{{$institution->name}}</option>
            @endforeach
        @else
            @foreach($institutions as $institution)
                <option value="">Выберите область</option>
                <option value="{{$institution->id}}">{{$institution->name}}</option>
            @endforeach
        @endif
    </select>
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', __('message.address')) !!}
    {!! Form::textarea('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('message.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('groups.index') }}" class="btn btn-default">{{__('message.cancel')}}</a>
</div>
@push('scripts')
<script type="text/javascript">
    $(function(){
        $('select[name="region_id"]').on('change', function() {
            $('select[name="institution_id"]').attr('readonly', 'readonly');
            $('select[name="institution_id"]').html('<option value="">Выберите учреждение</option>');
        });
        $('select[name="country_id"]').on('change', function() {
            let id = $(this).val();
            if(id == -1){
                return;
            }
            $('select[name="region_id"]').html('');
            $.ajax({
                url: '/getRegions/{id}',
                type: 'GET',
                data: { id: id },
                success: function(response)
                {
                    $('select[name="region_id"]').removeAttr('readonly');
                    $('select[name="region_id"]').append(response);
                }
            });
        });
        $('select[name="region_id"]').on('change', function() {
            let id = $(this).val();
            if(id == -1){
                return;
            }
            $('select[name="district_id"]').html('');
            $.ajax({
                url: '/getDistricts/{id}',
                type: 'GET',
                data: { id: id },
                success: function(response)
                {
                    $('select[name="district_id"]').removeAttr('readonly');
                    $('select[name="district_id"]').append(response);
                }
            });
        });
        $('select[name="district_id"]').on('change', function() {
            let id = $(this).val();
            if(id == -1){
                return;
            }
            $('select[name="institution_id"]').html('');
            $.ajax({
                url: '/getInstitutions/{id}',
                type: 'GET',
                data: { id: id },
                success: function(response)
                {
                    $('select[name="institution_id"]').removeAttr('readonly');
                    $('select[name="institution_id"]').append(response);
                }
            });
        });
    });
</script>
@endpush
