@extends('layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="col-md-6">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div class="form-group">
                                <img class="profile-user-img img-responsive img-circle"
                                     src="{{ asset($user->avatar) }}"
                                     alt="User profile picture">
                            </div>
                            <div class="form-group text-center">
                                <input type="file" name="avatar" class="form-control col-3">
                            </div>
                            <div class="form-group">
                                <input class="col-9 form-control text-right" type="text" name="name"
                                       value="{{ $user->name }}"
                                       placeholder="Name">
                            </div>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Emails</b> <a class="pull-right">{{ Auth::user()->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Rank</b> <a class="pull-right">
                                        @if(Auth::user()->level == \App\User::NORMAL) {{ "Normal" }}
                                        @elseif(Auth::user()->level == \App\User::GOLD) {{ "GOLD" }}
                                        @elseif (Auth::user()->level == \App\User::DIAMOND) {{ "DIAMOND" }}
                                        @endif
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Orders</b> <a class="pull-right">{{ Auth::user()->order }}</a>
                                </li>
                            </ul>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success"><b>Update</b></button>
                                <a href="{{ route('user.index') }}"
                                   class="btn btn-primary "><b>Back</b></a>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <!-- /.box -->
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">About Me</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select name="gender" id="" class="form-control">
                                    <option value="{{ \App\User::MALE }}"
                                            @if($user->gender == \App\User::MALE) selected @endif>Male
                                    </option>
                                    <option value="{{ \App\User::FERMALE }}"
                                            @if($user->gender == \App\User::FERMALE) selected @endif>Fermale
                                    </option>
                                    <option value="{{ \App\User::ORTHER }}"
                                            @if($user->gender == \App\User::ORTHER) selected @endif>Orther
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-calendar margin-r-5"></i>Birthday:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="birthday" id="datepicker">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-map-marker margin-r-5"></i>Location:</label>
                                <input type="text" class="form-control pull-right" name="location"
                                       value="{{ $user->location }}"
                                       placeholder="Location">
                                <!-- /.input group -->
                            </div>
                            <div>
                                <strong><i class="fa fa-pencil margin-r-5"></i> Favorite</strong>
                                <p>
                                    <span class="label label-danger">{{ "Electronic" }}</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-file-text-o margin-r-5"></i>Notes:</label>
                                <input type="text" class="form-control pull-right" name="notes"
                                       value="{{ $user->notes }}"
                                       placeholder="Notes">
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </form>

    </section>
@endsection
@section('script')
    <script type="text/javascript">
      $(function () {
        $('#datetimepicker').datetimepicker();
      });
    </script>
@endsection