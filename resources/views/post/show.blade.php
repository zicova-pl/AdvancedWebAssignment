<?php
use App\Category;
use App\Tag;
use App\Post;
?>
@extends('layouts.app')
@section('title','| View Post')
@section('content')

 <!-- Bootstrap Boilerplate... -->
 <div class='row'>
   <div class="col-sm-8 col-sm-offset-3">
    <h1>{{$post->title}}</h1>
  </div>
</div>

 <div class="panel-body">
 <table class="table table-striped task-table">
 <!-- Table Headings -->
 <thead>
   <tr>
     <th>Created at: {{$post->created_at}}</th>
    <th>Latest Update: {{$post->updated_at}}</th>
   </tr>
 </thead>

 <!-- Table Body -->
   <tbody>
     <tr>
     <td>Category: </td>
     <td>{{ Category::$categories[$post->category] }}</td>
   </tr>

   <tr>
   <td>Content:</td>
     <td>{{ $post->content }}</td>
   </tr>

   <tr>
     <td>Image:</td>
       <td>
         <img src="http://localhost:8088/storage/posts/{{$post->image}}"
         width="240" alt="{{ $post->id }}">
      </td>
     </tr>

     <tr>
       <td>Tag</td>
       <td>{{ Tag::find($post->tag_id)->name }}</td>
     </tr>

   </tbody>
   <td class="table-text">
     <div>
       {!! link_to_route(
         'post.edit',
         $title = 'Edit',
         $parameters = [
           'id' => $post ->id,
         ]
         )!!}
     </div>

     <div class="col-sm-offset-3 col-sm-6">
      <a href="{{route('post.index',$post->id)}}" class="btn btn-lg btn-primary pull-right" style="margin-top:20px;">Done</a>
     </div>
   </td>
 </table>
 </div>

 @endsection
