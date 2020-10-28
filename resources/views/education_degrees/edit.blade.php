@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Education Degrees
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($educationDegrees, ['route' => ['educationDegrees.update', $educationDegrees->id], 'method' => 'patch']) !!}

                        @include('education_degrees.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection