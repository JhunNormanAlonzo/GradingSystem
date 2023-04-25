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


            <div class="col-12 my-2">
                <div class="card p-2">
                    <form action="{{route('subjects.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-5 ">
                                <input type="text" placeholder="Subject Name" class="form-control form-control-sm  @error('subject_name') is-invalid @enderror" name="subject_name" >
                                @error('subject_name')
                                <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-5 ">
                                <input type="text" placeholder="Description" class="form-control form-control-sm  @error('description') is-invalid @enderror" name="description" >
                                @error('description')
                                <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-2 d-grid">
                                <button type="submit" class="btn btn-success btn-sm"> Save</button>
                            </div>
                        </div>
                    </form>


                    @if($subjects->count() > 0)
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{$subject->subject_name}}</td>
                                    <td>{{$subject->description}}</td>
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

















                <div class="col-12 my-2">
                    <div class="card p-2">
                        <form action="{{route('users.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-2 my-2">

                                    <input type="text" placeholder="Username" class="form-control form-control-sm  @error('email') is-invalid @enderror" name="email" >
                                    @error('email')
                                    <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-2 my-2">

                                    <input type="password" placeholder="Password" class="form-control form-control-sm  @error('password') is-invalid @enderror" name="password" >
                                    @error('password')
                                    <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-4 my-2">

                                    <input type="text" placeholder="Name" class="form-control form-control-sm  @error('name') is-invalid @enderror" name="name" >
                                    @error('name')
                                    <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-2 my-2">

                                    <select name="role" id="" class="form-select-sm form-select">
                                        <option disabled selected>-- Select Role --</option>
                                        <option value="student">Student</option>
                                        <option value="teacher">Teacher</option>
                                    </select>
                                    @error('role')
                                    <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-2 my-2 d-grid">
                                    <button type="submit" class="btn btn-sm btn-success">save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>











                <div class="col-12 my-2">
                    <div class="card p-2">



                        @if($subjects->count() > 0)
                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                @endforeach
                            </table>

                            </tbody>
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

@endsection
