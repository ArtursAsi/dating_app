<?php

use App\Gallery;
use Illuminate\Database\Seeder;

class GallerySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Gallery::class,250)->create();
    }
}
