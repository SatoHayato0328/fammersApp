@extends('layouts.admin')

@section('title', 'Top')

@section('content')
   <div class="container wrap">
       <form method=get action="{{ action('TopController@index') }}">
           <div class="col-md-6">
              <h3><input type="month" name="search_year_month" value="{{ $search_year_month }}">月分サマリー</h3>
           </div>
           <div class="col-md-2">
             {{ csrf_field() }}
               <input type="submit" class="btn btn-primary" value="表示">
           </div>
           <br />
           <div class="summary">
                <h3 class="font-weight-bold" style="text-align: center; background-color: skyblue; border-radius: 10px">全作物合計</h3><br />
                <div class="left-column top-text col-auto">
                    <label>合計作業日数</label>
                    <div class="font">
                       {{$days}}日
                    </div>
                </div>
                <div class="right-column top-text col-auto">
                    <label>合計作業時間</label>
                    <div class="font">
                       {{$times}}時間
                    </div>
                </div><br />
                <div class="left-column top-text col-auto">
                    <br /><label>合計出荷数量</label>
                    <div class="font">
                       {{$total_suuryou}}kg
                    </div>
                </div><br />
                <div class="right-column top-text col-auto">
                    <br /><label>合計出荷金額</label>
                    <div class="font">
                       {{$cherry_prices + $shinemuscat_prices + $pear_prices + $asparagas_prices}}円
                    </div>
                </div><br /><br /><br /><br /><br /><br />
            </div>
            
            <div class="crop-summary">
                <h3 class="font-weight-bold" style="text-align: center; background-color:skyblue; border-radius: 10px">作物明細</h3>
                    <div class="left-column">
                        <h4 class="font-weight-bold" style="background-color:lightblue; border-radius: 10px">さくらんぼ</h4>
                        <div class="top-text col-auto">
                        <label>合計出荷数量</label>
                  　         <div class="font">
                                {{$cherry_suuryou}}kg
                            </div>
                        </div><br />
                        <div class="top-text col-auto">
                        <label>合計出荷金額</label>
                            <div class="font">
                                {{$cherry_prices}}円
                            </div>
                        </div>
                    </div>
                    <div class="right-column">
                        <h4 class="font-weight-bold" style="background-color:lightblue; border-radius: 10px">シャインマスカット</h4>
                        <div class="top-text col-auto">
                        <label>合計出荷数量</label>
                            <div class="font">
                                {{$shinemuscat_suuryou}}kg
                            </div>
                        </div><br />   
                        <div class="top-text col-auto">
                        <label>合計出荷金額</label>
                            <div class="font">
                                {{$shinemuscat_prices}}円
                            </div>
                        </div>
                    </div><br />
                    <div class="left-column">
                        <br /><h4 class="font-weight-bold" style="background-color:lightblue; border-radius: 10px">梨</h4>
                        <div class="top-text col-auto">
                        <label>合計出荷数量</label>
                            <div class="font">
                                {{$pear_suuryou}}kg
                            </div>
                        </div><br />
                        <div class="top-text col-auto">
                        <label>合計出荷金額</label>
                            <div class="font">
                                {{$pear_prices}}円
                            </div>
                        </div> 
                    </div><br />
                    <div class="right-column">
                        <br /><h4 class="font-weight-bold" style="background-color:lightblue; border-radius: 10px">アスパラガス</h4>
                        <div class="top-text col-auto">
                        <label>合計出荷数量</label>
                            <div class="font">
                                {{$asparagas_suuryou}}kg
                            </div>
                        </div><br />  
                        <div class="top-text col-auto">
                        <label>合計出荷金額</label>
                            <div class="font">
                                {{$asparagas_prices}}円
                            </div>
                        </div> 
                    </div>
            </div>
       </form>
   </div>
@endsection