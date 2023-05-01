<?php


Route::get('/', function () {
    return redirect('/admin/home');
});

// Authentication Routes...
Route::get('login', ['uses' => 'Auth\LoginController@showLoginForm', 'as' => 'login']);
Route::post('login', ['uses' => 'Auth\LoginController@login', 'as' => 'auth.login']);
Route::post('logout', ['uses' => 'Auth\LoginController@logout', 'as' => 'auth.logout']);

// Change Password Routes...
Route::get('change_password', ['uses' => 'Auth\ChangePasswordController@showChangePasswordForm', 'as' => 'auth.change_password']);
Route::patch('change_password', ['uses' => 'Auth\ChangePasswordController@changePassword', 'as' => 'auth.change_password']);

// Password Reset Routes...
Route::get('password/reset',  ['uses' => 'Auth\ForgotPasswordController@showLinkRequestForm', 'as' => 'auth.password.reset']);
Route::post('password/email',  ['uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail', 'as' => 'auth.password.reset']);
Route::get('password/reset/{token}',  ['uses' => 'Auth\ResetPasswordController@showResetForm', 'as' => 'password.reset']);
Route::post('password/reset',  ['uses' => 'Auth\ResetPasswordController@reset', 'as' => 'auth.password.reset']);

// Registration Routes..
Route::get('register', ['uses' => 'Auth\RegisterController@showRegistrationForm', 'as' => 'register']);
Route::post('register', ['uses' => 'Auth\RegisterController@register', 'as' => 'auth.register']);

Route::group(['middleware' => ['auth', 'approved'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/tuts', ['uses' => 'HomeController@tuts', 'as' => 'tuts']);
    Route::get('/global', ['uses' => 'HomeController@global', 'as' => 'global']);

    Route::get('/reports/note-sure', 'Admin\ReportsController@noteSure');
    Route::get('/reports/channel-servers', 'Admin\ReportsController@channelServers');

    Route::resource('channel_servers', 'Admin\ChannelServersController');
    Route::post('channel_servers_mass_destroy', ['uses' => 'Admin\ChannelServersController@massDestroy', 'as' => 'channel_servers.mass_destroy']);
    Route::post('channel_servers_restore/{id}', ['uses' => 'Admin\ChannelServersController@restore', 'as' => 'channel_servers.restore']);
    Route::delete('channel_servers_perma_del/{id}', ['uses' => 'Admin\ChannelServersController@perma_del', 'as' => 'channel_servers.perma_del']);

    Route::resource('csis', 'Admin\CsisController');
    Route::post('csis/insert', ['uses' => 'Admin\CsisController@insert', 'as' => 'csis.insert']);


    Route::post('csis_mass_destroy', ['uses' => 'Admin\CsisController@massDestroy', 'as' => 'csis.mass_destroy']);
    Route::post('csis_restore/{id}', ['uses' => 'Admin\CsisController@restore', 'as' => 'csis.restore']);
    Route::delete('csis_perma_del/{id}', ['uses' => 'Admin\CsisController@perma_del', 'as' => 'csis.perma_del']);
    Route::resource('csos', 'Admin\CsosController');
    Route::post('csos_mass_destroy', ['uses' => 'Admin\CsosController@massDestroy', 'as' => 'csos.mass_destroy']);
    Route::post('csos_restore/{id}', ['uses' => 'Admin\CsosController@restore', 'as' => 'csos.restore']);
    Route::delete('csos_perma_del/{id}', ['uses' => 'Admin\CsosController@perma_del', 'as' => 'csos.perma_del']);
    Route::get('internal_notifications/read', 'Admin\InternalNotificationsController@read');
    Route::resource('internal_notifications', 'Admin\InternalNotificationsController');
    Route::post('internal_notifications_mass_destroy', ['uses' => 'Admin\InternalNotificationsController@massDestroy', 'as' => 'internal_notifications.mass_destroy']);
    Route::resource('syncservers', 'Admin\SyncserversController');
    Route::post('syncservers_mass_destroy', ['uses' => 'Admin\SyncserversController@massDestroy', 'as' => 'syncservers.mass_destroy']);
    Route::post('syncservers_restore/{id}', ['uses' => 'Admin\SyncserversController@restore', 'as' => 'syncservers.restore']);
    Route::delete('syncservers_perma_del/{id}', ['uses' => 'Admin\SyncserversController@perma_del', 'as' => 'syncservers.perma_del']);
    Route::resource('channels', 'Admin\ChannelsController');
    Route::post('channels_mass_destroy', ['uses' => 'Admin\ChannelsController@massDestroy', 'as' => 'channels.mass_destroy']);
    Route::post('channels_restore/{id}', ['uses' => 'Admin\ChannelsController@restore', 'as' => 'channels.restore']);
    Route::delete('channels_perma_del/{id}', ['uses' => 'Admin\ChannelsController@perma_del', 'as' => 'channels.perma_del']);
    Route::resource('countries', 'Admin\CountriesController');
    Route::post('countries_mass_destroy', ['uses' => 'Admin\CountriesController@massDestroy', 'as' => 'countries.mass_destroy']);
    Route::post('countries_restore/{id}', ['uses' => 'Admin\CountriesController@restore', 'as' => 'countries.restore']);
    Route::delete('countries_perma_del/{id}', ['uses' => 'Admin\CountriesController@perma_del', 'as' => 'countries.perma_del']);
    Route::resource('timezones', 'Admin\TimezonesController');
    Route::post('timezones_mass_destroy', ['uses' => 'Admin\TimezonesController@massDestroy', 'as' => 'timezones.mass_destroy']);
    Route::post('timezones_restore/{id}', ['uses' => 'Admin\TimezonesController@restore', 'as' => 'timezones.restore']);
    Route::delete('timezones_perma_del/{id}', ['uses' => 'Admin\TimezonesController@perma_del', 'as' => 'timezones.perma_del']);
    Route::resource('filters', 'Admin\FiltersController');
    Route::post('filters_mass_destroy', ['uses' => 'Admin\FiltersController@massDestroy', 'as' => 'filters.mass_destroy']);
    Route::post('filters_restore/{id}', ['uses' => 'Admin\FiltersController@restore', 'as' => 'filters.restore']);
    Route::delete('filters_perma_del/{id}', ['uses' => 'Admin\FiltersController@perma_del', 'as' => 'filters.perma_del']);
    Route::resource('video_server_types', 'Admin\VideoServerTypesController');
    Route::post('video_server_types_mass_destroy', ['uses' => 'Admin\VideoServerTypesController@massDestroy', 'as' => 'video_server_types.mass_destroy']);
    Route::post('video_server_types_restore/{id}', ['uses' => 'Admin\VideoServerTypesController@restore', 'as' => 'video_server_types.restore']);
    Route::delete('video_server_types_perma_del/{id}', ['uses' => 'Admin\VideoServerTypesController@perma_del', 'as' => 'video_server_types.perma_del']);
    Route::resource('notification_server_types', 'Admin\NotificationServerTypesController');
    Route::post('notification_server_types_mass_destroy', ['uses' => 'Admin\NotificationServerTypesController@massDestroy', 'as' => 'notification_server_types.mass_destroy']);
    Route::post('notification_server_types_restore/{id}', ['uses' => 'Admin\NotificationServerTypesController@restore', 'as' => 'notification_server_types.restore']);
    Route::delete('notification_server_types_perma_del/{id}', ['uses' => 'Admin\NotificationServerTypesController@perma_del', 'as' => 'notification_server_types.perma_del']);
    Route::resource('protocols', 'Admin\ProtocolsController');
    Route::post('protocols_mass_destroy', ['uses' => 'Admin\ProtocolsController@massDestroy', 'as' => 'protocols.mass_destroy']);
    Route::post('protocols_restore/{id}', ['uses' => 'Admin\ProtocolsController@restore', 'as' => 'protocols.restore']);
    Route::delete('protocols_perma_del/{id}', ['uses' => 'Admin\ProtocolsController@perma_del', 'as' => 'protocols.perma_del']);
    Route::resource('role_conventions', 'Admin\RoleConventionsController');
    Route::post('role_conventions_mass_destroy', ['uses' => 'Admin\RoleConventionsController@massDestroy', 'as' => 'role_conventions.mass_destroy']);
    Route::post('role_conventions_restore/{id}', ['uses' => 'Admin\RoleConventionsController@restore', 'as' => 'role_conventions.restore']);
    Route::delete('role_conventions_perma_del/{id}', ['uses' => 'Admin\RoleConventionsController@perma_del', 'as' => 'role_conventions.perma_del']);
    Route::resource('environments', 'Admin\EnvironmentsController');
    Route::post('environments_mass_destroy', ['uses' => 'Admin\EnvironmentsController@massDestroy', 'as' => 'environments.mass_destroy']);
    Route::post('environments_restore/{id}', ['uses' => 'Admin\EnvironmentsController@restore', 'as' => 'environments.restore']);
    Route::delete('environments_perma_del/{id}', ['uses' => 'Admin\EnvironmentsController@perma_del', 'as' => 'environments.perma_del']);
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'Admin\UserActionsController');
    Route::resource('groups', 'Admin\GroupsController');
    Route::post('groups_mass_destroy', ['uses' => 'Admin\GroupsController@massDestroy', 'as' => 'groups.mass_destroy']);
    Route::post('groups_restore/{id}', ['uses' => 'Admin\GroupsController@restore', 'as' => 'groups.restore']);
    Route::delete('groups_perma_del/{id}', ['uses' => 'Admin\GroupsController@perma_del', 'as' => 'groups.perma_del']);
    Route::resource('instances', 'Admin\InstancesController');
    Route::post('instances_mass_destroy', ['uses' => 'Admin\InstancesController@massDestroy', 'as' => 'instances.mass_destroy']);
    Route::post('instances_restore/{id}', ['uses' => 'Admin\InstancesController@restore', 'as' => 'instances.restore']);
    Route::delete('instances_perma_del/{id}', ['uses' => 'Admin\InstancesController@perma_del', 'as' => 'instances.perma_del']);
    Route::resource('aggregation_servers', 'Admin\AggregationServersController');
    Route::post('aggregation_servers_mass_destroy', ['uses' => 'Admin\AggregationServersController@massDestroy', 'as' => 'aggregation_servers.mass_destroy']);
    Route::post('aggregation_servers_restore/{id}', ['uses' => 'Admin\AggregationServersController@restore', 'as' => 'aggregation_servers.restore']);
    Route::delete('aggregation_servers_perma_del/{id}', ['uses' => 'Admin\AggregationServersController@perma_del', 'as' => 'aggregation_servers.perma_del']);

    Route::resource('hosts', 'Admin\HostsController');
    Route::get('*', ['uses' => 'Admin\HostsController@sidebar']);
    Route::post('hosts_mass_destroy', ['uses' => 'Admin\HostsController@massDestroy', 'as' => 'hosts.mass_destroy']);
    Route::post('hosts_restore/{id}', ['uses' => 'Admin\HostsController@restore', 'as' => 'hosts.restore']);
    Route::delete('hosts_perma_del/{id}', ['uses' => 'Admin\HostsController@perma_del', 'as' => 'hosts.perma_del']);

    Route::resource('statuses', 'Admin\StatusesController');
    Route::post('statuses_mass_destroy', ['uses' => 'Admin\StatusesController@massDestroy', 'as' => 'statuses.mass_destroy']);
    Route::post('statuses_restore/{id}', ['uses' => 'Admin\StatusesController@restore', 'as' => 'statuses.restore']);
    Route::delete('statuses_perma_del/{id}', ['uses' => 'Admin\StatusesController@perma_del', 'as' => 'statuses.perma_del']);

    Route::resource('sync_server_functions', 'Admin\SyncServerFunctionsController');
    Route::post('sync_server_functions_mass_destroy', ['uses' => 'Admin\SyncServerFunctionsController@massDestroy', 'as' => 'sync_server_functions.mass_destroy']);
    Route::post('sync_server_functions_restore/{id}', ['uses' => 'Admin\SyncServerFunctionsController@restore', 'as' => 'sync_server_functions.restore']);
    Route::delete('sync_server_functions_perma_del/{id}', ['uses' => 'Admin\SyncServerFunctionsController@perma_del', 'as' => 'sync_server_functions.perma_del']);

    Route::model('messenger', 'App\MessengerTopic');
    Route::get('messenger/inbox', 'Admin\MessengerController@inbox')->name('messenger.inbox');
    Route::get('messenger/outbox', 'Admin\MessengerController@outbox')->name('messenger.outbox');
    Route::resource('messenger', 'Admin\MessengerController');

    Route::post('csv_parse', 'Admin\CsvImportController@parse')->name('csv_parse');
    Route::post('csv_process', 'Admin\CsvImportController@process')->name('csv_process');

    Route::get('search', 'MegaSearchController@search')->name('mega-search');
});



Route::group(['middleware' => ['web']], function () {
    Route::get('update-dev-channels', 'GuzzleController@getDevData');
    Route::get('update-qa-channels', 'GuzzleController@getQaData');
    Route::get('update-beta-channels', 'GuzzleController@getBetaData');
    Route::get('updateall', 'Admin\ChannelsController@updateall');
});









Route::get('/channels', function() {
    return new \App\Http\Resources\Admin\ChannelsCollection(\App\Channel::all());
});

Route::get('preview/cs/model-cs/{id}',['uses' => 'Admin\ChannelServersController@generateModelChannelServer', 'as' => 'preview.cs.model-cs']);
Route::get('preview/cs/model-channelids/{id}',['uses' => 'Admin\ChannelServersController@generateModelChannelids', 'as' => 'preview.cs.model-channelids']);
Route::get('preview/cs/model-settings/{id}',['uses' => 'Admin\ChannelServersController@generateModelSettings', 'as' => 'preview.cs.model-settings']);

Route::get('preview/cs/channel_server/{id}',['uses' => 'Admin\ChannelServersController@generateChannelServer', 'as' => 'preview.cs.channel_server']);
Route::get('preview/cs/channelids/{id}',['uses' => 'Admin\ChannelServersController@generateChannelids', 'as' => 'preview.cs.channelids']);
Route::get('preview/cs/settings/{id}',['uses' => 'Admin\ChannelServersController@generateSettings', 'as' => 'preview.cs.settings']);

Route::get('preview/as/aggregation_server/{id}',['uses' => 'Admin\AggregationServersController@generateModelAggregationSyncServer', 'as' => 'preview.as.channel_server']);
Route::get('preview/as/channelids/{id}',['uses' => 'Admin\AggregationServersController@generateChannelids', 'as' => 'preview.as.channelids']);
Route::get('preview/as/settings/{id}',['uses' => 'Admin\AggregationServersController@generateSettings', 'as' => 'preview.as.settings']);


Route::get('preview/ss/modal-ss/{id}',['uses' => 'Admin\SyncserversController@generateModalSyncServer', 'as' => 'preview.ss.modal-ss']);
Route::get('preview/ss/modal-channelids/{id}',['uses' => 'Admin\SyncserversController@generateSSModalChannelids', 'as' => 'preview.ss.modal-channelids']);
Route::get('preview/ss/modal-settings/{id}',['uses' => 'Admin\SyncserversController@generateSSModalSettings', 'as' => 'preview.ss.modal-settings']);

Route::get('preview/ss/sync_server/{id}',['uses' => 'Admin\SyncserversController@generateSyncServer', 'as' => 'preview.ss.sync_server']);
Route::get('preview/ss/channelids/{id}',['uses' => 'Admin\SyncserversController@generateSSChannelids', 'as' => 'preview.ss.channelids']);
Route::get('preview/ss/settings/{id}',['uses' => 'Admin\SyncserversController@generateSSSettings', 'as' => 'preview.ss.settings']);

//Route::get('generatecs/{id}', 'Admin\ChannelServersController@generateChannelids');
Route::get('test-email', 'JobController@processQueue');
