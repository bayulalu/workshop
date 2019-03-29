@extends('layouts.app')

@section('content')
    <h1 class="text-center">Edit Pertanyaan</h1>
    
    <div class="container">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @foreach ($form as $fm)
        <form method="POST" action="/{{$fm->id}}">
            <div class="form-group">
              <label >Judul</label>
              <input type="text" class="form-control" 
              name="title" name="title" placeholder="Judul" 
              value="{{(old('title')) ? old('title') : $fm->title}}">
              {{-- <small  class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label >Subject</label>
                <textarea class="form-control" name="subject" rows="3">
                    {{(old('subject')) ? old('subject') : $fm->subject}}
                </textarea>
               
            </div>
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <button type="submit" class="btn btn-primary">Edit</button>
          </form>
        @endforeach
    </div>

@endsection