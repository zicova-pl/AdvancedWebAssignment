<?php
use App\Category;
use App\Post;
use App\Tag;
?>

 @extends('layouts.app')
 @section('title','| Create New Post')
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
   <div class='row'>
     <div class="col-sm-8 col-sm-offset-3">
      <h1> Create a New Post</h1>
    </div>
  </div>

    <div class="panel-body">
      <!-- New Division Form -->
      {!! Form::model($post,[
        'route'=>['post.store'],
        'class'=>'form-horizontal',
        'enctype' => 'multipart/form-data',
        ])!!}

        <!-- Name -->
        <div class="form-group row">
          {!! Form::label('post-title','Post Title',[
              'class' => 'control-label col-sm-3'
            ])!!}
            <div class="col-sm-9">
              {!! Form::text('title',null,[
                'id' => 'post-title',
                'class' => 'form-control',
                'maxlength' =>50,
                ])!!}
            </div>
        </div>

        <!--Category-->
        <div class="form-group row">
          {!! Form::label('post-category','Catogory',[
             'class' => 'control-label col-sm-3',
            ])!!}
            <div class="col-sm-9">
               {!! Form::select('category', Category::$categories,null,[
                  'class' => 'form-control',
                  'placeholder' => '- Select Category -',
                 ])!!}
            </div>
        </div>

        <!-- Content -->
        <div class="form-group row">
          {!! Form::label('post-content','Content',[
              'class' => 'control-label col-sm-3'
            ])!!}
            <div class="col-sm-9">
              {!! Form::textarea('content',null,[
                 'id' => 'post-content',
                 'class' => 'form-control',
                ])!!}
            </div>
        </div>

        <!--Image-->
        <div class="form-group row">
           {!! Form::label('post-photo', 'Select File', [
           'class' => 'control-label col-sm-3',
           ]) !!}
           <div class="col-sm-9">
           {!! Form::file('image', [
           'id' => 'post-photo-file',
           'class' => 'form-control',
           ]) !!}
           </div>
        </div>

        <!--Tag-->
        <div class="form-group row">
          {!! Form::label('post-tag','Tag',[
             'class' => 'control-label col-sm-3',
            ])!!}
            <div class="col-sm-9">
               {!! Form::select('tag_id',Tag::pluck('name', 'id'),null,[
                  'class' => 'form-control',
                  'placeholder' => '- Select Tag -',
                 ])!!}
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group row">
          <div class="col-sm-offset-3 col-sm-6">
            {!! Form::button('Create Post',[
               'type' => 'submit',
               'class' => 'btn btn-primary'
              ])!!}
          </div>
        </div>
      {!! Form::close() !!}
    </div>

 @endsection
