<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $group = [
            [
                'id' => '1',
                'name' => 'Admin',
                'description' => 'admin',
            ],
            [
                'id' => '2',
                'name' => 'Dosen',
                'description' => 'dosen',
            ],
            [
                'id' => '3',
                'name' => 'Mahasiswa',
                'description' => 'mahasiswa',
            ]
        ];

        $user = [
            [
                'id' => '1',
                'email' => 'admin@pkl.test',
                'username' => 'admin',
                'password_hash' => '$2y$10$gJPGWyQRvQIDIe9UDD1zhu2W9irkNcZYVSaN2uB5L/c/dfg6gpRHW',
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'email' => 'dosen@pkl.test',
                'username' => 'dosen',
                'password_hash' => '$2y$10$gJPGWyQRvQIDIe9UDD1zhu2W9irkNcZYVSaN2uB5L/c/dfg6gpRHW',
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'email' => 'mahasiswa@pkl.test',
                'username' => 'mahasiswa',
                'password_hash' => '$2y$10$gJPGWyQRvQIDIe9UDD1zhu2W9irkNcZYVSaN2uB5L/c/dfg6gpRHW',
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $user_group = [
            [
                'user_id' => 1,
                'group_id' => 1
            ],
            [
                'user_id' => 2,
                'group_id' => 2
            ],
            [
                'user_id' => 3,
                'group_id' => 3
            ]
        ];

        $this->db->table('auth_groups')->insertBatch($group);
        $this->db->table('users')->insertBatch($user);
        $this->db->table('auth_groups_users')->insertBatch($user_group);
    }
}
