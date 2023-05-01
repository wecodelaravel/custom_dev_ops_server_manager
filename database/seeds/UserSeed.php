<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Phillip Madsen', 'email' => 'wecodelaravel@gmail.com', 'password' => '$2y$10$jso4F5R.WzgrQN.VUOKg4uPue8NQtKESlC.Ag9o27vf3kIcvEnq2m', 'remember_token' => '', 'approved' => 1,],
            ['id' => 2, 'name' => 'Mark Hurst', 'email' => 'mark.hurst@sling.com', 'password' => '$2y$10$07bFWPBr2VCqaKr3a83GEugYilR3dmKyfO5gvqzQczsI95vFxs21K', 'remember_token' => null, 'approved' => 1,],
            ['id' => 3, 'name' => 'Drew Major', 'email' => 'drew.major@sling.com', 'password' => '$2y$10$.DYxXbIQ.A4EN7qHxTnCGO5dEcgcGraeKDsBhO4yrsgsb1MUSeiHO', 'remember_token' => null, 'approved' => 1,],
            ['id' => 4, 'name' => 'Adam Harral', 'email' => 'adam.harral@sling.com', 'password' => '$2y$10$ruGseX5INYZJ8M88uoLueuMHzv99rIBK96bwUFevZXUZ3QLO3JuSS', 'remember_token' => null, 'approved' => 1,],
            ['id' => 5, 'name' => 'Jorg Nonnenmacher', 'email' => 'jorg.nonnenmacher@sling.com', 'password' => '$2y$10$IjKPUboU0Ubd4BD//Xy5EurO67DhmF84iJYAawsxNe2y1vxrLW6ka', 'remember_token' => null, 'approved' => 1,],
            ['id' => 6, 'name' => 'Katie Stankiewicz', 'email' => 'katie.stankiewicz@sling.com', 'password' => '$2y$10$hMdlKhnfBR.sPSS0ut1.UOa0Qp2bMgwVXzUQVuHm.LnFBZTD9bMSG', 'remember_token' => null, 'approved' => 1,],
            ['id' => 7, 'name' => 'manager', 'email' => 'manager@manage.com', 'password' => '$2y$10$D91YlIqXdGWnjewGLoWkze81f/syAiMK6qPd1o7/VsNXf/fv7eUBm', 'remember_token' => null, 'approved' => 1,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
