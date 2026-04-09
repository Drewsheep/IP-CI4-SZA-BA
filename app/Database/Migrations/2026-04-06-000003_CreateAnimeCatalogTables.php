<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnimeCatalogTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug', 'genres_slug_unique');
        $this->forge->addUniqueKey('name', 'genres_name_unique');
        $this->forge->createTable('genres', true);

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'original_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'synopsis' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'poster_image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'TV',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'Finished',
            ],
            'studio' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'aired_from' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'aired_to' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'duration' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'quality' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'HD',
            ],
            'episode_current' => [
                'type'       => 'SMALLINT',
                'constraint' => 5,
                'unsigned'   => true,
                'null'       => true,
            ],
            'episode_total' => [
                'type'       => 'SMALLINT',
                'constraint' => 5,
                'unsigned'   => true,
                'null'       => true,
            ],
            'views_count' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'comments_count' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'score' => [
                'type'       => 'DECIMAL',
                'constraint' => '4,2',
                'null'       => true,
            ],
            'score_count' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'rating_avg' => [
                'type'       => 'DECIMAL',
                'constraint' => '3,1',
                'null'       => true,
            ],
            'rating_count' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug', 'animes_slug_unique');
        $this->forge->addKey('title');
        $this->forge->addKey('views_count');
        $this->forge->addKey('score');
        $this->forge->createTable('animes', true);

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'anime_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
            'genre_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('anime_id');
        $this->forge->addKey('genre_id');
        $this->forge->addUniqueKey(['anime_id', 'genre_id'], 'anime_genres_unique_pair');
        $this->forge->addForeignKey('anime_id', 'animes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('genre_id', 'genres', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('anime_genres', true);
    }

    public function down()
    {
        $this->forge->dropTable('anime_genres', true);
        $this->forge->dropTable('animes', true);
        $this->forge->dropTable('genres', true);
    }
}
