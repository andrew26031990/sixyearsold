<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'Country:') !!}
    <select class="form-control" name="country_id" required>
        <option value="-1">Выберите страну</option>
        @foreach($countries as $country)
            <option value="{{$country->id}}" {{ isset($institutions->country_id) && $institutions->country_id == $country->id ? 'selected' : '' }}>{{$country->name}}</option>
        @endforeach
    </select>
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', 'Region:') !!}
    <select class="form-control" name="region_id" required disabled>
        <option value="-1">Выберите регион</option>
        {{--@foreach($regions as $region)
            <option value="{{$region->id}}" {{ isset($institutions->region_id) && $institutions->region_id == $region->id ? 'selected' : '' }}>{{$region->name}}</option>
        @endforeach--}}
    </select>
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'District:') !!}
    <select class="form-control" name="district_id" required disabled>
        <option value="-1">Выберите район</option>
        {{--@foreach($districts as $district)
            <option value="{{$district->id}}" {{ isset($institutions->district_id) && $institutions->district_id == $district->id ? 'selected' : '' }}>{{$district->name}}</option>
        @endforeach--}}
    </select>
</div>
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250, 'required' => 'required']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Tax identification number:') !!}
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('institutions.index') }}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $('select[name="country_id"]').on('change', function() {
                let id = $(this).val();
                if(id == -1){
                    return;
                }
                $('select[name="district_id"]').attr('disabled', 'disabled');
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
        });
    </script>
@endpush
