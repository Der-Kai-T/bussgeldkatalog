<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            "admin.user",
            "admin.configuration",
            "legal_field.read",
            "legal_field.write",
            "law.read",
            "law.write",
            "allegation.read",
            "allegation.write",
            "export.pdf",
            "export.csv"
        ];

        foreach($permissions as $permission) {
            Permission::createOrFirst([
                "name" => $permission,
                "guard_name" => "web",
            ]);
        }
    }
}
