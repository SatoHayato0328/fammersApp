@extends('layouts.admin')
@section('title', '予定実績分析')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="font-weight-bold">予定実績分析</h2>
        </div>
        <br/>
        <div class="row">
            <div class="col-auto">
                <form action="{{ action('Admin\AnalysisController@index') }}" method="get">
                    <div class="form-group row">
                        <label for="request-month mx-auto">月選択</label>
                            <input type="month" name="search_year_month" value="{{ $search_year_month }}">
                        <label class="col-auto mx-auto">農作物（予定）</label>
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
            <div class="list col-md-12 mx-auto">
                <div class="table-scroll row">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th>日付</th>
                                <th>農作物</th>
                                <th>作業時間</th>
                                <th>作業人数</th>
                                <th>作業内容</th>
                                <th>資材</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $intCounter = 0;
                            ?>
                            @foreach($posts as $yotei)
                            <?php
                            $intCounter++;
                            ?>
                            　  <tr @if($intCounter % 2 == 0) style="background-color:white" @endif>
                                    <th>予定</th>
                                    <th>{{ $yotei->yotei_date }}</th>
                                    <th>{{ $yotei->crop }}</th>
                                    <th>{{ $yotei->yotei_time }}</th>
                                    <th>{{ $yotei->yotei_people }}</th>
                                    <td>{{ $yotei->yotei_contents }}</td>
                                    <td>{{ $yotei->yotei_material }}</td>
                                </tr>
                                <?php
                                //dd($yotei->jisseki);
                                ?>
                                @if ($yotei->jisseki != NULL)
                                <tr class="table-border" @if($intCounter % 2 == 0) style="background-color:white" @endif>
                                    <th>実績</th>
                                    <th>{{ $yotei->jisseki->jisseki_date }}</th>
                                    <th>{{ $yotei->jisseki->crop }}</th>
                                    <th>{{ $yotei->jisseki->jisseki_time }} ({{ $yotei->jisseki->jisseki_time - $yotei->yotei_time }})</th>
                                    <th>{{ $yotei->jisseki->jisseki_people }} ({{ $yotei->jisseki->jisseki_people - $yotei->yotei_people }})</th>
                                    <td>{{ $yotei->jisseki->jisseki_contents }}</td>
                                    <td>{{ $yotei->jisseki->jisseki_material }}</td>
                                </tr>
                            　　@endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection