@extends('layouts.app')

@section('content')
    <div class="container">
        <h5>Admin Page || Dashboard</h5>
        <hr>
        <div class="row">
            <div class="col-4 d-grid">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Users</h5>
                        <center>
                            <h1>
                                {{$users->count()}}
                            </h1>
                        </center>

                    </div>
                    <div class="card-footer text-center">
                        <a href="{{route('users.index')}}" class="text-decoration-none fw-semibold text-muted" style="letter-spacing: 0.3rem">View</a>
                    </div>
                </div>

            </div>
            <div class="col-4 d-grid">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Subjects</h5>
                        <center>
                            <h1>
                                {{$subjects->count()}}
                            </h1>
                        </center>

                    </div>
                    <div class="card-footer text-center">
                        <a href="{{route('subjects.index')}}" class="text-decoration-none fw-semibold text-muted" style="letter-spacing: 0.3rem">View</a>
                    </div>
                </div>
        </div>

    </div>
@endsection
