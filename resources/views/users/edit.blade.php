@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Edycja użytkownika</div>
				<div class="panel-body">
                    <form action=" {{ url('/users/' . $user -> id) }}" method="POST">
                    	{{ csrf_field() }}
                    	{{ method_field('PATCH') }}
                    	
                    	<div class="row">
                    		<div class="col-sm-10 col-sm-offset-1">
                    			<div class="form-group">
                    				<label for="">Imię i nazwisko</label>
                    				<input type="text" name="name" class="form-control" value=" {{ $user -> name }}">
                    			</div>
                    		</div>
                    		
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-10 col-sm-offset-1">
                    			<div class="form-group">
                    				<label for="">Email</label>
                    				<input type="text" name="email" class="form-control" value=" {{ $user -> email }}">
                    			</div>
                    		</div>	
                    	</div>
        				
        				<div class="row">
                    		<div class="col-sm-10 col-sm-offset-1">
                    			
                    			<button type="submit" class="btn btn-primary btn-sm pull-right">Zapisz zmiany</button>

                    		</div>	
                    	</div>
                    	

                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
