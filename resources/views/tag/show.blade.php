<?php
use App\Tag;
?>
@extends('layouts.app')
@section('content')

  <div class="row">
    <div class="col-md-8">
      <h1>{{$tag->name}} Tag <small>{{$tag->posts()->count()}} Posts</small></h1>
    </div>

    <div class="col-md-4">
        <a href="{{route('tag.edit',$tag->id)}}" class="btn btn-lg btn-primary pull-right" style="margin-top:20px;">Edit</a>
    </div>

    <div class="row">
      <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Tags</th>
          </tr>
        </thead>

          <tbody>
            @foreach ($tag->posts as $post)
            <tr>
              <th>{{$post->id}}</th>
              <td>{{$post->title}}</td>
              <td>
                  <span class="label label-default">{{$tag->name}}</span>
              </td><a href="{{route('post.show', $post->id)}}" class="btn btn-default
              btn-xs">View</a></td>
              <td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
