<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

	$user = DB::table('users')->insert([
		'email' => "admin@maclean.com",
		'name' => 'admin',
		'password' => bcrypt('admin'),
	]);

	$role = DB::table('roles')->insert([
		'name' => "Administrator",
	]);

	$user = \App\User::first();
	$role = Role::first();

	$user->assignRole($role);

	DB::table('website_informations')->insert([

		'welcome_text' => "Lorem ipsum dolor sit amet",
		'about_me' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae mi nibh. Donec eget massa vehicula lorem elementum dictum quis accumsan neque. Nam a aliquam mauris, et lacinia sapien. Phasellus bibendum est in urna malesuada, quis tincidunt lorem hendrerit. Morbi dapibus odio ante, sed lacinia mauris ultrices volutpat. Curabitur consequat tellus ut aliquam efficitur. Mauris nec justo tortor. Sed pharetra elementum quam non sollicitudin. Sed sit amet magna cursus, semper purus sit amet, rhoncus sapien. Nunc libero purus, gravida quis nibh a, pretium gravida nulla.',
		'projects_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae mi nibh. Donec eget massa vehicula lorem elementum dictum quis accumsan neque. Nam a aliquam mauris, et lacinia sapien. Phasellus bibendum est in urna malesuada, quis tincidunt lorem hendrerit. Morbi dapibus odio ante, sed lacinia mauris ultrices volutpat. Curabitur consequat tellus ut aliquam efficitur. Mauris nec justo tortor. Sed pharetra elementum quam non sollicitudin. Sed sit amet magna cursus, semper purus sit amet, rhoncus sapien. Nunc libero purus, gravida quis nibh a, pretium gravida nulla.',
		'team_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae mi nibh. Donec eget massa vehicula lorem elementum dictum quis accumsan neque. Nam a aliquam mauris, et lacinia sapien. Phasellus bibendum est in urna malesuada, quis tincidunt lorem hendrerit. Morbi dapibus odio ante, sed lacinia mauris ultrices volutpat. Curabitur consequat tellus ut aliquam efficitur. Mauris nec justo tortor. Sed pharetra elementum quam non sollicitudin. Sed sit amet magna cursus, semper purus sit amet, rhoncus sapien. Nunc libero purus, gravida quis nibh a, pretium gravida nulla.',
		'contact_email' => 'mail_de_ejemplo@mclean.com',
		'contact_phone' => '(+591) 4444444',
		'contact_phone2' => '(+591) 77777777' ,
		'address' => 'Calle Lorem e Ipsum #777' ,
		'about_image' => 'pic01.jpg',
		'menu_image' => 'pic02.jpg',
		'projects_image' => 'pic03.jpg',
		'team_image' => 'pic04.jpg',
		'mclean_image' => 'mclean.jpg'
	]);
    }
}
