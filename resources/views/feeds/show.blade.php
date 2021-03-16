@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        
        <div class="col-md-8 feed list">
            <h2>{!! $feed->url !!}</h2>
            @foreach ( $feed->getItems() as $item )
                <div class='feedItem'>
                    {!! htmlspecialchars_decode($item->description); !!}
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
