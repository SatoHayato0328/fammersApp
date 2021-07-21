@extends('layouts.admin')

@section('title', '実績詳細')

@section('content')
   <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2  class="font-weight-bold">実績</h2>
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                <?php
                //dd($jisseki);
                ?>    
                <div class="form-group row">
                        <label class="col-md-10">農作物</label>
                        <div class="text col-md-4">
                            {{ $jisseki->crop }}
                        </div>
                </div>
                <div class="form-group row">
                        <label class="col-md-10">日付</label>
                        <div class="text col-md-4">
                            {{ $jisseki->jisseki_date->format('Y/m/d') }}
                        </div>
                </div>
                <div class="form-group row">
                        <label class="col-md-10">作業時間</label>
                        <div class="text col-md-4">
                            {{ $jisseki->jisseki_time }}
                        </div>    
                </div>
                <div class="form-group row">
                        <label class="col-md-10">天候</label>
                        <div class="text col-md-4">
                            {{ $jisseki->jisseki_weather }}
                        </div>    
                </div>
                <div class="form-group row">
                        <label class="col-md-10">作業人数</label>
                        <div class="text col-md-4">
                            {{ $jisseki->jisseki_people }}
                        </div>    
                </div>
                <div class="form-group row">
                        <label class="col-md-10">作業内容</label>
                        <div class="text col-md-4">
                            {{ $jisseki->jisseki_contents }}
                        </div>    
                </div>
                <div class="form-group row">
                        <label class="col-md-10">資材</label>
                        <div class="text col-md-4">
                            {{ $jisseki->jisseki_material }}
                        </div>    
                </div>
                <div class="form-group row">
                        <label class="col-md-10">数量</label>
                        <div class="text col-md-4">
                            {{ $jisseki->jisseki_suuryou }}
                        </div>    
                </div>
                <div class="form-group row">
                        <label class="col-md-10">出荷単価</label>
                        <div class="text col-md-4">
                            {{ $jisseki->jisseki_syukkatanka }}
                        </div>    
                </div>
                <div class="form-group row">
                        <label class="col-md-10">画像</label>
                        <div class="image col-md-4">
                            @if ($jisseki->image_path)
                            <img src="{{ asset('storage/image/' . $jisseki->image_path) }}">
                            @endif
                        </div>    
                </div>
                <div class="form-group row">
                        <label class="col-md-10">コメント</label>
                        <div class="text col-md-4">
                            {{ $jisseki->jisseki_coment }}
                        </div>    
                </div>
            </div>
        </div>
    </div>
@endsection    