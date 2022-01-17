<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'     => 'Juan Martinez',
            'email'    => 'j@admin.com',
            'password' => bcrypt('123456')
        ]);
        
        \App\Models\Role::create(['name' => 'Admin']);
        \App\Models\Role::create(['name' => 'User']);

        $admin = \App\Models\User::latest()->first();
        $admin->roles()->attach(1);



        \App\Models\Product::factory(10)->create();
        
        \App\Models\Category::create(['name' => 'Scientists']);
        \App\Models\Category::create(['name' => 'Literature']);
        
        $categories = \App\Models\Category::all();

        \App\Models\Product::all()->each(function($product) use ($categories){
            $product->categories()->attach(
                $categories->random(1)->pluck('id')
            );
        });
    }
}
