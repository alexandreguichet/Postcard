<?php

namespace Database\Seeders;

use App\Models\Ta;
use Database\Factories\BookmarkFactory;
use Illuminate\Database\Seeder;

use Database\Factories\PostcardFactory;
use Database\Factories\CommentFactory;
use Database\Factories\LikeFactory;
use Database\Factories\GroupFactory;
use Database\Factories\TAFactory;
use Database\Factories\TeacherFactory;
use Database\Factories\StudentFactory;
use Database\Factories\AssignmentFactory;
use Database\Factories\NotificationFactory;
use Database\Factories\UserHasFactory;

use PDO;

class DatabaseSeeder extends Seeder
{

    private $pdo;
    /**
     * Seed the application's database.
     *
     * Use 'php artisan migrate:fresh --seed' to run database creation-seeding
     *
     * @return void
     */
    public function run()
    {
        //Create tables
        PostcardFactory::createTable();
        CommentFactory::createTable();
        LikeFactory::createTable();
        GroupFactory::createTable();
        StudentFactory::createTable();
        AssignmentFactory::createTable();
        TAFactory::createTable();
        TeacherFactory::createTable();
        BookmarkFactory::createTable();
        NotificationFactory::createTable();
        UserHasFactory::createTable();

        //Add foreign constraints
        PostcardFactory::alterTable();
        CommentFactory::alterTable();
        LikeFactory::alterTable();
        BookmarkFactory::alterTable();
        NotificationFactory::alterTable();
        UserHasFactory::alterTable();

        //Seed values
        StudentFactory::seedTable();
        AssignmentFactory::seedTable();
        TeacherFactory::seedTable();
        TAFactory::seedTable();
    }
}
