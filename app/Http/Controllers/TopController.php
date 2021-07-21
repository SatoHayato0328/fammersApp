<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Appp\Yotei;
use App\Jisseki;

class TopController extends Controller
{
    //
    public function index(Request $request)
    {
        $search_year_month = $request->search_year_month;
        
        if ($search_year_month != '') {
            $posts = Jisseki::where('jisseki_date', 'like', "$search_year_month%")
            ->get();
            
        } else {
            $posts = Jisseki::get();
        }
        
        //合計作業日数の計算
        $days = $posts->count('id');
        
        
        //合計作業時間の計算
        $times = $posts->sum('jisseki_time');
        
        //合計出荷数量の計算
        $total_suuryou = $posts->sum('jisseki_suuryou');
        
        //合計出荷単価の計算
        $prices = $posts->avg('jisseki_syukkatanka');
        
        //さくらんぼの合計出荷数量
        $cherry_suuryou = $posts->where('crop', 'さくらんぼ')->sum('jisseki_suuryou');
        
        
        //さくらんぼ平均出荷単価
        $cherry_prices = $posts->where('crop', 'さくらんぼ')->avg('jisseki_syukkatanka');
        
        
        //シャインマスカットの合計出荷数量
        $shinemuscat_suuryou = $posts->where('crop', 'シャインマスカット')->sum('jisseki_suuryou');
        
        
        //シャインマスカット平均出荷単価
        $shinemuscat_prices = $posts->where('crop', 'シャインマスカット')->avg('jisseki_syukkatanka');
        
        
        //梨の合計出荷数量
        $pear_suuryou = $posts->where('crop', '梨')->sum('jisseki_suuryou');
        
        
        //梨平均出荷単価
        $pear_prices = $posts->where('crop', '梨')->avg('jisseki_syukkatanka');
        
        
        //アスパラガスの合計出荷数量
        $asparagas_suuryou = $posts->where('crop', 'アスパラガス')->sum('jisseki_suuryou');
        
        
        //アスパラガス平均出荷単価
        $asparagas_prices = $posts->where('crop', 'アスパラガス')->avg('jisseki_syukkatanka');

        
        return view('top', ['search_year_month' => $search_year_month, 'posts' => $posts, 'days' => $days, 'times' => $times, 'prices' => $prices, 'total_suuryou' => $total_suuryou, 'cherry_suuryou' => $cherry_suuryou, 'cherry_prices' => $cherry_prices,
        'shinemuscat_suuryou' => $shinemuscat_suuryou, 'shinemuscat_prices' => $shinemuscat_prices, 'pear_suuryou' => $pear_suuryou, 'pear_prices' => $pear_prices, 'asparagas_suuryou' => $asparagas_suuryou, 'asparagas_prices' => $asparagas_prices,]);
    }
}
