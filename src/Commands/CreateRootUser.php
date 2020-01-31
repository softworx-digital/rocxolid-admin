<?php

namespace Softworx\RocXolid\Admin\Commands;

use Hash;
use Illuminate\Console\Command;
use Softworx\RocXolid\UserManagement\Models\User;

/**
 * Command to create the first (root) user for rocXolid based applications.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 *
 * @todo input validation
 */
class CreateRootUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rx:user:create-root';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates root user for rocXolid based application';

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
        try {
            if (User::first()) {
                throw new \RuntimeException('Users table not empty');
            }

            $email = $this->ask('e-mail:');
            $password = $this->ask('Password:');

            $user = User::create([
                'name' => 'Root',
                'email' => $email,
                'password' => $password,
            ]);

            $user->save();
        } catch (\Throwable $e) {
            $this->error($e->getMessage());
        }
    }
}
