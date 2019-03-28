<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Form</title>
    </head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{asset('css/costume.css')}}">
    <body>




            <ul class="nav justify-content-end">
                @if (Auth::user())
                    <li class="nav-item">
                      <a class="nav-link " href="{{'/home'}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/create">Buat Pertanyaan</a>
                    </li>
                    
                @else
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('register')}}">Register</a>
                    </li>
                @endif
                </ul>

        <form class="form-inline" method="get" action="/">
                <div class="form-group mx-sm-3">
                <label class="sr-only">Cari</label>
                <input type="text" class="form-control" name="cari"  placeholder="Cari">
            </div>
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            <div class="container">
            <div id="jarak"></div>

            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{session('msg')}}
                </div>
            @endif

            @if (session('msg-hapus'))
                <div class="alert alert-danger" role="alert">
                    {{session('msg-hapus')}}
                </div>
            @endif


            <h1 class="text-center">Pertanyaan Yang ada</h1>
            
                <div class="row">
                    @foreach ($forms as $form)
                    {{-- {{dd(Auth::user())}} --}}
                    <div class="col-md-12 jarak-card" >
                        <div class="card">
                        
                        <div class="card-body">
                            <h4 class="card-title">{{$form->title}}</h4>
                            {{-- <p class="card-text">{{$form->subject}}</p> --}}
                            <span> Dibuat Oleh : {{$form->user->name}} </span><br>
                            <a href="/{{$form->slug}}" class="btn btn-primary">Baca</a>

                            @if (Auth::user())
                            @if ($form->user->id == Auth::user()->id)    
                                <a href="/{{$form->slug}}/edit" class="btn btn-warning">Edit</a>
                                <br>
                                <form method="POST" action="/{{$form->id}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            @endif
                            @endif
                            {{-- <a href="/hapus/id" class="btn btn-danger">Hapus</a> --}}
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </body>
</html>
