@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dane użytkownika
                    @if($user ->id === Auth::id())
                         <a href="{{ url('/users/' . $user -> id . '/edit') }}" class="pull-right"><small>Edytuj</small>
                    @endif
                </div>

                <div class="panel-body text-center">
                    <h2><a href="{{ url('/users/' . $user->id) }}">{{ $user->name }}</a></h2>
                    <p>
                    </p>
                    <p>{{ $user->email }}</p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae molestias repellat earum amet adipisci obcaecati! Consequatur, voluptatem, harum? Quis commodi unde assumenda neque doloribus cum suscipit, dolorum dolor itaque harum.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
