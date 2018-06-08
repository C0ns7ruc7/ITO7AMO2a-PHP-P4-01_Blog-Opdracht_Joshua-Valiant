@extends ('Partials.layout')

@section('content')
    @foreach ($dbQuerry as $object)
        <div class="col-10-xs boxicat">

                <h2>{{ $object->title }}</h2>
                {!! $object->body !!}
                <p>gemaakt op: {{$object->created_at}} geupdated op: {{$object->updated_at}}</p>

        </div>
        <div class="col-2-xs boxicat">
            stuff
        </div>
    @endforeach
@endsection