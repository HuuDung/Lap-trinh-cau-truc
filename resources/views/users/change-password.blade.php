@extends('layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Change Password
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Change password</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('user.update.password') }}" method="POST">
            {{ csrf_token() }}
            <input type="hidden" value="PATCH" name="_method">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div class="form-group">
                                <input type="password" class="form-control" name="old_password"
                                       placeholder="Old password...">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password"
                                       placeholder="New password...">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation"
                                       placeholder="Confirm password...">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <!-- /.row -->
        </form>

    </section>
@endsection