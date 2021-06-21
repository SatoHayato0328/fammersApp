<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Yotei;
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
        $form = $request->all();
        
        unset($form['_token']);
        
        $yotei->fill($form);
        $yotei->save();
        
        return redirect('admin/yotei/create');
    }
    
    public function index(Request $request)
    {
        $cond_crop = $request->cond_crop;
        if ($cond_crop != '') {
            $posts = Yotei::where('crop', $cond_crop)->get();
        } else {
            $posts = Yotei::all();
        }
        return view('admin.yotei.index', ['posts' => $posts, 'cond_crop' => $cond_crop]);
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
        
        return redirect('admin/news');
    }
    
    public function delete(Request $request)
    {
        $yotei = Yotei::find($request->id);
        $yotei->delete();
        return redirect('admin/yotei/');
    }
}
