@extends('layouts.admin')

@section('title', '実績登録')

@section('content')
     <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>予定</h2>
                    
                        <label class="col-md-10">農作物</label>
                        <div class="col-md-4">
                            {{ $yotei->crop }}
                        </div>
                    
                   
                        <label class="col-md-10">日付</label>
                        <div class="col-md-4">
                            {{ $yotei->yotei_date }}
                        </div>
                   
                   
                        <label class="col-md-10">作業時間</label>
                        <div class="col-md-4">
                            {{ $yotei->yotei_time }}
                        </div>    
                    
                  
                        <label class="col-md-10">作業人数</label>
                        <div class="col-md-4">
                            {{ $yotei->yotei_people }}
                        </div>    
                  
                   
                        <label class="col-md-10">作業内容</label>
                        <div class="col-md-4">
                            {{ $yotei->yotei_contents }}
                        </div>    
                  
                    
                        <label class="col-md-10">資材</label>
                        <div class="col-md-4">
                            {{ $yotei->yotei_material }}
                        </div>    
                    
            </div>
            <div class="col-md-8 mx-auto">
                <h2>実績登録</h2>
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
                            <input type="date" class="form-control" name="jisseki_date" value="{{ old('jisseki_date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">作業時間</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="jisseki_time" value="{{ old('jisseki_time') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">作業人数</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="jisseki_people" value="{{ old('jisseki_people') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">天候</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="jisseki_weather" value="{{ old('jisseki_weather') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">作業内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="jisseki_contents" rows="20">{{ old('jisseki_contents') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">資材</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="jisseki_material" row="10">{{ old('jisseki_material') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">数量</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="jisseki_suuryou" value="{{ old('jisseki_suuryou') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10">出荷単価</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="jisseki_syukkatanka" value="{{ old('jisseki_syukkatanka') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="jisseki_coment" row="10">{{ old('jisseki_comet') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="text-right">
                    <input type="submit" class="btn btn-primary btn-lg" value="実績登録">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection    