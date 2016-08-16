<?php

namespace App\Console\Commands;
use App\postal;
Use App\customers;
use Illuminate\Console\Command;
use File;
use DB;
use Storage;
use Mail;
use Log;
use Illuminate\Database\Eloquent\Model;

class mailbox extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailbox';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check JSON files in directory';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
Log::info('CRON START LOGGED');

$path = base_path('mailbox');
$list = File::files($path);

count($list);

if ($list>0){
   foreach (File::files($path) as $p){

Log::info('CRON P START LOGGED');

       $contents = File::get($p);
       $boxes = json_decode($contents,TRUE);

       foreach($boxes as $box){
           $number = $box['box'];
           $date = $box['date'];
           $time = $box['time'];
       } 
        
       //$company = App\customers::where('box', $number);

       //dd($company);
       $d = DB::table('customers')->where('box', $number)->get();


           foreach ($d as $e) {
    $name=$e->business;
    $email=$e->email;
    $id=$e->id;

           }

       

        $post = new postal;
        
        $post->email = $email;
        $post->business = $name;
        $post->date = $date;
        $post->time = $time;
        $post->items = 1;
        
        //save
        $post->save();
$d = array( 'email' => $email, 'business' => $name );

        Mail::send('emails.auto', ['email' => $d], function ($message) use ($d) {

            $message->from('virtual@officeflexuk.com', 'Office Flex');

            $message->to($d['email'])->subject('Office Flex has mail for you');

        });

       $file = basename($p);
            $new_path= base_path('mailbox_archive/'.$file);
            $old_path= base_path('mailbox/'.$file);

$path11 = storage_path();


        

       File::move($old_path, $new_path);
   
   }


}
    }
}
