@extends('layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            History
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">History</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            @foreach($histories as $history)
                                <li class="time-label">
                        <span class="bg-green">
                          {{ $history->created_at->format('d-m-Y') }}
                        </span>
                                </li>
                                <li>
                                    <i class="fa fa-envelope bg-blue"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i
                                                    class="fa fa-clock-o"></i>{{ $history->created_at->format('H:i:s') }}</span>

                                        <h3 class="timeline-header">Người nhận: <a href="#">{{ $history->name }} </a>
                                        </h3>

                                        <div class="timeline-body">
                                            <p><b>Đơn hàng</b></p>
                                            <ul>
                                                @foreach( $historyDetails as $historyDetail)
                                                    @if($historyDetail->history_id == $history->id)
                                                        <li>
                                                            Tên sản phẩm : {{ $historyDetail->name }}
                                                            <ul>
                                                                <li>
                                                                    So luong: {{ $historyDetail->quantity }}
                                                                </li>
                                                                <li>
                                                                    Giá tiền: {{ $historyDetail->cost }}$
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <p><b>Hình thức thanh
                                                    toán: </b>{{ $history->type == \App\Models\History::CASH ? 'Tiền mặt' : 'Thẻ tín dụng' }}
                                            </p>
                                            <p><b>Tổng số tiền: </b>{{ $history->amount }}$</p>
                                        </div>
                                        <div class="timeline-footer">
                                        </div>
                                    </div>
                                </li>

                        @endforeach

                        <!-- END timeline item -->
                        </ul>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
    </section>
@endsection