<?php

namespace App\Console\Commands;

use App\Models\GeoDistrict;
use App\Models\GeoDivision;
use App\Models\GeoUnion;
use App\Models\GeoUpazila;
use App\Models\Registration;
use App\User;
use Illuminate\Console\Command;

class GenerateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $registrations = Registration::orderBy('payment', 'desc')->get();
        foreach ($registrations as $registration) {
            $old_user = User::where('email', json_decode($registration->data)->player_mobile)->first();
            $password = substr(json_decode($registration->data)->player_mobile, -6);
            if (empty($old_user)) {
                $data = [
                    'name' => $registration->name,
                    'email' => json_decode($registration->data)->player_mobile,
                    'password' => bcrypt($password),
                    'approved' => ($registration->payment && $registration->approved) ? 1 : 0,
                    'type' => 1,
                    'phone' => json_decode($registration->data)->player_mobile,
                    'image' => $registration->image,
                    'geo_division_id' => GeoDivision::where('name_bng', json_decode($registration->data)
                        ->geo_division_id)->first()->id,
                    'geo_district_id' =>  GeoDistrict::where('name_bng', json_decode($registration->data)
                        ->geo_district_id)->first()->id,
                    'geo_upazila_id' =>  GeoUpazila::where('name_bng', json_decode($registration->data)
                        ->geo_upazila_id)->first()->id,
                    'geo_union_id' =>  GeoUnion::where('name_bng', json_decode($registration->data)
                        ->geo_union_id)->first() ? GeoUnion::where('name_bng', json_decode($registration->data)
                        ->geo_union_id)->first()->id : null,
                ];
                $user = User::create($data);
            } else {
                $user = $old_user;
            }
            Registration::find($registration->id)->update([
                'user_id' => $user->id,
                'temp_password' => $password,
            ]);
        }
    }
}
