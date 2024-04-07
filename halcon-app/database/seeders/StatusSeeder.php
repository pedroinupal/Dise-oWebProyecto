<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = new status;
        $status->show_to_role_id = NULL;
        $status->status = "ORDERED";
        $status->save();

        $status = new status;
        $status->show_to_role_id = NULL;
        $status->status = "IN PROCESS";
        $status->save();

        $status = new status;
        $status->show_to_role_id = NULL;
        $status->status = "IN ROUTE";
        $status->save();

        $status = new status;
        $status->show_to_role_id = NULL;
        $status->status = "DELIVERED";
        $status->save();


    }
}
