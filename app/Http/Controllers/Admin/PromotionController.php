<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promotion;
use App\Http\Requests;
use Illuminate\Support\Facades\Cache;

class PromotionController extends Controller
{
   
        private $proms = [];

        public function __construct()
        {
            $this->middleware('auth');
            $this->proms = $this->getPromotions();
        }

        public function index()
        {
            $promotions = Promotion::orderBy('cnt_visit', 'desc')->get();
            return view('admin.promotion.index', ['promotions' => $promotions]);
        }


        public function showblock()
        {
            $promotions = Promotion::orderBy('cnt_visit', 'desc')->get();
            return view('partials.promotion_left', ['promotions' => $promotions]);
        }


        public function show($id)
        {
            $promotion = Promotion::findOrFail($id);
            return view('admin.promotion.show', ['promotion' => $promotion]);
        }

        public function create()
        {
            
            return view('admin.promotion.create', ['proms' => $this->proms]);
        }

        public function store(Request $request)
        {
            $this->validateRecord($request);
            $this->uploadPicture($request);
            $promotion = new Promotion();
            
            $promotion->product = $request['product'];
            $promotion->price = $request['price'];
            $promotion->company = $request['company'];
            $promotion->site = $request['site'];
            $promotion->img = $request['img'];
            $promotion->save();
            
        
            
            Cache::flush();
            
            return redirect('admin/promotion')->with('message', 'Реклама добавлена');
        }

        public function edit($id)
        {
            $promotion = Promotion::findOrFail($id);
            return view('admin.promotion.edit', ['promotion' => $promotion, 'proms' => $this->proms]);
        }

        public function update(Request $request, $id)
        {
            $promotion = Promotion::findOrFail($id);
            $this->validateRecord($request);
            $this->uploadPicture($request, $promotion);
            
            $promotion->product = $request['product'];
            $promotion->price = $request['price'];
            $promotion->company = $request['company'];
            $promotion->site = $request['site'];
            
            $promotion->update();
        
            Cache::flush();
            return redirect('admin/promotion')->with('message', 'Реклама изменена');
        }

        public function destroy($id)
        {
            $promotion = Promotion::findOrFail($id);
            $promotion->delete();
            Cache::flush();
            return redirect('/admin/promotion')->with('message', 'Реклама удалена');
        }


        private function getPromotions()
        {
            $promotions = Promotion::all();
            $proms = [];
            foreach ($promotions as $promotion) {
                $proms[$promotion->id] = $promotion->name;
            }
            return $proms;
        }

        private function validateRecord(Request $request)
        {
            return $this->validate($request, [
                'product' => 'required|min:5|max:50',
                'price'   => 'required',
                'site'    => 'required|min:5|max:500',
                'company'    => 'required|min:5|max:50',
                'img'     => 'required_without:pic|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024'
            ], [
                'required_without' => 'Изображение обязательно'
            ]);
        }

        private function getFields(Request $request)
        {
            return [
                'product'           => $request->product,
                'price'            => $request->price,
                'site'     => $request->site,
                'company' => $request->company,
                'img' => $request->img,
                    
            ];
        }

        private function uploadPicture(Request $request, $promotion = null)
        {
            if ($request->hasFile('img')) {
                $request->img = strtolower(date('YmdHis') . '_' . $request->file('img')->getClientOriginalName());
                $request->file('img')->move(base_path() . '/public/images/promotion/', $request->img);
                return true;
            }
            $request->img = $promotion->img;
            return true;
        }
    

}