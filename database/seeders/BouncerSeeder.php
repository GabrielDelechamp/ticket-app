<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Bouncer;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bouncer::allow('admin')->to('ticket-create');
        Bouncer::allow('admin')->to('ticket-retrieve');
        Bouncer::allow('admin')->to('ticket-update');
        Bouncer::allow('admin')->to('ticket-delete');
        Bouncer::allow('admin')->to('ticket-assign');

        Bouncer::allow('client')->to('ticket-create');
        Bouncer::allow('client')->to('ticket-retrieve');
        Bouncer::allow('client')->to('ticket-update');
        Bouncer::allow('client')->to('ticket-delete');

        Bouncer::allow('dev')->to('ticket-retrieve');
    }
}
