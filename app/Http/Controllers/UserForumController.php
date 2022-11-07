<?php

namespace App\Http\Controllers;

use App\Models\UserForum;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;

class UserForumController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        try {
            $user = new UserForum($request->all());
            $user->save();
            session(['user' => $user]);
            return redirect('post');
        } catch(\Exception $e) {
            return back()->withInput($request->all())->withErrors(
                ['default' => 'Something went wrong']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserForum  $userForum
     * @return \Illuminate\Http\Response
     */
    public function show(UserForum $userForum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserForum  $userForum
     * @return \Illuminate\Http\Response
     */
    public function edit(UserForum $userForum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserForum  $userForum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserForum $userForum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserForum  $userForum
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserForum $userForum)
    {
        //
    }
}
