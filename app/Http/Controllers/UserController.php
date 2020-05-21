<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        return view(
            'users.list',
            ['users' => User::select('id', 'email', 'name', 'role')->paginate(10)]
        );
    }

    /**
     * Show the form for editing user's role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRole($id)
    {
        $this->authorize('updateRole', User::class);

        return view('users.edit')
               ->with('user', User::findOrFail($id));
    }

    /**
     * Update the user's role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRole(Request $request, $id)
    {
        $this->authorize('updateRole', User::class);

        User::where('id', $id)->update(['role' => $request->role]);

        return redirect('user')->with('status', __('message.edited'));
    }

    /**
     * Show the form for editing user.
     *
     * TODO : Create view for user to update their personal information
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        $this->authorize('update', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * TODO : Update user's personal information
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $this->authorize('update', $user);
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

        $this->authorize('delete', $user);

        $user->delete();

        return redirect('user')->with('status', __('message.edited'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $progress = SkillScore::where('id_user',Auth::id())->get();
    	// $score = Score::where('user_id', Auth::id())->get();
        return view('homepage.profile');
    }
}