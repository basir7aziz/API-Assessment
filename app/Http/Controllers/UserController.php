<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // return new UserResource($users);
        return UserResource::collection($users);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserStoreRequest $request)
    {   // need to check with hazim
        
        
        $user = new User(); 
        $user->first_name = $request->get('first_name');
        $user->last_name= $request->get('last_name');
        $user->email= $request->get('email');
        $user->job_title = $request->get('job_title');
        $user->city = $request->get('city');
        $user->country = $request->get('country');
        $user->save();
        return new UserResource($user);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserStoreRequest $request, $id)
    {   
        $user = User::find($id);
        $user->first_name =  $request->get('first_name');
        $user->last_name = $request->get('last_name');  
        $user->email = $request->get('email');
        $user->job_title = $request->get('job_title');
        $user->city = $request->get('city');
        $user->country = $request->get('country');
        $user->save(); 
        return  new UserResource($user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);  
        $user->delete();
        return new UserResource($user);
    }
}
