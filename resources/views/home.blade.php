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
        <script></script>
        <div class="col-md-8">
            <h2>New Feed</h2>
            <form action="/feeds">
                @csrf
                <label for = "url">Url</label>
                <input type="text" name="url" id="url">
                <button>Add feed</button>
            </form>
        </div>
        <div class="col-md-8">
            <h2>My feeds</h2>
            <ul>
            @foreach ( $feeds as $feed )
                <li><a href='/feeds/{{$feed->id}}'>{{$feed->GetTitle()}}</a> ({{$feed->url}})</li>
            @endforeach
            </ul>
        </div>
        <div class="col-md-8">
            <h2>All feed content</h2>
            <div class='feed list'>
            @foreach ( $feeds as $feed )
            <h3>{{ $feed->GetTitle() }}</h3>
            <?php $feedData = $feed->getItems(); ?>
                @foreach( $feedData as $dataItem )
                    <div class='feedItem'>
                        {!! $dataItem->description !!}
                    </div>
                @endforeach
            @endforeach
            </div>
        </div>


    </div>
</div>
@endsection
