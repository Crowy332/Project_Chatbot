<?php
namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */

    public function handle()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
    }


    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {

    }

}
