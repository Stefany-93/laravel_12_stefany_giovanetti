<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SandwichEditRequest;
use App\Http\Requests\SandwichRequest;
use App\Models\Sandwich;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class SandwichController extends Controller implements HasMiddleware
{        

        public static function middleware(): array
        {

                return [

                        new Middleware('auth', except: ['index']),

                ];
                
        }

        public function index(){
                $sandwiches = Sandwich::all();
                return view('sandwich.index', compact('sandwiches'));
        }

        public function create(){
                return view('sandwich.create');
        }

        public function store(SandwichRequest $request){

                $imgPath = $request->file('img')->store('images', 'public');

                $sandwich = Sandwich::create([
                        'name'=> $request->name,
                        'description'=> $request->description,
                        'img'=> $imgPath,
                        'user_id'=> Auth::user()->id
                ]);

                return redirect()->route('home')->with('successMessage', 'Hai inserito correttamente il tuo panino');

        }

        public function sandwiches(){

                return view('sandwich.index', ['sandwiches' => $this->arraySandwiches]);

        }

        public function show(Sandwich $sandwich){

                return view('sandwich.show', compact('sandwich'));

        }

        public function edit(Sandwich $sandwich){

                if ($sandwich->user_id == Auth::user()->id) {

                        return view('sandwich.edit', compact('sandwich'));   

                }else{

                        return redirect()->route('home')->with('errorMessage', 'Non puoi accedere a questa pagina');
                        
                }  
        
        }

        public function update(SandwichEditRequest $request, Sandwich $sandwich){

                if ($sandwich->user_id == Auth::user()->id) {

                        $sandwich->update([

                                $sandwich->name = $request->name,
                                $sandwich->description = $request->description,

                        ]);

                        if($request->img){

                                $sandwich->update([

                                        $sandwich->img = $request->file('img')->store('images', 'public')

                                ]);
                        }

                        return redirect()->route('home')->with('successMessage', 'Hai modificato correttamente il tuo panino');   

                }else{

                        return redirect()->route('home')->with('errorMessage', 'Non puoi accedere a questa pagina');

                }
                

        }

        public function destroy(Sandwich $sandwich){

                if ($sandwich->user_id == Auth::user()->id) {

                        $sandwich->delete();

                        return redirect()->route('home')->with('successMessage', 'Hai eliminato correttamente il tuo panino');   

                }else{

                        return redirect()->route('home')->with('errorMessage', 'Non puoi accedere a questa pagina');

                }            

        }

}

