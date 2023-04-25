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
                        <h5 class="card-title">Subject</h5>
                        <button class="btn btn-sm float-end btn-outline-dark" data-bs-toggle="modal" data-bs-target="#createSubjectModal">Create Subject</button>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>CreateAt</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{$subject->subject_name}}</td>
                                    <td>{{$subject->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="createSubjectModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Create Subject
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('subjects.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 my-2">
                                <label for="">Name</label>
                                <input type="text" class="form-control form-control-sm  @error('subject_name') is-invalid @enderror" name="subject_name" >
                                @error('subject_name')
                                <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-primary btn-sm"> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
