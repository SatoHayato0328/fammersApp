@extends('layouts.admin')
@section('title', '実績確認')

@section('content')
    <div class="container">
        <div class="row">
            <h2>実績確認</h2>
        </div>
        <div class="row">
            <div class="col-auto">
                <form action="{{ action('Admin\JissekiController@index') }}" method="get">
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
            <div class="list-jisseki col-md-12 mx-auto">
                <div class="table-scroll row">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>日付</th>
                                <th>農作物</th>
                                <th>作業時間</th>
                                <th>天気</th>
                                <th>作業人数</th>
                                <th>作業内容</th>
                                <th>資材</th>
                                <th>数量(kg)</th>
                                <th>出荷単価</th>
                                <th>コメント</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $jisseki)
                                <tr>
                                    <th>{{ $jisseki->jisseki_date }}</th>
                                    <th>{{ $jisseki->crop }}</th>
                                    <th>{{ $jisseki->jisseki_time }}</th>
                                    <th>{{ $jisseki->jisseki_people }}</th>
                                    <th>{{ $jisseki->jisseki_weather }}</th>
                                    <td>{{ $jisseki->jisseki_contents }}</td>
                                    <td>{{ $jisseki->jisseki_material }}</td>
                                    <th>{{ $jisseki->jisseki_suuryou }}</th>
                                    <th>{{ $jisseki->jisseki_syukkatanka }}</th>
                                    <th>{{ $jisseki->jisseki_comet }}</th>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\JissekiController@show', ['id' => $jisseki->id]) }}">詳細</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\JissekiController@edit', ['id' => $jisseki->id]) }}">編集</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\JissekiController@delete', ['id' => $jisseki->id]) }}">削除</a>
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