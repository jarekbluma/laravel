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


                    @if(Auth::check() && $user ->id !== Auth::id())
                        <form method="POST" action="{{ url('/friends/' . $user -> id )}}">
                        {{ csrf_field() }}

                            <button class="btn btn-success">Zaproś do znajomych</button>
                        
                        </form>   
                    @endif
                </div>
            </div>
</div> 