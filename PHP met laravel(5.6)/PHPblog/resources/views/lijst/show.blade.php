@extends ('Partials.layout')

@section('content')
    @if(isset($show))
        <div id="single" class="boxicat col-12">
            <h2>{{ $show->title }}</h2>
            <hr>
            {!! $show->body !!}
            <p class="date">geplaned voor: {{$show->time}}</p>
        </div>
    @endif
@endsection

@section('css')
    <style>
        #single {
            min-height: 80vh;
            padding-bottom: 5%;
        }
        .date {
            bottom: 0;
            right: 0;
            position: absolute;
        }
    </style>
@endsection