<?php
use App\Gender;
use App\User;
?>

 @extends('layouts.app')
 @section('content')

   @if ($errors->any())
       <div class="alert alert-danger">
         <ul>
           @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
           @endforeach
         </ul>
       </div>
     @endif

   <!-- Boostrap Boilerplate -->
    <div class="panel-body">
      <!-- New Division Form -->
      {!! Form::model($user,[
        'route'=>['user.store'],
        'class'=>'form-horizontal'
        ])!!}

        <!-- Name -->
        <div class="form-group row">
          {!! Form::label('user-name','Username',[
              'class' => 'control-label col-sm-3'
            ])!!}
            <div class="col-sm-9">
              {!! Form::text('name',null,[
                'id' => 'user-name',
                'class' => 'form-control',
                'maxlength' =>100,
                ])!!}
            </div>
        </div>

        <!-- Gender -->
        <div class="form-group row">
          {!! Form::label('user-gender','Gender',[
             'class' => 'control-label col-sm-3',
            ])!!}
            <div class="col-sm-9">
               {!! Form::select('gender', Gender::$genders,null,[
                  'class' => 'form-control',
                  'placeholder' => '- Select Gender -',
                 ])!!}
            </div>
         </div>

        <!-- Email -->
        <div class="form-group row">
          {!! Form::label('user-email','Email Address',[
              'class' => 'control-label col-sm-3'
            ])!!}
            <div class="col-sm-9">
              {!! Form::text('email',null,[
                 'id' => 'user-email',
                 'class' => 'form-control',
                ])!!}
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group row">
          <div class="col-sm-offset-3 col-sm-6">
            {!! Form::button('Save',[
               'type' => 'submit',
               'class' => 'btn btn-primary'
              ])!!}
          </div>
        </div>
      {!! Form::close() !!}
    </div>

 @endsection
