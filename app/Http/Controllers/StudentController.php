<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('backend.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'fullname' => 'required|min:4|max:25',
            'gender' => 'required',
            'email' => 'email|required|unique:students,email',
            'phone' => 'min:11|max:14',
            'photo' => 'required|image|mimes:jpg,png,svg,jpeg,webp,gif|max:3072'
        ]);

        $rand_num = rand(1, 50);
        $photo_Extension = $request->photo->extension();
        $photoName = $rand_num . time() . "." . $photo_Extension;

        $request->photo->move(public_path('images'),$photoName);
        // dd($photoName);


        // dd($request);
        // echo "hello world!";
        $student = new Student;
        $student->name = $request->fullname;
        $student->gender = $request->gender;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->district = $request->district;
        $subjects = $request->subjects;

        $subjects = implode(",", $subjects);


        $student->subjects = $subjects;
        $student->photo=$photoName;

        // dd($subject);

        $student->save();
        return redirect('/students')->with('succes', 'Successfully Student Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        return view('backend.students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        return view('backend.students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fullname' => 'required|min:4|max:25',
            'gender' => 'required',
            // 'email' => 'email|required|unique:students,email',
            'email' => 'email|required|unique:students,email,' . $id,
            'phone' => 'min:11||max:14'

        ]);


        // dd($request);
        // echo "hello world!";
        $student = Student::find($id);
        $student->name = $request->fullname;
        $student->gender = $request->gender;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->district = $request->district;
        $subjects = $request->subjects;

        $subjects = implode(",", $subjects);


        $student->subjects = $subjects;

        // dd($subject);

        $student->save();
        return redirect('/students')->with('succes', 'Successfully Student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student Deleted!');
    }
}
