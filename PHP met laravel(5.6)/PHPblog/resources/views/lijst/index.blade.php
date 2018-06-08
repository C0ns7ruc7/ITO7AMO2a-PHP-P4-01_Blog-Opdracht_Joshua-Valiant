@extends ('Partials.layout')

@section('content')
    @foreach ($dbQuerry as $object)
        <div class="boxicat col-10">

                <h2>{{ $object->title }}</h2>
                {!! $object->body !!}
                <p>gemaakt op: {{$object->created_at}} geupdated op: {{$object->updated_at}}</p>

        </div>
        <div class="boxicat col-2">
            bewerken<br>
            verwijderen
        </div>
    @endforeach
@endsection