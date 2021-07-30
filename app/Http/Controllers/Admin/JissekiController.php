<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jisseki;
use App\Yotei;

class JissekiController extends Controller
{
    //
     public function add(Request $request)
    {
        $yotei = Yotei::find($request->id);
        
        if (empty($yotei)) {
            
            return redirect(route('yotei'));
        }
        return view('admin.jisseki.create', ['yotei' => $yotei]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Jisseki::$rules);
        
        $jisseki = new Jisseki;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $jisseki->image_path = basename($path);
        } else {
            $jisseki->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $jisseki->fill($form);
        $jisseki->save();
        
        return redirect('admin/jisseki/create');
    }
    
    public function index(Request $request)
    {
        //dd($request->search_year_month);
        $search_year_month = $request->search_year_month;
        $cond_crop = $request->cond_crop;
        
        $query = Jisseki::query();
        
        if ($search_year_month != '') {
            $query->where('jisseki_date', 'like', "$search_year_month%");
        }
        if ($cond_crop != '') {
            $query->where('crop', $cond_crop);
        }
        $posts = $query->get();
        //dd($posts);
        return view('admin.jisseki.index', ['posts' => $posts, 'search_year_month' => $search_year_month, 'cond_crop' => $cond_crop]);
    }
    
    public function show(Request $request)
    {
        $jisseki = Jisseki::find($request->id);
        
        return view('admin/jisseki/show', ['jisseki' => $jisseki]);
    }

    public function edit(Request $request)
    {
        $jisseki = Jisseki::find($request->id);
        if (empty($jisseki)) {
            abort(404);
        }
        return view('admin.jisseki.edit', ['jisseki_form' => $jisseki]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Jisseki::$rules);
        $jisseki = Jisseki::find($request->id);
        
        $jisseki_form = $request->all();
        //dd($jisseki_form);
        if ($request->remove == 'true') {
            $jisseki_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            
            $jisseki_form['image_path'] = basename($path);
            //dd($jisseki_form['image_path']);
        } else {
            $jisseki_form['image_path'] = $jisseki->image_path;
        }
        
        unset($jisseki_form['image']);
        unset($jisseki_form['remove']);
        unset($jisseki_form['_token']);
        
        //dd($jisseki_form);
        $jisseki->fill($jisseki_form);
        $jisseki->image_path = $jisseki_form['image_path'];
        $jisseki->yotei_id = $jisseki['id'];
        $jisseki->save();
        
        return redirect('admin/jisseki');
    }
    
    
    public function delete(Request $request)
    {
        $jisseki = Jisseki::find($request->id);
        $jisseki->delete();
        return redirect('admin/jisseki');
    }
}
