<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(NoteTableSeeder::class);
        $this->call(ArtworkTableSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
