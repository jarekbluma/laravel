@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        @include ('layouts.sidebar')
        
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ url('/posts') }}" method="POST">
                        {{ csrf_field() }}
                                            
                                <div class="form-group{{ $errors->has('post_content') ? ' has-error' : '' }}">
                                             <textarea name="post_content" cols="85" rows="5" placeholder="O czym myślisz?"></textarea><br>
                                              <button type="submit" class="btn btn-default pull-right">Dodaj post</button> 
                                                    @if($errors -> has('post_content'))
                                                                   
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors -> first('post_content') }}</strong>
                                                                    </span>
                                                    @endif                                
                                </div>

                    </form>                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
