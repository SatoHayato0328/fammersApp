@extends('layouts.admin')

@section('title', 'Top')

@section('content')
   <div class="container">
       <form method=get action="{{ action('TopController@index') }}">
         <h3><input type="month" name="search_year_month" value="{{ $search_year_month }}">月分サマリー</h3>
         <div class="col-auto">
             {{ csrf_field() }}
             <input type="submit" class="btn btn-primary" value="表示">
         </div>
         <br />
           <div class="summary">
              <div class="left-column top-text col-auto">
                  <label>合計作業日数：</label>
                   <div class="font">
                       {{$days}}日
                   </div>
              </div>
              <div class="right-column top-text col-auto">
                  <label>合計作業時間：</label>
                   <div class="font">
                       {{$times}}時間
                   </div>
               </div><br />
               <div class="left-column top-text col-auto">
                  <label>合計出荷数量：</label>
                   <div class="font">
                       {{$total_suuryou}}kg
                   </div>
               </div>
               <div class="right-column top-text col-auto">
                  <label>合計出荷金額：</label>
                   <div class="font">
                       {{$prices * $total_suuryou}}円
                   </div>
               </div><br />
           </div>
           <br />
           <div class="crop-summary">
               <div class="left-column">
               <h4 class="font-weight-bold">さくらんぼ</h4>
               <div class="top-text col-auto">
                  <label>合計出荷数量：
                  　<div class="font">
                       {{$cherry_suuryou}}kg
                    </div>
                    </label>
               </div>
               <div class="top-text col-auto">
                  <label>合計出荷金額：
                   <div class="font">
                      {{$cherry_prices * $cherry_suuryou}}円
                   </div>
                   </label>
               </div>
               </div>
               <div class="right-column">
               <h4 class="font-weight-bold">シャインマスカット</h4>
               <div class="top-text col-auto">
                  <label>合計出荷数量：
                   <div class="font">
                       {{$shinemuscat_suuryou}}kg
                   </div>
                   </label>
               </div>   
               <div class="top-text col-auto">
                  <label>合計出荷金額：
                   <div class="font">
                       {{$shinemuscat_prices * $shinemuscat_suuryou}}円
                   </div>
                   </label>
               </div>
               </div><br />
               <div class="left-column">
               <h4 class="font-weight-bold">梨</h4>
               <div class="top-text col-auto">
                  <label>合計出荷数量：
                   <div class="font">
                       {{$pear_suuryou}}kg
                   </div>
                   </label>
               </div>
               <div class="top-text col-auto">
                  <label>合計出荷金額：
                   <div class="font">
                       {{$pear_prices * $pear_suuryou}}円
                   </div>
                   </label>
               </div> 
               </div>
               <div class="right-column">
               <h4 class="font-weight-bold">アスパラガス</h4>
               <div class="top-text col-auto">
                  <label>合計出荷数量：
                   <div class="font">
                       {{$asparagas_suuryou}}kg
                   </div>
                   </label>
               </div>   
               <div class="top-text col-auto">
                  <label>合計出荷金額：
                   <div class="font">
                       {{$asparagas_prices * $asparagas_suuryou}}円
                   </div>
                   </label>
               </div> 
               </div>
           </div>
       </form>
   </div>
@endsection