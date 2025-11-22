<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user interactively';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('===========================================');
        $this->info('    Create New Admin User');
        $this->info('===========================================');
        $this->newLine();

        // Ask for name
        $name = $this->ask('Admin name');
        if (empty($name)) {
            $this->error('Name is required!');
            return Command::FAILURE;
        }

        // Ask for email
        $email = $this->ask('Admin email');
        
        // Validate email
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first('email'));
            return Command::FAILURE;
        }

        // Ask for password (hidden)
        $password = $this->secret('Admin password (min 8 characters)');
        
        if (strlen($password) < 8) {
            $this->error('Password must be at least 8 characters!');
            return Command::FAILURE;
        }

        // Confirm password
        $passwordConfirmation = $this->secret('Confirm password');
        
        if ($password !== $passwordConfirmation) {
            $this->error('Passwords do not match!');
            return Command::FAILURE;
        }

        // Create the admin user
        try {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'email_verified_at' => now(), // Auto-verify email
            ]);

            $this->newLine();
            $this->info('✓ Admin user created successfully!');
            $this->newLine();
            $this->line('Name:  ' . $user->name);
            $this->line('Email: ' . $user->email);
            $this->newLine();
            $this->info('You can now login with these credentials.');

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Error creating admin user: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
