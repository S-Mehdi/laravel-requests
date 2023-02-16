<?php

namespace App\Http\Controllers;

use App\Models\UserInfos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class UserInformations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        
        return view('saved'); 
    }

    /**
     * Show the form for creating a new resource.
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
        //
        // see what inputs are sent. 
        // Log::info(json_encode($request->all()));

        // store item into database. 
        $userinfos  = new  UserInfos;
        
        $userinfos->nom = $request->nom;
        $userinfos->prenom = $request->prenom; 
        $userinfos->mail = $request->mail;
        $userinfos->image = $request->image; 
        $userinfos->ville = $request->ville; 
      
        // $userinfos->filename= $request->filename
        // $userinfos->save(); 


        // testing requests. 
        // echo $request->path();

        /*
        *matched a given pattern

        if ($request->is('save/*')) {
            //
            echo "hello mehdi";
        }
        */

        // if ($request->routeIs('/')) {
        //     //
        //     echo "nice";
        // }

        // echo  $request->fullUrl();

        echo $request->fullUrlWithQuery(['type' => 'phone']);
        


  


        return $this->index(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
       

        // switch case statement

        switch ($request->input('requete')) {


            // Interaction 
            case "input":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->input('requete')]);
                break;
            case "chemin":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->path()]);
                break;
            case "inspecter":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->is('requete')]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>$request->routeIs('requete')]);
                break;
           
            case "url":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->url()]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>$request->fullUrl()]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>$request->fullUrlWithQuery(['type' => 'phone'])]);
                break;
           
            case "hote":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->http()]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>$request->httpHost()]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>$request->schemeAndHttpHost()]);
                break;
           
            case "method":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->method()]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>$request->isMethod('post')()]);
                break;
           
            case "en-tete":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->header('X-Header-Name')]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>$request->header('X-Header-Name','default')]);
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->bearerToken()]);
                
                break;
           
            case "ip":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->ip()]);
                break;
           
            case "negociation":
                return view('afficher',["img"=>$request->input('requete'),"value"=>implode($request->getAcceptableContentTypes())]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>implode($request->accepts(['text/html', 'application/json']))]);
                return view('afficher',["img"=>$request->input('requete'),"value"=>implode($request->expectsJson())]);
                break;
           
            case "psr-7":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->input('requete')]);
                break;
           

            //inputs

            case "psr-7":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->all()]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>$request->collect()]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>collect('users')->each(function ($user) {
                //     // ...
                // })]);
                break;
           
            case "value":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->input('name', 'Mehdi')]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>$request->input('products.0.name')]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>$request->input('products.*.name')]);
                break;
           
            case "chaine":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->query('nom')]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>$request->query('name', 'Mehdi')]);
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->query()]);
                
                break;
           
            case "json":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->input('user.name')]);
                break;
           
            case "string":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->string('name')->trim()]);
                break;
           
            case "bool":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->boolean('archived')]);
                break;
           
            case "date":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->date('birthday')]);
                // return view('afficher',["img"=>$request->input('requete'),"value"=>$request->date('elapsed', '!H:i', 'Europe/Madrid')]);
                break;
           
            case "enum":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->enum('status', Status::class)]);
                break;

                case "dynamic":
                    return view('afficher',["img"=>$request->input('requete'),"value"=>$request->name]);
                    break;
           
            case "protion":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->only(['username', 'password'])]);
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->only('username', 'password')]);
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->except(['credit_card'])]);
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->except('credit_card')]);
                break;

           
            case "present":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->has('name')]);
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->has(['name', 'email'])]);
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->whenHas('name', function ($input) {
                    // The "name" value is present...
                }, function () {
                    // The "name" value is not present...
                })]);


                break;
            case "dynamic":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->$request->name]);
                break;
            case "dynamic":
                return view('afficher',["img"=>$request->input('requete'),"value"=>$request->$request->name]);
                break;
           
            
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
