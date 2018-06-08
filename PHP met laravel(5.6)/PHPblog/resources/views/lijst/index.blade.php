@extends ('Partials.layout')

@section('content')
    <div class="boxicat col-12">
        <div class="body">
            <div class="create-task">
                <form method="post" class="create-task__form">
                    <label class="form-label titel-label">Titel:</label><br/>
                    <input class="form-input titel-input" type="text" name="titel" placeholder="Titel"><br/><br/>
                    <label class="form-label beschrijving-label">Omschrijving:</label><br/>
                    <textarea class="form-input omschrijving-input" name="body" placeholder="Omschrijving"></textarea><br/><br/>
                    <label class="form-label datum-label">Datum:</label><br/>
                    <input class="form-input datum-input" type="date" name="datum" placeholder="Datum"><br/></br>
                    <input class="form-button" name="add" type="submit" value="Verzenden"/>
                </form>
            </div>
        </div>
    </div>
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