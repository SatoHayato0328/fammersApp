<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Yotei;
use App\Jisseki;

class AnalysisController extends Controller
{
    //
    public function index(Request $request)
    {
        $search_year_month = $request->search_year_month;
        $cond_crop = $request->cond_crop;
        
        $query = Yotei::query();
        
        if ($search_year_month != '') {
            $query->where('yotei_date', 'like', "$search_year_month%");
        }
        if ($cond_crop != '') {
            $query->where('crop', $cond_crop);
        }
        $posts = $query->get();
        
        return view('admin.analysis.index', ['posts' => $posts, 'search_year_month' => $search_year_month, 'cond_crop' => $cond_crop]);
    }
}
