<?php
use App\Tag;
?>
@extends('layouts.app')
@section('title','| All Tags')
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
    <div class="col-sm-offset-3 col-sm-6">
      <div class="well">
        {!! Form::open([
          'route' => ['tag.store'],
           'method' => 'POST',
        ]) !!}

        <h2>New Tag</h2>
        {{Form::label('name','Name of Tag: ')}}
        {{Form::text('name',null, [
         'class'=>'form-control'
        ])}}

        <div style="margin-top:10px;">
        {{Form::submit('Create a New Tag',[
          'class'=> 'btn btn-primary btn-block btn-h1-spacing'
        ])}}
        </div>
        {!!Form::close()!!}

    </div>
      </div>

    <div class='row'>
      <div class="col-sm-8 col-sm-offset-3">
       <h1>Tags</h1>

        <table class="table">
          <!-- Table Headings -->
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>

          <!-- Table Body -->
          <tbody>
            @foreach ($tags as $i => $tag)
              <tr>
                <td class="table-text">
                  <div >{{ $i+1 }}</div>
                </td>

                <td class="table-text">
                  <div>
                  <a href="{{route('tag.show',$tag->id)}}">{{ $tag->name}}</a>
                  </div>
                </td>

                <td class="table-text">
                  <div>
                    {{ $tag->created_at}}
                  </div>
                </td>

                <td class="table-text">
                  <div>
                    {!! Form::open([
                      'route' => ['tag.destroy',$tag->id],
                       'method' => 'delete',
                       'class' => 'form-inline',
                    ]) !!}

                      {!! Form::button('Delete',[
                         'type' => 'delete',
                         'class' => 'btn btn-primary'
                        ])!!}
                    </div>
                  {!!Form::close()!!}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>


      </div>
    </div>
@endsection
