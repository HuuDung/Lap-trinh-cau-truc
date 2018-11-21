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
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div class="form-group">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="{{ Storage::url($user->avatar) }}"
                                 alt="User profile picture">
                        </div>
                        <div class="form-group">
                            <input class="form-control text-center" type="text" name="name"
                                   value="{{ $user->name }}"
                                   placeholder="Name" readonly>
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
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <input type="text" class="form-control"
                                   @if($user->gender == \App\User::MALE) value="Male"
                                   @elseif($user->gender == \App\User::FERMALE) value="Fermale"
                                   @elseif($user->gender == \App\User::ORTHER) value="Other"
                                   @endif readonly>

                        </div>
                        <div class="form-group">
                            <label for="bỉthday"><i class="fa fa-calendar margin-r-5"></i>Birthday:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right"
                                       value="{{ $user->birthday }}" readonly>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label for="location"><i class="fa fa-map-marker margin-r-5"></i>Location:</label>
                            <input type="text" class="form-control pull-right" name="location"
                                   value="{{ $user->location }}"
                                   placeholder="Location" readonly>
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
                                   placeholder="Notes" readonly>
                            <!-- /.input group -->
                        </div>
                        <div>
                            <div class="text-center">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <!-- /.box -->
            </div>
            <div class="col-md-3"></div>
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('script')
    <script type="text/javascript">
      $(function () {

      });
    </script>
@endsection