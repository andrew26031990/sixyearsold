@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{__('message.education_degrees')}}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('education_degrees.show_fields')
                    <a href="{{ route('educationDegrees.index') }}" class="btn btn-default">{{__('message.back')}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
