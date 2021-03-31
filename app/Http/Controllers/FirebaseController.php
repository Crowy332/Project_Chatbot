<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;


class FirebaseController extends Controller
{
    // -------------------- [ Insert Data ] ------------------
    public function index() {

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();

        $database   =   $firebase->getDatabase();

        $createPost1    =   $database

        ->getReference('blog/posts')
        ->push([
            'title' =>  'Laravel 6',
            'body'  =>  'This is really a cool database that is managed in real time.'

        ]);

        echo '<pre>';
        print_r($createPost1->getvalue());
        echo '</pre>';

    }

    // --------------- [ Listing Data ] ------------------
    public function getData() {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
            /*$reference = $db->getReference('LED/');
            $snapshot = $reference->getSnapshot();
            $value =  $snapshot->numChildren();*/
        return view('test',compact(['db']));


            dd($value);
            //return $value;



/*



        $database   =   $firebase->getDatabase();
        $createPost    =   $database->getReference('blog/posts')->getvalue();
        //$test =  array($createPost);
        return($createPost);
        //return view('test',compact(['test']));
        */
    }
}
