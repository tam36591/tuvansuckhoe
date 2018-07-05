<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_administrator = Role::where('name', 'administrator')->first();
        $role_editor = Role::where('name', 'editor')->first();
        $role_author = Role::where('name', 'author')->first();

        $administrator = new User();
        $administrator->name = 'Administrator Name';
        $administrator->email = 'manager@example.com';
        $administrator->password = bcrypt('secret');
        $administrator->save();
        $administrator->roles()->attach($role_administrator);

        $editor = new User();
        $editor->name = 'Editor Name';
        $editor->email = 'editor@example.com';
        $editor->password = bcrypt('secret');
        $editor->save();
        $editor->roles()->attach($role_editor);

        $author = new User();
        $author->name = 'Author Name';
        $author->email = 'author@example.com';
        $author->password = bcrypt('secret');
        $author->save();
        $author->roles()->attach($role_author);

        /*factory(App\Models\User::class, 10)
            ->create()
            ->each(function ($u) {
                $u->posts()->save(factory(App\Models\Post::class)->make());
            });*/
    }
}
