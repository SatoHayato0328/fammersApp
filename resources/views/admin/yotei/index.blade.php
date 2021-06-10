@extends('layouts.admin')
@section('title', '予定確認')

@section('content')
    <div class="container">
        <div class="row">
            <h2>予定確認</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('Admin\YoteiController@index') }}" method="get">
                    <div class="form-group row">
                        <label for="request-month">月選択</label>
                            <input type="month" name="request_month" id="request-month">
                        <label class="col-md-2">農作物</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="cond_crop" value="{{ $cond_crop }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-yotei col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">日付</th>
                                <th width="10%">作業時間</th>
                                <th width="10%">作業人数</th>
                                <th width="40%">作業内容</th>
                                <th width="20%">資材</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $yotei)
                                <tr>
                                    <th>{{ $yotei->work_date }}</th>
                                    <th>{{ $yotei->work_time }}</th>
                                    <th>{{ $yotei->work_people }}</th>
                                    <td>{{ $yotei->contens }}</td>
                                    <td>{{ $yotei->material }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection