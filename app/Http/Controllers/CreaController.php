<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaninoEditRequest;
use App\Http\Requests\PaninoRequest;
use App\Models\Panino;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CreaController extends Controller implements HasMiddleware
{        
        // public function __construct(){
        //         $this->middleware('auth')->except('index');
        // }
        public static function middleware(): array{
                return [
                        (new Middleware('auth:web')),
                ];
        }     

        public function create(){
                return view('panini.create');
        }

        public function store(PaninoRequest $request){

                $panino = Panino::create([
                        'name'=> $request->name,
                        'description'=> $request->description,
                        'img'=> $request->file('img')->store('public/storage'),
                        'user_id'=> Auth::user()->id
                ]);

                return redirect()->route('home')->with('successMessage', 'Hai inserito correttamente il tuo panino');
        }

        public function edit(Panino $panino){
                if ($panino->user_id == Auth::user()->id){
                        return view('panini.edit', compact('panino'));
                } else{
                        return redirect()->route('home')->with('errorMessage', 'Non puoi accedere a questa pagina');
                }
        }

        public function update(PaninoEditRequest $request, Panino $panino){
                if ($panino->user_id == Auth::user()->id){
                        $panino->update([
                                'name' => $request->name,
                                'description' => $request->description,
                        ]);

                        if($request->img){
                                $request->validate(['img'=>'image']);
                                $panino->update([
                                'img' => $request->file('img')->store('public/storage')
                        ]);
                }

                        return redirect()->route('home')->with('successMessage', 'Hai modificato correttamente il tuo panino');
                } else {
                        return redirect()->route('home')->with('errorMessage', 'Non puoi accedere a questa pagina');
                }
        }

        public function destroy(Panino $panino){
                if ($panino->user_id == Auth::user()->id){
                        $panino->delete();
                        return redirect()->route('home')->with('successMessage', 'Hai eliminato correttamente il tuo panino');
                } else{
                        return redirect()->route('home')->with('errorMessage', 'Non puoi accedere a questa pagina');
                }
        }
}