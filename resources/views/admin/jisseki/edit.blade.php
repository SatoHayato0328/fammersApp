@extends('layouts.admin')

@section('title', '実績編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>予定編集</h2>
                <form action="{{ action('Admin\JissekiController@update') }}" method="post" enctype="multipart/form-data">

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
                            <input type="date" class="form-control" name="jisseki_date" value="{{ $jisseki_form->jisseki_date }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">作業時間</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="jisseki_time" value="{{ $jisseki_form->jisseki_time }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">天気</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="jisseki_weather" value="{{ $jisseki_form->jisseki_weather }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">作業人数</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="jisseki_people" value="{{ $jisseki_form->jisseki_people }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">作業内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="jisseki_contents" rows="20">{{ $jisseki_form->jisseki_contents }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">資材</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="jisseki_material" row="10">{{ $jisseki_form->jisseki_material }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">数量</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="jisseki_suuryou" value="{{ $jisseki_form->jisseki_suuryou }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">出荷単価</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="jisseki_syukkatanka" value="{{ $jisseki_form->jisseki_syukkatanka }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $jisseki_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-4">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="jisseki_coment" row="10">{{ $jisseki_form->jisseki_coment }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $jisseki_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary btn-lg" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection    