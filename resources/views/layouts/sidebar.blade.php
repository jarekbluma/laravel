<div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dane użytkownika
                    @if($user ->id === Auth::id())
                         <a href="{{ url('/users/' . $user -> id . '/edit') }}" class="pull-right"><small>Edytuj</small>
                    @endif
                </div>

                <div class="panel-body text-center">
                    <img src="{{ asset('storage/users/' . $user -> id . '/avatar/' . $user -> avatar )}}" class="img-responsive"><br>
                    <h2><a href="{{ url('/users/' . $user->id) }}">{{ $user->name }}</a></h2>
                    <p>
                    </p>
                    <p>{{ $user->email }}</p>


                    @if (Auth::check() && $user ->id !== Auth::id())

                        @if ( ! friendship($user -> id) -> exists && ! has_invitation($user -> id))
                            <form method="POST" action="{{ url('/friends/' . $user -> id )}}">
                                {{ csrf_field() }}

                                <button class="btn btn-success">Zaproś do znajomych</button>
                            </form> 

                        @elseif (has_invitation($user -> id))
                            
                             <form method="POST" action="{{ url('/friends/' . $user -> id )}}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH')}}    
                                <button class="btn btn-primary">Zaakceptuj zaproszenie</button>
                            </form>     

                        @elseif (friendship($user -> id) -> exists && ! friendship($user -> id) -> accepted)

                            <button class="btn btn-success disabled">Zaproszenie wysłane</button> 
                                 

                        @elseif (friendship($user -> id) -> exists && friendship($user -> id) -> accepted)

                            <form method="POST" action="{{ url('/friends/' . $user -> id )}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}    
                                <button class="btn btn-danger">Usuń znajomość</button>
                            </form>     
                         @endif   
                    @endif
                </div>
            </div>
</div> 