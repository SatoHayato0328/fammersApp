<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Yotei;
use App\Jisseki;
use App\History;
use Carbon\Carbon;

class YoteiController extends Controller
{
    //
    public function add()
    {
        return view('admin.yotei.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Yotei::$rules);
        
        $yotei = new Yotei;
        $jisseki = new Jisseki;
        
        $form = $request->all();
        
        unset($form['_token']);
        
        $jisseki->yotei_id = $yotei['id'];
        $jisseki->save();
        
        $yotei->fill($form);
        $yotei->jisseki_id = $jisseki['id'];
        $yotei->save();
        
        
        return redirect('admin/yotei');
    }
    
    public function index(Request $request)
    {
        //dd($request->search_year_month);
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
        
        return view('admin.yotei.index', ['posts' => $posts, 'search_year_month' => $search_year_month, 'cond_crop' => $cond_crop]);
    }
    
    public function edit(Request $request)
    {
        $yotei = Yotei::find($request->id);
        if (empty($yotei)) {
            abort(404);
        }
        return view('admin.yotei.edit', ['yotei_form' => $yotei]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Yotei::$rules);
        $yotei = Yotei::find($request->id);
        $yotei_form = $request->all();
        unset($yotei_form['_token']);
        
        $yotei->fill($yotei_form)->save();
        
        $history = new History;
        $history->yotei_id = $yotei->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/yotei');
    }
    
    public function delete(Request $request)
    {
        $yotei = Yotei::find($request->id);
        $yotei->delete();
        return redirect('admin/yotei/');
    }
}
