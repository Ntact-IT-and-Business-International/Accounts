<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserType;

class UsertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Director1','Director2','Tech','Salesperson','Receptionist','Cleaner'
            ];
            for($i=0; $i < count($types); $i++){
            $type = new UserType();
            if(UserType::where("id",$i)->exists()){
            $type->id = $i+1;
            }
            else{
            $type->id = $i;
            } 
            $type->type=$types[$i];
            $type->save();
        }
    }
}
