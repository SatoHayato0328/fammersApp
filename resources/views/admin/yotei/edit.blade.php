@extends('layouts.admin')

@section('title', '予定編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>予定編集</h2>
                <form action="{{ action('Admin\YoteiController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">農作物</label>
                        <div class="col-md-4">
                            <select class="form-control" id="crop" name="crop">
                                <option value="cherry">さくらんぼ</option>
                                <option value="shinemuscat">シャインマスカット</option>
                                <option value="pear">梨</option>
                                <option value="asparagus">アスパラガス</option>
                    　　　　</select>    
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">日付</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="work_date" value="{{ old('work_date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">作業時間</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="work_time" value="{{ old('work_time') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">作業人数</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="work_people" value="{{ old('work_people') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">作業内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="contents" rows="20">{{ old('contents') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">資材</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="material" row="10">{{ old('material') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $yotei_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary btn-lg" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection    