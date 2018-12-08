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
        <div class="row">
                <h4 class="text-center">Hóa đơn</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Cost($)</th>
                        <th class="text-center">Amount($)</th>
                    </tr>
                    </thead>
                    @php
                        $total = 0;
                    @endphp
                    <body>
                    @foreach($products as $key =>$value)
                        @php
                            $amount = $value['quantity'] * $value['cost'];
                            $total = $total + $amount;
                        @endphp
                        <tr>
                            <input type="hidden" name="id" value="{{$key}}">
                            <td>                        {{ $value['id'] }}</td>
                            <td class="text-center"><a href="#">{{ $value['name'] }}</a>
                            </td>
                            <td class="text-center ">
                                {{ $value['quantity'] }}
                            </td>
                            <td class="text-center">
                                <p class="cost">{{ $value['cost'] }} </p>
                            </td>
                            <td class="text-center">
                                <p class="amount">{{ $amount }}</p>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center">Tổng tiền:</td>
                        <td>
                            <p class="total text-center">{{ $total }}</p>
                        </td>
                    </tr>
                    </body>
                </table>
        </div>
        <div class="row text-center">
                <h4>Thông tin người mua</h4>
            {{Form::open(['method' => 'post', 'route' => ['pay.store']]) }}
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Họ tên') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Số điện thoại') }}</label>
                <div class="col-md-6">
                    <input id="phone" type="text"
                           class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                           name="phone" value="{{ old('phone') }}" placeholder="Phone number" required autofocus>
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ') }}</label>
                <div class="col-md-6">
                    <input id="location" type="text"
                           class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}"
                           name="location" value="{{ old('location', auth()->user()->location) }}" required autofocus>
                    @if ($errors->has('location'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('location') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Hình thức thanh toán') }}</label>
                <div class="col-md-6">
                    <select name="type" id="type" class="form-control">
                        <option value="{{ \App\Models\History::CASH }}">Tiền mặt</option>
                        <option value="{{ \App\Models\History::CREDIT }}">Thẻ tín dụng</option>
                    </select>
                </div>
            </div>
            <div>
                <input type="hidden" name="amount" value="{{ $total }}">
                {{ Form::submit('Next', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>
        </div>


    </section>
@endsection