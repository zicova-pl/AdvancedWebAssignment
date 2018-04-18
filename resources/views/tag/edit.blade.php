<?php
use App\Tag;
?>
@extends('layouts.app')
@section('title','| Edit Tags')
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

    {{Form::model($tag,['route' => ['tag.update',
      $tag->id],
      'method'=> "PUT"])}}
      {{Form::label('name',"Tag Name : ")}}
      {{Form::text('name',null, ['class' => 'form-control'])}}

      {{Form::submit('Save',['class' => 'btn btn-success',
      'style'=>'margin-top:20px;'])}}
    {{Form::close()}}
@endsection
