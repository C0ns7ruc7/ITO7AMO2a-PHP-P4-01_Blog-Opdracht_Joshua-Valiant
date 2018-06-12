@extends ('Partials.layout')

@section('content')
    <div class="boxicat col-12">
        <div class="body">
            <div class="create-task">
                <form method="post" action="lijst" class="create-task__form">
                    {{csrf_field()}}
                    <label class="form-label titel-label">Titel:</label><br/>
                    <input class="form-input titel-input" type="text" name="title" placeholder="Titel"><br/><br/>
                    <label class="form-label beschrijving-label">Omschrijving:</label><br/>
                    <textarea class="form-input omschrijving-input" name="body" placeholder="Omschrijving"></textarea><br/><br/>
                    <label class="form-label datum-label">Datum:</label><br/>
                    <input class="form-input datum-input" type="date" name="time" placeholder="Datum"><br/></br>
                    <input class="form-button" type="submit" value="Verzenden"/>
                </form>
            </div>
        </div>
    </div>
    @foreach ($dbQuerry as $object)
        <div class="boxicat col-10">

            <h2>{{ $object->title }}</h2>
            {!! $object->body !!}
            <p>{{$object->created_at}}</p>

        </div>
        <div class="boxicat col-2">
            <form action="lijst/{{ $object->id }}" method="POST">
                {{method_field('EDIT')}}
                {{csrf_field()}}
                <input type="submit" class="btn btn-warning" value="Edit"/>
            </form>
            <form action="lijst/{{$object->id}}" method="POST">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <input type="submit" class="btn btn-danger" value="Delete"/>
            </form>
        </div>
    @endforeach
@endsection

@section('css')
    <style>
        textarea {
            height: 100px
        }

        .form-input {
            width: 250px;
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
    <?php Header( "lijst" ) ?>
@endsection