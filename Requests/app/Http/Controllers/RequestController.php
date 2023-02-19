<?php

namespace App\Http\Controllers;

// use App\Models\UserInfos;
// use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //



    }

    /**
     *  the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {



        // switch case statement
        switch ($request->input('requete')) {


        // Interaction avec les requêtes
            case "input":
                return view('result', ["requete" => '$request->input("nom")', "value" => $request->input('nom')]);
                break;
            case "chemin":
                return view('result', ["requete" => '$request->path()', "value" => $request->path()]);
                break;
            case "inspecter":
                return view('result', ["requete" => '$request->is("request-result")', "value" => $request->is('request-result')]);
                return view('result', ["requete" => '$request->routeIs("request-result")', "value" => $request->routeIs('request-result')]);
                break;

            case "url":
                return view('result', ["requete" => '$request->url()', "value" => $request->url()]);
                return view('result', ["requete" => '$request->fullUrl()', "value" => $request->fullUrl()]);
                return view('result', ["requete" => '$request->fullUrlWithQuery(["type" => "phone"])', "value" => $request->fullUrlWithQuery(['key' => 'value'])]);
                break;

           case "hote":
                return view('result', ["requete" => '$request->http()', "value" => $request->host()]);
                return view('result', ["requete" => '$request->httpHost()', "value" => $request->httpHost()]);
                return view('result', ["requete" => '$request->schemeAndHttpHost()', "value" => $request->schemeAndHttpHost()]);
                break;

            case "method":
                return view('result', ["requete" => '$request->method()', "value" => $request->method()]);
                return view('result', ["requete" => '$request->isMethod("post")', "value" => $request->isMethod('post')]);
                break;

            case "en-tete":
                return view('result', ["requete" => '$request->header("X-Header-Name","default header if not exists.")', "value" => $request->header('X-Header-Name', 'X-Header-Name')]);
                return view('result', ["requete" => '$request->hasheader("X-Header-Name")', "value" => $request->hasheader('X-Header-Name')]);
                return view('result', ["requete" => '$request->bearerToken()', "value" => $request->bearerToken()]);

                break;

            case "ip":
                return view('result', ["requete" => '$request->ip()', "value" => $request->ip()]);
                break;

            case "negociation":
             
                return view('result', ["requete" => '$request->getAcceptableContentTypes()', "value" => implode(' ', $request->getAcceptableContentTypes())]);
                return view('result', ["requete" => '$request->expectsJson()', "value" => $request->expectsJson()]);
                return view('result', ["requete" => '$request->accepts(["text/html", "application/json"]', "value" => $request->accepts(['text/html', 'application/json'])]);
                return view('result', ["requete" => '$request->prefers(["text/html", "application/json"])', "value" => $request->prefers(["text/html", "application/json"])]);
                break;




                //Interaction aves les inputs.

            case "all":
                
                return view('result', ["requete" => '$request->all()', "value" => implode(" ",$request->all())]);
                return view('result', ["requete" => '$request-collect()', "value" => $request->collect()]);
                break;

            case "une":
                return view('result', ["requete" => '$request->input("nom")', "value" => $request->input('nom')]);
                return view('result', ["requete" => '$request->input("products.0.name")', "value" => $request->input('products.0.name')]);
                return view('result', ["requete" => '$request->input("products.*.name")', "value" => $request->input('products.*.name')]);
                break;

            case "query":
                // elements passé avec la methode GET dans l'URL 
                return view('result', ["requete" => 'query("key", "value")', "value" => $request->query('key', 'value')]);
                break;

            case "json":
                return view('result', ["requete" => '$request->input("user.name")', "value" => $request->input('user.name')]);
                break;

            case "string":
                return view('result', ["requete" => '$request->string("name")->trim()', "value" => $request->string('nom')->trim()]);
                break;

            case "bool":
                return view('result', ["requete" => '$request->boolean("nom")', "value" => $request->boolean('nom')]);
                break;

            case "date":
                return view('result', ["requete" => '$request->date("date");', "value" => $request->date("date")]);
                return view('result', ["requete" => '$request->date("date","!H:i","Europe/Madrid");', "value" => $request->date("date", "!H:i", "Europe/Madrid")]);
                break;


            case "dynamic":
                return view('result', ["requete" => '$request->nom', "value" => $request->nom]);
                break;




            case "portion":
                return view('result', ["requete" => '$request->only(["nom", "date"])', "value" => implode(" ",$request->only(['nom', 'date']))]);
                return view('result',["requete"=>'$request->except("nom")',"value"=>implode(" ",$request->except('nom'))]);
                return view('result', ["requete" => '$request->except(["date"])', "value" => implode(" ",$request->except(['date','nom']))]);
                break;

            case "present":
                
                return view('result', ["requete" => '$request->has("nom")', "value" => $request->has('nom')]);
                return view('result', ["requete" => '$request->has(["nom", "email"])', "value" => $request->has(['nom', 'email'])]);
                return view('result', ["requete" => '$request->has(["nom", "email"])', "value" => $request->hasany(['nom', 'email'])]);
                return view('result', ["requete" => '$request->whenHas("nom","callback")', "value" => $request->whenHas('nom',
                 function ($input) {
                    // The "nom" value is present...
                }, function () {
                    // The "nom" value is not present...-
                })]);

                break;

            case "filled":
                
                return view('result', ["requete" => '$request->filled("prenom")', "value" => $request->filled('prenom')]);
                return view('result', ["requete" => '$request->whenFilled("prenom","callback")', "value" => $request->$request->$request->whenFilled('prenom', function ($input) {
                    //
                })]);
                break;


            case "missing":
                return view('result', ["requete" => '$request->missing("nom")', "value" => $request->missing('nom')]);
                return view('result', ["requete" => '$request->missing("nom")', "value" => $request->whenMissing('nom', function ($input) {
                    // The "name" value is missing...
                }, function () {
                    // The "name" value is present...
                })]);
                break;

            case "merge":
                return view('result', ["requete" => '$request->merge(["key1" => "value1", "key2" => "value2"])', "value" => $request->merge(['key1' => "value1", 'key2' => 'value2'])]);
                return view('result', ["requete" => '$request->mergeIfMissing(["key1" => "value1", "key2" => "value2"]);)', "value" => $request->$request->mergeIfMissing(["key1" => "value1", "key2" => "value2"])]);
                break;
            case "flash":
                return view('result', ["requete" => '$request->flash("nom")', "value" => $request->flash('nom')]);
                return view('result', ["requete" => '$request->old()', "value" => $request->old('nom')]);
                return view('result', ["requete" => '$request->flashOnly(["nom", "date"])', "value" => $request->flashOnly(['nom', 'date'])]);
                return view('result', ["requete" => '$request->flashExcept("password")', "value" => $request->flashExcept('date')]);
                break;

            case "cookies":
                return view('result', ["requete" => '$request->cookie("cookie name")', "value" => $request->cookie()]);

                // Interaction avec les fichier. 
            case "uploaded":
                return view('result', ["requete" => ' $request->fichier', "value" => $request->fichier]);
                return view('result', ["requete" => ' $request->file("fichier")', "value" => $request->file('fichier')]);
                return view('result', ["requete" => ' $request->hasFile("fichier")', "value" => $request->hasFile('fichier')]);
            case "valid":
                return view('result', ["requete" => '$request->file("fichier")->isValid()', "value" => $request->file('fichier')->isValid()]);
            case "extension":
                return view('result', ["requete" => '$request->fichier->extension("fichier")', "value" => $request->fichier->extension()]);
                return view('result', ["requete" => '$request->fichier->path()', "value" => $request->fichier->path()]);
            case "store":
                return view('result', ["requete" => '$request->fihcier->store("images","s3")', "value" => $request->fichier->store('fichiers')]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
