<?php

use Illuminate\Database\Seeder;
use App\Profile;
use App\Module;
use App\User;
use App\UserProfile;
use App\ProfileModule;
use App\Role;
use App\RoleUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objProfile = Profile::where('fullname','Systems')->first();
        $objModules = Module::all();
        $objRoles = Role::all();

        $objUserProfile = new UserProfile();
        $objUser = new User();
        $objUser->name='Franco Ramirez';
        $objUser->user='fbill';
        $objUser->dni='09743129';
        $objUser->email = 'franco@dataservicios.com';
        $objUser->password = bcrypt('secret');
        $objUser->save();
        $objUserProfile->profile_id=$objProfile->id;
        $objUserProfile->user_id=$objUser->id;
        $objUserProfile->save();
        foreach ($objModules as $objModule) {
            $objProfileModule = new ProfileModule();
            $objProfileModule->module_id=$objModule->id;
            $objProfileModule->profile_id=$objProfile->id;
            $objProfileModule->save();
        }
        foreach ($objRoles as $objRole) {
            $objRoleUser = new RoleUser();
            $objRoleUser->user_id = $objUser->id;
            $objRoleUser->rol_id= $objRole->id;
            $objRoleUser->save();
        }
    }
}
