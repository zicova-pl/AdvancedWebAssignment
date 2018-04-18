<?php
use App\Tag;
?>
@extends('layouts.app')
@section('title','| Edit Tags')
@section('content')

    {{Form::model($tag,['route' => ['tag.update',
      $tag->id],
      'method'=> "PUT"])}}
      {{Form::label('name',"Tag Name : ")}}
      {{Form::text('name',null, ['class' => 'form-control'])}}

      {{Form::submit('Save',['class' => 'btn btn-success',
      'style'=>'margin-top:20px;'])}}
    {{Form::close()}}
@endsection
