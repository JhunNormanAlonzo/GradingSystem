<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'user_id' => 'required',
           'subject_id' => 'required',
           'grade' => 'required'
        ]);

        $exists = Grade::where('user_id', $request->user_id)
            ->where('subject_id', $request->subject_id)
            ->exists();

        if ($exists){
            $to_update = Grade::where('user_id', $request->user_id)
                ->where('subject_id', $request->subject_id);
            $to_update->update([
                'grade' => $request->grade
            ]);
            return redirect()->route('teacher.index')->with('message', 'Updated Successfully!');
        }else{
            Grade::create([
                'user_id' => $request->user_id,
                'subject_id' => $request->subject_id,
                'grade' => $request->grade
            ]);
            return redirect()->route('teacher.index')->with('message', 'Created Successfully!');
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        $this->validate($request, [
            'grade' => 'required'
        ]);

        $grade->update([
            'grade' => $request->grade
        ]);

        return redirect()->back()->with('message', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
