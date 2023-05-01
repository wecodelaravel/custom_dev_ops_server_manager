<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('channel_servers', 'ChannelServersController', ['except' => ['create', 'edit']]);

        Route::resource('csis', 'CsisController', ['except' => ['create', 'edit']]);

        Route::resource('csos', 'CsosController', ['except' => ['create', 'edit']]);

        Route::resource('syncservers', 'SyncserversController', ['except' => ['create', 'edit']]);

        Route::resource('channels', 'ChannelsController', ['except' => ['create', 'edit']]);

        Route::resource('timezones', 'TimezonesController', ['except' => ['create', 'edit']]);

        Route::resource('filters', 'FiltersController', ['except' => ['create', 'edit']]);

        Route::resource('notification_server_types', 'NotificationServerTypesController', ['except' => ['create', 'edit']]);

        Route::resource('protocols', 'ProtocolsController', ['except' => ['create', 'edit']]);

        Route::resource('role_conventions', 'RoleConventionsController', ['except' => ['create', 'edit']]);

        Route::resource('environments', 'EnvironmentsController', ['except' => ['create', 'edit']]);

        Route::resource('groups', 'GroupsController', ['except' => ['create', 'edit']]);

        Route::resource('instances', 'InstancesController', ['except' => ['create', 'edit']]);

        Route::resource('aggregation_servers', 'AggregationServersController', ['except' => ['create', 'edit']]);

        Route::resource('hosts', 'HostsController', ['except' => ['create', 'edit']]);

        Route::resource('statuses', 'StatusesController', ['except' => ['create', 'edit']]);

});
