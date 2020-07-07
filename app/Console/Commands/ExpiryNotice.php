<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Project;
// use App\Client;
use DateTime;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendExpiryNotice;

class ExpiryNotice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Expiry:notice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check projects close to the date of renewal';

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
        $projects_to_notify = [];
        $due_days = [];

        $projects = Project::all();
        foreach($projects as $project){
            $due_date = new DateTime($project->next_due_date);
            $today = new DateTime(date('Y-m-d'));
            $date_diff = $due_date->diff($today);
            $date_diff_to_int =  $date_diff->format('%a');
            if($date_diff_to_int >= 0 && $date_diff_to_int <= 60){
                $projects_to_notify[]=$project->id;
                $due_days = $date_diff_to_int;
                Mail::to([$project->clients->email, 'akinnuoyetolulope@gmail.com'])->send(new SendExpiryNotice($project, $due_days));

                // Mail::to($project->clients->email)->send(new SendExpiryNotice($project));
                // Mail::to('myvisionisvalid@gmail.com')->send(new SendExpiryNotice($project));
            }
        }

        return;// $projects_to_notify;

    }

}
