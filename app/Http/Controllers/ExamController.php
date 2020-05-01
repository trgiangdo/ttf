<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'exam.list',
            ['exams' => Exam::paginate(10)]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Exam::class);

        return view(
            'exam.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Exam::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::with(['listenings', 'readings'])->find($id);  // Eager Loading
        // Eager Loading nếu áp dụng lên $exam->listening sẽ áp dụng lên toàn bộ instance của Listenings chứ không phải là từng instance theo từng Part nên không thể áp dụng trong trường hợp này

        // Do ->where() trả về Collection nên nếu không sử dụng ->first() thì sẽ phải dùng 1 vòng lặp bên ngoài nữa hoặc dùng $listening_part1[0]
        $listenings_part1 = $exam->listenings->where('Part', 1)->first();
        $listenings_part2 = $exam->listenings->where('Part', 2)->first();
        $listenings_part3 = $exam->listenings->where('Part', 3)->first();
        $listenings_part4 = $exam->listenings->where('Part', 4)->first();

        $readings_part5 = $exam->readings->where('Part', 5);
        $readings_part6 = $exam->readings->where('Part', 6);
        $readings_part7 = $exam->readings->where('Part', 7);

        return view(
            'exam.test', compact(
                'listenings_part1', 'listenings_part2', 'listenings_part3', 'listenings_part4',
                'readings_part5', 'readings_part6', 'readings_part7'
            )
        );
    }

    /**ơ
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);

        $this->authorize('update', $exam);

        return view(
            'exam.edit',
            compact($exam)
        );
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
        $exam = Exam::findOrFail($id);

        $this->authorize('update', $exam);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Exam::findOrFail($id));
        Exam::where('id', $id)->delete();
        return redirect()->back()->with('status', __('message.edited'));
    }
}
