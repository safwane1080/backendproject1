<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Faq;
use App\Models\User;
use App\Models\Contact;
use App\Models\Profile;
use App\Models\News;
use App\Models\SuggestedFaq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Voeg de admin-gebruiker toe
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'usertype' => 'admin',
            'phone' => null,  
            'email_verified_at' => now(),
            'password' => Hash::make('Password!321'),
        ]);

        // Voeg de testgebruiker toe (optioneel)
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'usertype' => 'user',
            'phone' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        // Voeg een profiel toe voor de gebruiker
        Profile::create([
            'user_id' => $user->id,
            'username' => 'testuser',
            'birthday' => null,
            'profile_photo' => 'path/to/photo.jpg',
            'about_me' => 'Hello, I am a test user.',
        ]);

        // Voeg categorieën toe
        Category::create([
            'name' => 'General',
        ]);

        Category::create([
            'name' => 'Technology',
        ]);

        // Voeg FAQ's toe
        Faq::create([
            'question' => 'What is Laravel?',
            'answer' => 'Laravel is a PHP framework for building web applications.',
            'category_id' => 1,
        ]);

        Faq::create([
            'question' => 'How to install Laravel?',
            'answer' => 'You can install Laravel via Composer.',
            'category_id' => 2,
        ]);

        // Voeg contactberichten toe
        Contact::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'I am interested in your services.',
            'reply' => null,  
        ]);

        Contact::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'message' => 'I have a question about your products.',
            'reply' => 'Thank you for your message. We will get back to you soon.',
        ]);

        // Voeg nieuwsitems toe
        News::create([
            'title' => 'New Feature Released',
            'image' => 'path/to/image.jpg',
            'content' => 'We are excited to announce a new feature for our website.',
            'publication_date' => now(),
        ]);

        News::create([
            'title' => 'System Maintenance Scheduled',
            'image' => 'path/to/image.jpg',
            'content' => 'Our system will undergo scheduled maintenance tomorrow from 2 AM to 4 AM.',
            'publication_date' => now(),
        ]);

        // Voeg voorgestelde FAQ's toe
        SuggestedFaq::create([
            'user_id' => $user->id,
            'question' => 'How do I reset my password?',
            'status' => 'pending',
        ]);

        SuggestedFaq::create([
            'user_id' => $user->id,
            'question' => 'How can I contact support?',
            'status' => 'approved',
        ]);
    }
}
