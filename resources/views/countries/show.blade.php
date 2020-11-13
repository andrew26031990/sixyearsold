@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{__('message.countries')}}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('countries.show_fields')
                    <a href="{{ route('countries.index') }}" class="btn btn-default">{{__('message.back')}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
