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
            'dashboard' => [],
            'client' => [],
            'setting' => [],
            'send-email' => [],
            'send-sms' => [],
            'application' => ['application-update'],
            'project' => ['project-create', 'project-edit', 'project-delete'],
            'division' => ['division-create', 'division-edit', 'division-delete'],
            'location' => ['location-create', 'location-edit', 'location-delete'],
            'primary-client' => ['primary-client-create', 'primary-client-edit', 'primary-client-delete'],
            'contact-client' => ['contact-client-edit', 'contact-client-delete'],
            'wanted-client' => ['wanted-client-edit', 'wanted-client-delete'],
            'non-prospective-client' => ['non-prospective-client-edit', 'non-prospective-client-delete'],
            'change-client-status' => ['add-to-contact-client', 'add-to-primary-client', 'add-to-wanted-client', 'add-to-non-prospective-client'],
            'conversation' => ['conversation-create', 'conversation-edit','conversation-delete','view-conversation'],
            'user' => ['user-create', 'user-edit','user-delete'],
            'role' => ['role-create', 'role-edit','role-delete'],
            'district' => ['district-create', 'district-edit','district-delete'],
            'service-category' => ['service-category-create', 'service-category-edit','service-category-delete'],
            'service-category' => ['service-category-create', 'service-category-edit','service-category-delete'],
            'our-client' => ['our-client-create', 'our-client-edit','our-client-delete'],
            'client' => ['client-create', 'client-edit','client-delete'],
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
