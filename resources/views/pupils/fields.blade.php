{{ csrf_field() }}
<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', __('message.country')) !!}
    <select class="form-control" name="country_id" required>
        <option value="-1">Выберите страну</option>
        @foreach($countries as $country)
            <option value="{{$country->id}}" {{ isset($groups->country_id) && $groups->country_id == $country->id ? 'selected' : '' }}>{{$country->name}}</option>
        @endforeach
    </select>
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', __('message.region')) !!}
    <select class="form-control" name="region_id" required disabled>
        <option value="-1">Выберите регион</option>
        {{--@foreach($regions as $region)
            <option value="{{$region->id}}" {{ isset($groups->region_id) && $groups->region_id == $region->id ? 'selected' : '' }}>{{$region->name}}</option>
        @endforeach--}}
    </select>
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', __('message.district')) !!}
    <select class="form-control" name="district_id" required disabled>
        <option value="-1">Выберите район</option>
        {{--@foreach($districts as $district)
            <option value="{{$district->id}}" {{ isset($groups->district_id) && $groups->district_id == $district->id ? 'selected' : '' }}>{{$district->name}}</option>
        @endforeach--}}
    </select>
</div>

<!-- Institution Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institution_id', __('message.institution')) !!}
    <select class="form-control" name="institution_id" required disabled>
        <option value="-1">Выберите учреждение</option>
        {{--@foreach($institutions as $institution)
            <option value="{{$institution->id}}" {{ isset($groups->institution_id) && $groups->institution_id == $institution->id ? 'selected' : '' }}>{{$institution->name}}</option>
        @endforeach--}}
    </select>
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', __('message.address')) !!}
    {!! Form::textarea('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<!-- Group Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('group_id', __('message.group')) !!}
    <select class="form-control" name="group_id" required>
        <option value="-1">Выберите группу</option>
        {{--@foreach($groups as $group)
            <option value="{{$group->id}}" {{ isset($pupils->group_id) && $pupils->group_id == $group->id ? 'selected' : '' }}>{{$group->name}}</option>
        @endforeach--}}
    </select>
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', __('message.full_name')) !!}
    {!! Form::text('full_name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'required' => 'required']) !!}
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthday', __('message.birthday')) !!}
    {!! Form::text('birthday', null, ['class' => 'form-control','id'=>'birthday', 'required' => 'required']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#birthday').datetimepicker({
            format: 'YYYY-MM-DD',
            minDate: new Date(new Date().getFullYear() - 5, 1-1, 1),
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Birth Certificate Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_certificate_number', __('message.birth_certificate_number')) !!}
    {!! Form::text('birth_certificate_number', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>

<!-- Birth Certificate Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_certificate_date', __('message.birth_certificate_date')) !!}
    {!! Form::text('birth_certificate_date', null, ['class' => 'form-control','id'=>'birth_certificate_date', 'required' => 'required']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#birth_certificate_date').datetimepicker({
            format: 'YYYY-MM-DD',
            minDate: new Date(new Date().getFullYear() - 5, 1-1, 1),
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Birth Certificate File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_certificate_file', __('message.birth_certificate_file')) !!}
    {!! Form::file('birth_certificate_file', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>

<!-- Has Certificate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_certificate', __('message.has_certificate')) !!}
    <label class="checkbox-inline">
        {!! Form::hidden('has_certificate', 0) !!}
        {!! Form::checkbox('has_certificate', '1', null, array('style'=>'margin:-6px 0 0')) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pupils.index') }}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $('select[name="region_id"]').on('change', function() {
                $('select[name="institution_id"]').attr('disabled', 'disabled');
                $('select[name="institution_id"]').html('<option value="-1">Выберите учреждение</option>');
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
                        $('select[name="region_id"]').removeAttr('disabled');
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
                        $('select[name="district_id"]').removeAttr('disabled');
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
                        $('select[name="institution_id"]').removeAttr('disabled');
                        $('select[name="institution_id"]').append(response);
                    }
                });
            });
            $('select[name="institution_id"]').on('change', function() {
                let id = $(this).val();
                if(id == -1){
                    return;
                }
                $('select[name="group_id"]').html('');
                $.ajax({
                    url: '/getGroups/{id}',
                    type: 'GET',
                    data: { id: id },
                    success: function(response)
                    {
                        $('select[name="group_id"]').removeAttr('disabled');
                        $('select[name="group_id"]').append(response);
                    }
                });
            });
        });
    </script>
@endpush
