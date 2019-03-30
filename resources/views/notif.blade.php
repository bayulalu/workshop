@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">HALAMAN NOTIF</div>

                <ul class="list-group">
                    @foreach ($notifs as $notif)
                    <li class="list-group">
                        <a href="/{{$notif->form->slug}}">{{$notif->subject}}</a>
                    </li>
                    @endforeach
                </ul>

                @php
                    $notif_model::where('user_id', $user->id)->where('seen', 0)->update(['seen' => 1]);
                @endphp


            </div>
            </div>
        </div>
    </div>
</div>
@endsection