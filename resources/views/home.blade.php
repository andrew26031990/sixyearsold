@extends('layouts.app')

@section('content')
    <div style="margin: 40px;">
        <div class="row">
            <div class="panel  panel-primary">
                <div class="panel-heading">Статистика</div>
                <div class="panel-body">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>{{__('message.region')}}</label>
                                <select class="form-control" name="region_id">
                                    <option>Выберите регион</option>
                                    @foreach($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>{{__('message.district')}}</label>
                                <select class="form-control"  name="district_id">
                                    <option>Выберите район</option>
                                </select>
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>{{__('message.institution')}}</label>
                                <select class="form-control"  name="institution_id">
                                    <option>Выберите организацию</option>
                                </select>
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                                <div class="info-box-content">
                                    <span>Количество детей до 6 лет</span>
                                    <span class="info-box-number pupilsCount">{{$data['pupils_count']}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                                <div class="info-box-content">
                                    <span>Количество педагогов</span>
                                    <span class="info-box-number teachersCount">{{$data['teachers_count']}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                                <div class="info-box-content">
                                    <span>Количество групп</span>
                                    <span class="info-box-number groupsCount">{{$data['groups_count']}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript">
            $('select[name="region_id"]').on('change', function() {
                let id = $(this).val();
                $('select[name="district_id"]').html('');
                $('select[name="institution_id"]').html('').append('<option>Выберите организацию</option>');
                getDistricts(id);
                getStatistics(id, 'region');
            });
            $('select[name="district_id"]').on('change', function() {
                let id = $(this).val();
                $('select[name="institution_id"]').html('');
                getInstitutions(id);
                getStatistics(id, 'district');
            });
            $('select[name="institution_id"]').on('change', function() {
                let id = $(this).val();
                getStatistics(id, 'institution');
            });
            function getDistricts(id){
                $.ajax({
                    url: '/getDistricts/{id}',
                    type: 'GET',
                    data: { id: id },
                    success: function(response)
                    {
                        $('select[name="district_id"]').append(response);
                    }
                });
            }
            function getInstitutions(id){
                $.ajax({
                    url: '/getInstitutions/{id}',
                    type: 'GET',
                    data: { id: id },
                    success: function(response)
                    {
                        $('select[name="institution_id"]').append(response);
                    }
                });
            }
            function getStatistics(id, type){
                $.ajax({
                    url: '/getStatistics/{id}/{type}',
                    type: 'GET',
                    data: { id: id, type: type },
                    success: function(response)
                    {
                        $('span.pupilsCount').html('').append(response.countPupils);
                        $('span.teachersCount').html('').append(response.countTeachers);
                        $('span.groupsCount').html('').append(response.countGroups);
                        console.log(response.countTeachers);
                    }
                });
            }
        </script>
    @endpush
@endsection
