<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Exam;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of users
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
     * Display user profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $progress = SkillScore::where('id_user',Auth::id())->get();

        $exams = Auth::user()->exams;

        return view('homepage.profile', compact('exams'));
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
     * Update the specified user in storage.
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
     * Remove the specified user from storage.
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
     * Save user's score after he's finished the exam
     *
     * @param Request $request
     * @param array $exam_id
     */
    public function saveScore(Request $request, $exam_id)
    {
        $exam = Exam::find($exam_id);

        list($listening_correct_answers, $reading_correct_answers, $final_score) = $exam->compareAnswer($request);

        Auth::user()->exams()->attach($exam_id, [
            'listening_correct_answers' => $listening_correct_answers,
            'reading_correct_answers' => $reading_correct_answers,
            'final_score' => $final_score
        ]);

        return redirect('profile')->with('status', __('message.finish_test'));
    }

}