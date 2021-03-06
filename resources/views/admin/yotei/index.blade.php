@extends('layouts.admin')
@section('title', '予定確認')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="font-weight-bold">予定確認</h2>
        </div>
        <br />
        <div class="row">
            <div class="col-auto">
                <form action="{{ action('Admin\YoteiController@index') }}" method="get">
                    <div class="form-group row">
                        <label for="request-month mx-auto">月選択</label>
                            <input type="month" name="search_year_month" value="{{ $search_year_month }}">
                        <label class="col-auto mx-auto">農作物</label>
                        <div class="col-auto">
                            <select class="form-control" id="crop" name="cond_crop" value="{{ $cond_crop }}">
                                <option></option>
                                <option>さくらんぼ</option>
                                <option>シャインマスカット</option>
                                <option>梨</option>
                                <option>アスパラガス</option>
                    　　　　</select>    
                        </div>
                        <div class="col-auto">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-yotei col-md-12 mx-auto">
                <div class="table-scroll row">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th width="10%">日付</th>
                                <th width="10%">農作物</th>
                                <th width="10%">作業時間</th>
                                <th width="10%">作業人数</th>
                                <th width="40%">作業内容</th>
                                <th width="20%">資材</th>
                                <th width="5%"></th>
                                <th width="5%"></th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $yotei)
                                <tr>
                                    <th>{{ $yotei->yotei_date }}</th>
                                    <th>{{ $yotei->crop }}</th>
                                    <th>{{ $yotei->yotei_time }}</th>
                                    <th>{{ $yotei->yotei_people }}</th>
                                    <td>{{ $yotei->yotei_contents }}</td>
                                    <td>{{ $yotei->yotei_material }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\YoteiController@edit', ['id' => $yotei->id]) }}">編集</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\JissekiController@edit', ['id' => $yotei->id]) }}">実績登録</a> 
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\YoteiController@delete', ['id' => $yotei->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection