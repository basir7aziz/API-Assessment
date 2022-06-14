<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;

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

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {

        // Retrieve the validated input data...
        $validated = $request->validated();
    
        // Retrieve a portion of the validated input data...
        // $validated = $request->safe()->only(['name','last_name' , 'email']);
        // $validated = $request->safe()->except(['name','last_name' , 'email']);
        
        //please do check again this part

        // $request->validate([
        //     'first_name'=>'required',
        //     'last_name'=>'required',
        //     'email'=>'required'
        // ]);

        $user = new User(); 
        $user->first_name = $request->get('first_name');
        $user->last_name= $request->get('last_name');
        $user->email= $request->get('email');
        $user->job_title = $request->get('job_title');
        $user->city = $request->get('city');
        $user->country = $request->get('country');
        $user->save();
        return redirect('/users')->with('success', 'User saved!');
    }

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
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required'
        ]);

        $user = User::find($id);
        $user->first_name =  $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->job_title = $request->get('job_title');
        $user->city = $request->get('city');
        $user->country = $request->get('country');
        $user->save();

        return redirect('/users')->with('success', 'User updated!');
    }

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

        return redirect('/users')->with('success', 'User deleted!');
    }
}
