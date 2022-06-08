<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    
    //Mostrar todos los listing
    public function index(){
        return view('listings.index',[
            'listings' =>  Listing::latest()->filter
            (request(['tag', 'search']))->paginate(4) //Esto llama la data del modelo en App\Model\Listing
            //El latest->get muestra la entrada mas reciente de primero
            //Paginate muestra la cantidad de items que le pasemos
            //El filter hace filtro haciendo request del valor tag
            //Con search en el array se usa el name search en el partial de search para filtrar
            //En listing.php esta el scopeFilter que se encarga de filtrar por el valor de tag
        ]);
    }

    //Mostrar un unico listing
    public function show(Listing $listing){
        return view ('listings.show', [
            'listing' => $listing
        ] );
    } 

    //Mostrar form de create
    public function create(){
        return view ('listings.create');
    } 

    //Guardar informacion de listing
    public function store(Request $request){//usando el request helper, si algo falla devuelve error
        //Validacion de campos para que todos sean requeridos
        $formFields=$request->validate([
            'title'=>'required',
            'tags'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'location'=>'required',
            'email'=>['required', 'email'],
            'phone'=>'required',
            'description'=>'required'
        ]);
        //Si el request incluye una imagen, crear el field en formFields como arriba
        //guardarla en una carpeta logos en public
    if ($request->hasFile('logo')) {
    $formFields['logo']=$request->file('logo')->store('logos', 'public');
}

        Listing::create($formFields);//guarda la data en los forms
        return redirect('/')->with('message', 'Your gear was posted!');
    }

    //Mostrar form de edit
    public function edit(Listing $listing){
        return view ('listings.edit', ['listing'=>$listing]);
    } 

//Funcion para hacer update de los campos
    public function update(Request $request, Listing $listing){//usando el request helper, si algo falla devuelve error
        //Validacion de campos para que todos sean requeridos
        $formFields=$request->validate([
            'title'=>'required',
            'tags'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'location'=>'required',
            'email'=>['required', 'email'],
            'phone'=>'required',
            
            'description'=>'required'
        ]);
    if ($request->hasFile('logo')) {
    $formFields['logo']=$request->file('logo')->store('logos', 'public');
}

        $listing->update($formFields);//guarda la data en los forms
        return back()->with('message', 'Your gear was updated!');
    }

    //Delete item
    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message', 'The post was deleted');
    }

}
