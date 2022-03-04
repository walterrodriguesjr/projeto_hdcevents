@extends('layouts.main')

@section('title', 'Dasboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th class="col-md-2" scope="col">#</th>
                <th class="col-md-2">Nome</th>
                <th class="col-md-2">Participantes</th>
                <th class="col-md-6">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{count($event->users)}}</td>
                    <td>
                        <a href="/events/{{ $event->id }}" class="btn btn-info edit-btn"><ion-icon name="eye"></ion-icon> Visualizar</a> 
                        <a href="/events/edit/{{ $event->id }}" class="btn btn-warning edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                        <form action="/events/{{ $event->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Você ainda não tem eventos, <a href="/events/create">criar evento</a></p>
    @endif
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
@if (count($eventsasparticipant) > 0)
<table class="table">
    <thead>
        <tr>
            <th class="col-md-2" scope="col">#</th>
            <th class="col-md-2">Nome</th>
            <th class="col-md-2">Participantes</th>
            <th class="col-md-6">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($eventsasparticipant as $event)
            <tr>
                <td scropt="row">{{ $loop->index + 1 }}</td>
                <td>{{ $event->title }}</td>
                <td>{{count($event->users)}}</td>
                <td>
                    <a href="/events/{{ $event->id }}" class="btn btn-info edit-btn"><ion-icon name="eye"></ion-icon> Visualizar</a>
                    <form action="/events/leave/{{$event->id}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Sair do Evento</button>
                </form>
                </td>
            </tr>
        @endforeach    
    </tbody>
</table>
@else
<p>Você ainda não está participando de nehum evento, <a href="/">veja todos os eventos</a></p>
@endif
</div>

@endsection
