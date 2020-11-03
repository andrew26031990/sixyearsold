@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pupils
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pupils, ['route' => ['pupils.update', $pupils->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('pupils.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
