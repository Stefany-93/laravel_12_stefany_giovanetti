<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaninoRequest;
use App\Models\Panino;


class CreaController extends Controller
{
        public function __construct(){
                $this->middleware('auth')->except('crea');
        }

        public function crea(){
                return view('crea');
        }

        // public function creaPanino(PaninoRequest $request) {

        //         $panino = new Panino();
        //         $panino->name = $request->name;
        //         $panino->description = $request->description;
        //         if ($request->hasFile('img')) {
        //                 $panino->img = $request->file('img')->store('images', 'public');
        //         } else {
        //                 $panino->img = 'images/no-img.png';
        //         }
        //         $panino->save();

        //         return redirect()->route('panini.index');
        // }
        public function creaPanino(PaninoRequest $request){
                $imgPath = $request->hasFile('img')
                ? $request->file('img')->store('images', 'public')
                : 'images/no-img.png';
                Panino::create([
                        'name' => $request->name,
                        'description' => $request->description,
                        'img' => $imgPath
                ]);
                return redirect()->route('panini.index');
        }

        public function index(){

                $paninos = Panino::all();
                return view('panini.index', ['paninos'=> $paninos]);
        }

}
