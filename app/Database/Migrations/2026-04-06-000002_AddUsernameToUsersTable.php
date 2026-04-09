<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsernameToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
                'after'      => 'name',
            ],
        ]);

        $users = $this->db->table('users')
            ->select('id, name, email')
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();

        $used = [];

        foreach ($users as $user) {
            $base     = $this->sanitizeUsername((string) ($user['name'] ?: $user['email']));
            $username = $this->makeUniqueUsername($base, $used);

            $this->db->table('users')
                ->where('id', $user['id'])
                ->update(['username' => $username]);
        }

        $this->forge->modifyColumn('users', [
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => false,
            ],
        ]);

        $this->forge->addUniqueKey('username', 'users_username_unique');
        $this->forge->processIndexes('users');
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'username');
    }

    private function sanitizeUsername(string $value): string
    {
        $value = trim(mb_strtolower($value));
        $transliterated = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value);

        if ($transliterated !== false) {
            $value = $transliterated;
        }

        $value = preg_replace('/[^a-z0-9]+/', '_', $value) ?? '';
        $value = trim($value, '_');
        $value = substr($value, 0, 30);

        return $value !== '' ? $value : 'user';
    }

    private function makeUniqueUsername(string $base, array &$used): string
    {
        $candidate = $base;
        $suffix    = 2;

        while (isset($used[$candidate])) {
            $suffixText = '_' . $suffix;
            $candidate  = substr($base, 0, max(1, 30 - strlen($suffixText))) . $suffixText;
            $suffix++;
        }

        $used[$candidate] = true;

        return $candidate;
    }
}
