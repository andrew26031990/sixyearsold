@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{__('message.pupils')}}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('pupils.show_fields')
                    <a href="{{ route('pupils.index') }}" class="btn btn-default">{{__('message.back')}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
