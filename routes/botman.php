<?php
use App\Http\Controllers\BotManController;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
$botman = app('botman');
$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $name =  $db->getReference('LED/light5')->getValue();

    $botman->fallback(function($bot){
        $bot->reply("ผมไม่เข้าใจว่าคุณพูดว่าอะไร");
    });

    $botman->hears('เปิดไฟดวงที่1|เปิดไฟดวง1|เปิดไฟทางเดิน|เปิดไฟทางเดินให้หน่อย|เปิดไฟดวงที่1ให้หน่อย|ช่วยเปิดไฟทางเดิน|ช่วยเปิดไฟดวงที่1ให้หน่อย|ช่วยเปิดไฟดวงที่1ให้ที', '\MyBotCommands@Onlight1');
    $botman->hears('ปิดไฟดวงที่1|ปิดไฟดวง1|ปิดไฟทางเดิน|ปิดไฟทางเดินให้หน่อย|ปิดไฟดวงที่1ให้หน่อย|ช่วยปิดไฟทางเดิน|ช่วยปิดไฟดวงที่1ให้หน่อย|ช่วยปิดไฟดวงที่1ให้ที', '\MyBotCommands@Offlight1');
    $botman->hears('เปิดไฟดวงที่2|เปิดไฟดวง2|เปิดไฟห้องน้ำ|เปิดไฟห้องน้ำให้หน่อย|เปิดไฟดวงที่2ให้หน่อย|ช่วยเปิดไฟห้องน้ำ|ช่วยเปิดไฟดวงที่2ให้หน่อย|ช่วยเปิดไฟดวงที่2ให้ที', '\MyBotCommands@Onlight2');
    $botman->hears('ปิดไฟดวงที่2|ปิดไฟดวง2|ปิดไฟห้องน้ำ|ปิดไฟห้องน้ำให้หน่อย|ปิดไฟดวงที่2ให้หน่อย|ช่วยปิดไฟห้องน้ำ|ช่วยปิดไฟดวงที่2ให้หน่อย|ช่วยปิดไฟดวงที่2ให้ที', '\MyBotCommands@Offlight2');
    $botman->hears('เปิดไฟดวงที่3|เปิดไฟดวง3|เปิดไฟห้องนอน|เปิดไฟห้องนอนให้หน่อย|เปิดไฟดวงที่3ให้หน่อย|ช่วยเปิดไฟห้องนอน|ช่วยเปิดไฟดวงที่3ให้หน่อย|ช่วยเปิดไฟดวงที่3ให้ที', '\MyBotCommands@Onlight3');
    $botman->hears('ปิดไฟดวงที่3|ปิดไฟดวง3|ปิดไฟห้องนอน|ปิดไฟห้องนอนให้หน่อย|ปิดไฟดวงที่3ให้หน่อย|ช่วยปิดไฟห้องนอน|ช่วยปิดไฟดวงที่3ให้หน่อย|ช่วยปิดไฟดวงที่3ให้ที', '\MyBotCommands@Offlight3');
    $botman->hears('เปิดไฟดวงที่4|เปิดไฟดวง4|เปิดไฟห้องทำงาน|เปิดไฟห้องทำงานให้หน่อย|เปิดไฟดวงที่4ให้หน่อย|ช่วยเปิดไฟทห้องทำงาน|ช่วยเปิดไฟดวงที่4ให้หน่อย|ช่วยเปิดไฟดวงที่4ให้ที', '\MyBotCommands@Onlight4');
    $botman->hears('ปิดไฟดวงที่4|ปิดไฟดวง4|ปิดไฟห้องทำงาน|ปิดไฟห้องทำงานให้หน่อย|ปิดไฟดวงที่4ให้หน่อย|ช่วยปิดไฟห้องทำงาน|ช่วยปิดไฟดวงที่4ให้หน่อย|ช่วยปิดไฟดวงที่4ให้ที', '\MyBotCommands@Offlight4');
    $botman->hears('เปิดไฟดวงที่5|เปิดไฟดวง5|เปิดไฟหน้าบ้าน|เปิดไฟหน้าบ้านให้หน่อย|เปิดไฟดวงที่5ให้หน่อย|ช่วยเปิดไฟหน้าบ้าน|ช่วยเปิดไฟดวงที่5ให้หน่อย|ช่วยเปิดไฟดวงที่5ให้ที', '\MyBotCommands@Onlight5');
    $botman->hears('ปิดไฟดวงที่5|ปิดไฟดวง5|ปิดไฟหน้าบ้าน|ปิดไฟหน้าบ้านให้หน่อย|ปิดไฟดวงที่5ให้หน่อย|ช่วยปิดไฟหน้าบ้าน|ช่วยปิดไฟดวงที่5ให้หน่อย|ช่วยปิดไฟดวงที่5ให้ที', '\MyBotCommands@Offlight5');
    $botman->hears('เปิดประตูหน้าบ้าน|เปิดประตูหน้าบ้านให้หน่อย|เปิดประตูหน้าบ้านให้หน่อย|ช่วยเปิดประตูหน้าบ้านให้หน่อย|ช่วยเปิดประตูหน้าบ้านให้ที|test', '\MyBotCommands@OnDoor1');
    $botman->hears('ปิดประตูหน้า|ปิดประตูหน้าให้หน่อย|ปิดประตูหน้าให้หน่อย|ช่วยปิดประตูหน้า|ช่วยปิดประตูหน้าให้หน่อย|ช่วยปิดประตูหน้าให้ที', '\MyBotCommands@OffDoor1');
    $botman->hears('เปิดประตูหลังบ้าน|เปิดประตูหลังบ้านให้หน่อย|เปิดประตูหลังบ้านให้หน่อย|ช่วยเปิดประตูหลังบ้านให้หน่อย|ช่วยเปิดประตูหลังบ้านให้ที', '\MyBotCommands@OnDoor2');
    $botman->hears('ปิดประตูหลัง|ปิดประตูหลังให้หน่อย|ปิดประตูหลังให้หน่อย|ช่วยปิดประตูหลัง|ช่วยปิดประตูหลังให้หน่อย|ช่วยปิดประตูหลังให้ที', '\MyBotCommands@OffDoor2');
    $botman->hears('เปิดแอร์|เปิดแอร์คอนดิชั่น|เปิดแอร์คอนดิชั่นให้หน่อย|เปิดแอร์คอนดิชั่นให้หน่อย|ช่วยเปิดแอร์คอนดิชั่นให้หน่อย|ช่วยเปิดแอร์คอนดิชั่นให้ที', '\MyBotCommands@OnAir1');
    $botman->hears('ปิดแอร์|ปิดแอร์ให้หน่อย|ปิดแอร์ให้หน่อย|ช่วยปิดแอร์ให้หน่อย|ช่วยปิดแอร์ให้ที', '\MyBotCommands@offAir1');
    class MyBotCommands {
    public function Onlight1($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $db->getReference('LED/light1')->set(1);
        $bot->reply('เปิดไฟทางเดินแล้วครับ');
        return;
    }
    public function Offlight1($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $db->getReference('LED/light1')->set(0);
        $bot->reply('ปิดไฟทางเดินแล้วครับ');
        return;
    }
    public function Onlight2($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $db->getReference('LED/light2')->set(1);
        $bot->reply('เปิดไฟห้องน้ำแล้วครับ');
    }
    public function Offlight2($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $db->getReference('LED/light2')->set(0);
        $bot->reply('ปิดไฟห้องน้ำแล้วครับ');
    }
    public function Onlight3($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $db->getReference('LED/light3')->set(1);
        $bot->reply('เปิดไฟห้องนอนแล้วครับ');
    }
    public function Offlight3($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $db->getReference('LED/light3')->set(0);
        $bot->reply('ปิดไฟห้องนอนแล้วครับ');
    }
    public function Onlight4($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $db->getReference('LED/light4')->set(1);
        $bot->reply('เปิดไฟห้องทำงานแล้วครับ');
    }
    public function Offlight4($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $db->getReference('LED/light4')->set(0);
        $bot->reply('ปิดไฟห้องทำงานแล้วครับ');
    }
    public function Onlight5($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $db->getReference('LED/light5')->set(1);
        $bot->reply('เปิดไฟหน้าบ้านแล้วครับ');
    }
    public function Offlight5($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $db->getReference('LED/light5')->set(0);
        $bot->reply('ปิดไฟหน้าบ้านแล้วครับ');
    }
    public function OnDoor1($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $door =  $db->getReference('Door/Door1')->getValue();
        if ($door == 3 ){
            $db->getReference('Door/Door1')->set(2);
            $bot->reply('เปิดประตูหน้าบ้านแล้วครับ');
        }
        else{
            $bot->reply('ประตูหน้าบ้านเปิดอยู่แล้วครับ');
        }

    }
    public function offDoor1($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $door =  $db->getReference('Door/Door1')->getValue();
        if ($door == 4 ){
            $db->getReference('Door/Door1')->set(1);
            $bot->reply('ปิดประตูหน้าบ้านแล้วครับ');
        }
        else{
            $bot->reply('ประตูหน้าบ้านปิดอยู่แล้วครับ');
        }
    }
    public function OnDoor2($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $door =  $db->getReference('Door/Door2')->getValue();
        if ($door == 3 ){
            $db->getReference('Door/Door2')->set(2);
            $bot->reply('เปิดแอร์คอนดิชั่นแล้วครับ');
        }
        else{
            $bot->reply('ประตูหลังบ้านเปิดอยู่แล้วครับ');
        }
    }
    public function offDoor2($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $door =  $db->getReference('Door/Door2')->getValue();
        if ($door == 4 ){
            $db->getReference('Door/Door2')->set(1);
            $bot->reply('ปิดประตูหลังบ้านแล้วครับ');
        }
        else{
            $bot->reply('ประตูหลังบ้านปิดอยู่แล้วครับ');
        }
    }
    public function OnAir1($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $db->getReference('Fan/air1')->set(1);
        $bot->reply('เปิดแอร์คอนดิชั่นแล้วครับ');
    }
    public function offAir1($bot) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pj-crowy-default-rtdb.firebaseio.com/')
        ->create();
        $db = $firebase->getDatabase();
        $db->getReference('Fan/air1')->set(0);
        $bot->reply('ปิดแอร์แล้วครับ');
    }


}

$botman->listen();
