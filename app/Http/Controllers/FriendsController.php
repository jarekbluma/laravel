<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use Illuminate\Support\Facades\Auth;
use App\User;

class FriendsController extends Controller
{
    
    public function index($user_id)
    {
        $friends = User::findOrFail($user_id) -> friends();
        return view('friends.index', compact('friends'));
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add($friend_id)
    {
        if( ! friendship($friend_id) -> exists && ! friendship($friend_id) -> accepted)
        {
            Friend::create([
            'user_id' => Auth::id(),
            'friend_id' => $friend_id,
            ]);
        }
        else
        {
            $this -> accept($friend_id);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept($friend_id)
    {
        Friend::where([
            'user_id' => $friend_id,
            'friend_id' => Auth::id(),           
        ]) -> update([
             'accepted' => 1,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($friend_id)
    {
        
        Friend::where([
            'user_id' => Auth::id(),
            'friend_id' => $friend_id,
        ]) ->orWhere([
            'user_id' => $friend_id,
            'friend_id' => Auth::id(),
        ]) -> delete();

        return back();
    }
}
