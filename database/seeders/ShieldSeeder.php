<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":[
        "view_page","view_any_page","create_page","update_page","restore_page","restore_any_page","replicate_page","reorder_page","delete_page","delete_any_page","force_delete_page","force_delete_any_page",
        "view_section","view_any_section","create_section","update_section","reorder_section","delete_section","delete_any_section",
        "view_role","view_any_role","create_role","update_role","delete_role","delete_any_role",
        "view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user",
        "view_portfolio","view_any_portfolio","create_portfolio","update_portfolio","restore_portfolio","restore_any_portfolio","replicate_portfolio","reorder_portfolio","delete_portfolio","delete_any_portfolio","force_delete_portfolio","force_delete_any_portfolio",
        "view_item","view_any_item","create_item","update_item","reorder_item","delete_item","delete_any_item",
        "view_client","view_any_client","create_client","update_client","restore_client","restore_any_client","replicate_client","reorder_client","delete_client","delete_any_client","force_delete_client","force_delete_any_client",
        "view_contact","view_any_contact","create_contact","update_contact","restore_contact","restore_any_contact","replicate_contact","reorder_contact","delete_contact","delete_any_contact","force_delete_contact","force_delete_any_contact",
        "view_service","view_any_service","create_service","update_service","restore_service","restore_any_service","replicate_service","reorder_service","delete_service","delete_any_service","force_delete_service","force_delete_any_service",
        "view_package","view_any_package","create_package","update_package","restore_package","restore_any_package","replicate_package","reorder_package","delete_package","delete_any_package","force_delete_package","force_delete_any_package",
        "view_feature","view_any_feature","create_feature","update_feature","restore_feature","restore_any_feature","replicate_feature","reorder_feature","delete_feature","delete_any_feature","force_delete_feature","force_delete_any_feature",
        "view_blocked_date","view_any_blocked_date","create_blocked_date","update_blocked_date","reorder_blocked_date","delete_blocked_date","delete_any_blocked_date",
        "view_question","view_any_question","create_question","update_question","restore_question","restore_any_question","replicate_question","reorder_question","delete_question","delete_any_question","force_delete_question","force_delete_any_question",
        "view_setting","view_any_setting","create_setting","update_setting","restore_setting","restore_any_setting","replicate_setting","reorder_setting","delete_setting","delete_any_setting","force_delete_setting","force_delete_any_setting"
        ]}]';
        $directPermissions    = '';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (!blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name'       => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (!blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn($permission) => $permissionModel::firstOrCreate([
                            'name'       => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (!blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name'       => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
