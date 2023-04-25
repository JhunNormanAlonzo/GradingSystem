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
                        <h5 class="card-title">Users</h5>
                        <button class="btn btn-sm float-end btn-outline-dark" data-bs-toggle="modal" data-bs-target="#createUserModal">Create User</button>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>CreateAt</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="createUserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Create User
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('users.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 my-2">
                                <label for="">Name</label>
                                <input type="text" class="form-control form-control-sm  @error('name') is-invalid @enderror" name="name" >
                                @error('name')
                                    <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 my-2">
                                <label for="">Email</label>
                                <input type="text" class="form-control form-control-sm  @error('email') is-invalid @enderror" name="email" >
                                @error('email')
                                <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 my-2">
                                <label for="">Password</label>
                                <input type="password" class="form-control form-control-sm  @error('password') is-invalid @enderror" name="password" >
                                @error('password')
                                <span class="text-danger small">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 my-2">
                                <label for="">Role</label>
                                <select name="role" id="" class="form-select-sm form-select">
                                    <option disabled >-- Select --</option>
                                    <option value="student">Student</option>
                                    <option value="teacher">Teacher</option>
                                </select>
                                @error('role')
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
