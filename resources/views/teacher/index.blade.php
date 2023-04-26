@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(Session::has('message'))
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{Session('message')}}
                    </div>
                </div>
            @endif

            <div class="col-4 offset-4 my-2">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white">Grading</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('grades.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 my-2">
                                    <label for="">Student</label>
                                    <select name="user_id" id="" class="form-control form-control-sm">
                                        <option disabled selected>-- Select --</option>
                                        @foreach($students as $student)
                                            <option value="{{$student->id}}">{{ucwords($student->name)}}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_name')
                                    <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12 my-2">
                                    <label for="">Student</label>
                                    <select name="subject_id" id="" class="form-control form-control-sm">
                                        <option disabled selected>-- Select --</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{ucwords($subject->subject_name)}}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id')
                                    <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12 my-2">
                                    <label for="">Grade</label>
                                    <input type="number" step="0.01" maxlength="100" min="60" class="form-control-sm form-control" name="grade" placeholder="enter a grade from 60 to 100">
                                    @error('grade')
                                    <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-6 my-2 d-grid">
                                    <button type="submit" class="btn btn-primary btn-sm"> Submit</button>
                                </div>

                                <div class="col-6 my-2 d-grid">
                                    <button type="reset" class="btn btn-danger btn-sm"> Clear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 my-2">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Grading</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Subject</th>
                                    <th>Grade</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($grades as $grade)
                                    <tr>
                                        <td>{{$grade->user->name}}</td>
                                        <td>{{$grade->subject->subject_name}}</td>
                                        <td>{{$grade->grade}}</td>
                                        <td>

                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editStudentGradeModal{{$grade->id}}">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <div class="modal fade" id="editStudentGradeModal{{$grade->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Update Grade
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('grades.update', [$grade->id])}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="col-6  my-2">
                                                                        <h5 class="text-center fs-1 fw-bolder" style="letter-spacing: 0.3rem">{{$grade->user->name}}</h5>
                                                                    </div>
                                                                    <div class="col-6 my-2">
                                                                        <h5 class="text-center fs-1 fw-bolder" style="letter-spacing: 0.3rem">{{$grade->subject->subject_name}}</h5>
                                                                    </div>
                                                                    <div class="col-12 my-2">
                                                                        <label for="">Grade</label>
                                                                        <input type="number" step="0.01" class="form-control-sm form-control" value="{{$grade->grade}}" name="grade" placeholder="enter a grade here decimal is enabled">
                                                                        @error('grade')
                                                                        <span class="text-danger small">
                                                                            {{$message}}
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-6 my-2 d-grid">
                                                                        <button type="submit" class="btn btn-primary btn-sm"> Update</button>
                                                                    </div>
                                                                    <div class="col-6 my-2 d-grid">
                                                                        <button type="reset" class="btn btn-danger btn-sm"> Clear</button>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>

    </div>


@endsection
