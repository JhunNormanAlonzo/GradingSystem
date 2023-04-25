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
            <div class="col-12 p-3  ">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">My Grades</h5>
                    </div>
                    <div class="card-body">
                        @if($grades->count() > 0)
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Grade</th>
                                <th>CreatedAt</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($grades as $grade)
                                <tr>
                                    <td>{{$grade->subject->subject_name}}</td>
                                    <td>{{$grade->grade}}</td>
                                    <td>{{$grade->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="row">
                                <div class="col-12">
                                    <p class="my-4 text-center">No record found!</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
