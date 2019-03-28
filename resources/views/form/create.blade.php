@extends('layouts.app')

@section('content')

    <h1 class="text-center">Buat Pertanyaan</h1>
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
        <form method="POST" action="/">
            <div class="form-group">
              <label >Judul</label>
              <input type="text" class="form-control" name="title" name="title" value="{{old('title')}}">
              {{-- <small  class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label >Subject</label>
                <textarea class="form-control" name="subject" rows="3">{{old('subject')}}</textarea>
               
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
    </div>

@endsection