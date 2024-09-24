<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionGroups = [
            'fund-category' => ['fund-category-add', 'fund-category-edit', 'fund-category-delete'],
            'expense-category' => ['expense-category-add', 'expense-category-edit', 'expense-category-delete'],
            'income-category' => ['income-category-add', 'income-category-edit', 'income-category-delete'],
            // Add more groups and sub-permissions as needed
        ];

        // Create parent and sub-permissions
        foreach ($permissionGroups as $parent => $children) {
            // Create the parent permission if it doesn't exist
            if (!Permission::where('name', $parent)->exists()) {
                Permission::create(['name' => $parent]);
            }

            // Create child permissions and relate them to the parent
            foreach ($children as $child) {
                if (!Permission::where('name', $child)->exists()) {
                    Permission::create(['name' => $child]);
                }
            }
        }
    }
}
