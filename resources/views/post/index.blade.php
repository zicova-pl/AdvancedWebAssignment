<?php

use App\Post;
?>
@extends('layouts.app')
@section('title','| All my blog')
@section('content')

    <!-- Boostrap Boilerplate -->
    <div class='row'>
      <div class="col-sm-8 col-sm-offset-3">
       <h1> All Posts</h1>
     </div>
     <div>
     </td><a href="{{route('post.create')}}"  class="btn btn-primary btn-lg pull-right btn-h1-spacing"
     style="margin-right:150px;">Create New Post</a></td>
   </div>
   </div>

    <div class="panel-body">
      @if(count($posts)>0)
        <table class="table table-striped task-table">
          <!-- Table Headings -->
          <thead>
            <tr>
              <th>No.</th>
              <th>Title</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>

          <!-- Table Body -->
          <tbody>
            @foreach ($posts as $i => $post)
              <tr>
                <td class="table-text">
                  <div >{{ $i+1 }}</div>
                </td>

                <td class="table-text">
                  <div>
                    {!! link_to_route(
                      'post.show',
                      $title = $post->title,
                      $parameters = [
                        'id' => $post ->id,
                      ]
                      )!!}
                  </div>
                </td>

                <td class="table-text">
                  <div>
                    {{ $post->created_at}}
                  </div>
                </td>

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
                </td>

                <td class="table-text">
                  <div>
                    {!! Form::open([
                      'route' => ['post.destroy',$post->id],
                       'method' => 'delete',
                       'class' => 'form-inline',
                    ]) !!}

                    <div class="col-sm-offset-3 col-sm-6">
                      {!! Form::button('Delete',[
                         'type' => 'delete',
                         'class' => 'btn btn-primary'
                        ])!!}
                    </div>
                  </div>
                  {!!Form::close()!!}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div align="center">{!!$posts->links()!!}</div>
      @else
        <div>
          No Records Found
        </div>
      @endif
    </div>
@endsection
