@extends('layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Pay
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pay</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row text-center">
            <h4>Nạp Tiền</h4>
            <div class="col-3"></div>
            <div class="col-6">

                {{Form::open(['method' => 'post', 'route' => ['store.balance']]) }}
                <div class="form-group row">
                    <label for="balance" class="col-md-4 col-form-label text-md-right">{{ __('Số tiền') }}</label>
                    <div class="col-md-6">
                        <input id="balance" type="text"
                               class="form-control{{ $errors->has('balance') ? ' is-invalid' : '' }}"
                               name="balance" value="{{ old('balance') }}" required autofocus>
                        @if ($errors->has('balance'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('balance') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div>
                    {{ Form::submit('Nạp', ['class' => 'btn btn-success']) }}
                    {{ Form::close() }}
                </div>
            </div>
            <div class="col-3"></div>

        </div>


    </section>
@endsection