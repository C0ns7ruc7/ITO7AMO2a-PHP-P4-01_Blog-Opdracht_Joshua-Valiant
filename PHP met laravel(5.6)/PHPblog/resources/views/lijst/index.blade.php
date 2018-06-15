@extends ('Partials.layout')

@section('content')
    <div class="boxicat col-12">
        <div class="body">
            <div class="create-task">
                <form method="post" action="/lijst" class="create-task__form">

                    {{csrf_field()}}

                    <label class="form-label titel-label">
                        Titel:
                    </label><br/>

                    <input class="form-input titel-input"
                           type="text"
                           name="title"
                           placeholder="Titel"
                           value="@if (isset($edit)){{ $edit->title }}@endif">
                    <br/><br/>

                    <label class="form-label beschrijving-label">
                        Omschrijving:
                    </label><br/>

                    <textarea class="form-input omschrijving-input"
                              name="body"
                              placeholder="Omschrijving">@if (isset($edit)){{ $edit->body }}@endif</textarea>
                    <br/><br/>

                    <label class="form-label datum-label">
                        Datum:
                    </label><br/>

                    <input class="form-input datum-input"
                           type="date"
                           name="time"
                           placeholder="Datum"
                           value="@if (isset($edit)){{ $edit->time }}@endif">
                    <br/></br>

                    <input class="form-button"
                           type="submit"
                           value="Verzenden"/>
                </form>
            </div>
        </div>
    </div>
    @if(isset($dbQuerry))
        @foreach ($dbQuerry as $object)
            <div class="boxicat col-10">

                <h2>{{ $object->title }}</h2>
                {!! $object->body !!}
                <p>geplend voor: {{$object->time}}</p>

            </div>
            <div class="boxicat col-2">
                <a href="/lijst/{{ $object->id }}"><button class="btn btn-success">show</button></a>
                <form action="/lijst/{{ $object->id }}/edit" method="GET">
                    {{method_field('EDIT')}}
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-warning" value="Edit"/>
                </form>
                <form action="/lijst/{{$object->id}}" method="POST">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </div>
        @endforeach
    @endif
@endsection

@section('css')
    <style>
        textarea {
            height: 100px;
        }

        .form-input {
            width: 100%;
        }

        p {
            margin: 0;
        }

        .create-task {

        }

        .tasks {
            margin-top: 30px;
        }

        .task {
            margin-top: 15px;
        }
    </style>
@endsection

