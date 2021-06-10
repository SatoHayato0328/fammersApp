<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Yotei;

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
}
