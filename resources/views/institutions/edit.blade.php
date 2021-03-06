@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{__('message.institutions')}}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($institutions, ['route' => ['institutions.update', $institutions->id], 'method' => 'patch']) !!}

                        @include('institutions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
