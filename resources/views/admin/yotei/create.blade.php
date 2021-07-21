@extends('layouts.admin')

@section('title', '予定登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="font-weight-bold">予定登録</h2>
                <form action="{{ action('Admin\YoteiController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-10">農作物</label>
                        <div class="col-md-4">
                            <select class="form-control" id="crop" name="crop">
                                <option>さくらんぼ</option>
                                <option>シャインマスカット</option>
                                <option>梨</option>
                                <option>アスパラガス</option>
                    　　　　</select>    
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">日付</label>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="yotei_date" value="{{ old('yotei_date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">作業時間</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="yotei_time" value="{{ old('yotei_time') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">作業人数</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="yotei_people" value="{{ old('yotei_people') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">作業内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="yotei_contents" rows="20">{{ old('yotei_contents') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">資材</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="yotei_material" row="10">{{ old('yotei_material') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="text-right">
                    <input type="submit" class="btn btn-primary btn-lg" value="登録">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection    