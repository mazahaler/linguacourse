<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Constants\Roles;
use Constants\Permissions;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = Role::create(['name' => Roles::USER]);
        $adminRole = Role::create(['name' => Roles::ADMIN]);

        $createUserPermission = Permission::create(['name' => Permissions::CREATE_USER]);
        $editUserPermission = Permission::create(['name' => Permissions::EDIT_USER]);
        $deleteUserPermission = Permission::create(['name' => Permissions::DELETE_USER]);
        $getUserPermission = Permission::create(['name' => Permissions::GET_USER]);
        $getAllUsersPermission = Permission::create(['name' => Permissions::GET_ALL_USERS]);
        $editOwnProfilePermission = Permission::create(['name' => Permissions::EDIT_OWN_PROFILE]);
        $createCoursePermission = Permission::create(['name' => Permissions::CREATE_COURSE]);
        $editCoursePermission = Permission::create(['name' => Permissions::EDIT_COURSE]);
        $editOwnCoursePermission = Permission::create(['name' => Permissions::EDIT_OWN_COURSE]);
        $deleteCoursePermission = Permission::create(['name' => Permissions::DELETE_COURSE]);
        $deleteOwnCoursePermission = Permission::create(['name' => Permissions::DELETE_OWN_COURSE]);
        $getCoursePermission = Permission::create(['name' => Permissions::GET_COURSE]);
        $getAllCoursesPermission = Permission::create(['name' => Permissions::GET_ALL_COURSES]);
        $getTopCoursesPermission = Permission::create(['name' => Permissions::GET_TOP_COURSES]);
        $createUnitPermission = Permission::create(['name' => Permissions::CREATE_UNIT]);
        $editUnitPermission = Permission::create(['name' => Permissions::EDIT_UNIT]);
        $editOwnUnitPermission = Permission::create(['name' => Permissions::EDIT_OWN_UNIT]);
        $deleteUnitPermission = Permission::create(['name' => Permissions::DELETE_UNIT]);
        $deleteOwnUnitPermission = Permission::create(['name' => Permissions::DELETE_OWN_UNIT]);
        $getUnitPermission = Permission::create(['name' => Permissions::GET_UNIT]);
        $getOwnUnitsPermission = Permission::create(['name' => Permissions::GET_OWN_UNITS]);
        $getAllUnitsPermission = Permission::create(['name' => Permissions::GET_ALL_UNITS]);
        $createTaskPermission = Permission::create(['name' => Permissions::CREATE_TASK]);
        $createOwnTaskPermission = Permission::create(['name' => Permissions::CREATE_OWN_TASK]);
        $editTaskPermission = Permission::create(['name' => Permissions::EDIT_TASK]);
        $editOwnTaskPermission = Permission::create(['name' => Permissions::EDIT_OWN_TASK]);
        $deleteTaskPermission = Permission::create(['name' => Permissions::DELETE_TASK]);
        $deleteOwnTaskPermission = Permission::create(['name' => Permissions::DELETE_OWN_TASK]);
        $getTaskPermission = Permission::create(['name' => Permissions::GET_TASK]);
        $getOwnTasksPermission = Permission::create(['name' => Permissions::GET_OWN_TASKS]);
        $getAllTasksPermission = Permission::create(['name' => Permissions::GET_ALL_TASKS]);
        $attachRolePermission = Permission::create(['name' => Permissions::ATTACH_ROLE]);
        $attachPermissionPermission = Permission::create(['name' => Permissions::ATTACH_PERMISSION]);

        $userRolePermissions = [
            $getUserPermission,
            $editOwnProfilePermission,
            $createCoursePermission,
            $editOwnCoursePermission,
            $deleteOwnCoursePermission,
            $getCoursePermission,
            $getTopCoursesPermission,
            $createUnitPermission,
            $editOwnUnitPermission,
            $deleteOwnUnitPermission,
            $getOwnUnitsPermission,
            $getUnitPermission,
            $createOwnTaskPermission,
            $editOwnTaskPermission,
            $deleteOwnTaskPermission,
            $getTaskPermission,
        ];

        $adminRolePermissions = array_merge($userRolePermissions, [
            $createUserPermission,
            $editUserPermission,
            $deleteUserPermission,
            $getAllUsersPermission,
            $editCoursePermission,
            $deleteCoursePermission,
            $getAllCoursesPermission,
            $createTaskPermission,
            $editTaskPermission,
            $deleteTaskPermission,
            $getAllTasksPermission,
            $attachRolePermission,
            $attachPermissionPermission,
            $editUnitPermission,
            $deleteUnitPermission,
            $getAllUnitsPermission,
            $getOwnTasksPermission,
        ]);

        $userRole->syncPermissions($userRolePermissions);

        $adminRole->syncPermissions($adminRolePermissions);
    }
}
