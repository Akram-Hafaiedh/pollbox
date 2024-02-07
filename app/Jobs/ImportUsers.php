<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use League\Csv\Reader;
use App\Models\User;

class ImportUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected string $file)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        dd('import users job');

        $csv = Reader::createFromPath($this->file);

        $csv->setHeaderOffset(0);

        $users = $csv->getRecords();

        foreach ($users as $user) {

            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password']),
                'mobile_number' => $user['mobile_number'],
                'role' => 'user',
                'admin_id' => auth()->user()->id,
            ]);
        }

        // $path = $request->file('csv_file')->getRealPath();
        // $data = array_map('str_getcsv', file($path));
        // dd($data);
        // foreach ($data as $row) {
        //     User::create([
        //         'name' => $row[0],
        //         'email' => $row[1],
        //         'password' => <PASSWORD>($row[2]),
        //     ]);
        // }
    }
}
