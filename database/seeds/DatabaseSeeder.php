<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(GroupSeed::class);
        $this->command->question('Groups table seeded!');
        $this->call(ChannelServerSeed::class);
        $this->command->question('ChannelServers table seeded!');
        $this->call(CountrySeed::class);
        $this->command->question('Country table seeded!');
        $this->call(NotificationServerTypeSeed::class);
        $this->command->question('NotificationServerTypes table seeded!');
        $this->call(VideoServerTypeSeed::class);
        $this->command->question('VideoServers table seeded!');
        $this->call(AggregationServerSeed::class);
        $this->command->question('AggregateSyncServers table seeded!');
        $this->call(ProtocolSeed::class);
        $this->command->question('Protocols table seeded!');
        $this->call(CsiSeed::class);
        $this->command->question('Csis table seeded!');
        $this->call(SyncserverSeed::class);
        $this->command->question('Syncservers table seeded!');
        $this->call(CsoSeed::class);
        $this->command->question('Csos table seeded!');
        $this->call(EnvironmentSeed::class);
        $this->command->question('Environments table seeded!');
        $this->call(RoleConventionSeed::class);
        $this->command->question('RoleConventions table seeded!');
        $this->call(InstanceSeed::class);
        $this->command->question('Instances table seeded!');
        $this->call(PermissionSeed::class);
        $this->command->question('Permissions table seeded!');
        $this->call(RoleSeed::class);
        $this->command->question('Roles table seeded!');
        $this->call(UserSeed::class);
        $this->command->question('Users table seeded!');
        $this->call(UserActionSeed::class);
        $this->command->question('UserActions table seeded!');
        $this->call(RoleSeedPivot::class);
        $this->command->question('Role Pivot table seeded!');
        $this->call(UserSeedPivot::class);
        $this->command->question('User pivot table seeded!');
        $this->call(TimezoneSeed::class);
        $this->command->question('Timezones table seeded!');
        $this->call(StatusSeed::class);
        $this->command->question('Status table seeded!');
        $this->call(FiltersTableSeeder::class);
        $this->command->question('Filters table seeded!');
        $this->call(GroupsTableSeeder::class);
        $this->command->question('Groups table seeded!');
        $this->call(SyncServerFunctionsTableSeeder::class);
        // $this->call(SyncServerFunctionSeed::class);
        $this->command->question('SyncServerFunctions table seeded!');

        // $this->call(InstancesTableSeeder::class);
        // $this->call(HostsTableSeeder::class);
        // $this->call(SyncserversTableSeeder::class);
        // $this->call(AggregationServersTableSeeder::class);
        // $this->call(ChannelServersTableSeeder::class);
    }
}
