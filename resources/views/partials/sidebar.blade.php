@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li>
                <select class="searchable-field form-control"></select>
            </li>
            {{-- <li><button class="btn btn-default" data-toggle="control-sidebar">Toggle Right Sidebar</button></li> --}}
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'global' ? 'active' : '' }}">
                <a href="{{ url('/admin/global') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.global_dashboard')</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'tuts' ? 'active' : '' }}">
                <a href="{{ url('/admin/tuts') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.tuts_dashboard')</span>
                </a>
            </li>
            @can('group_builder_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.group-builder.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('group_access')
                    <li>
                        <a href="{{ route('admin.groups.index') }}">
                            <i class="fa fa-sort-numeric-asc"></i>
                            <span>@lang('global.group.title')</span>
                        </a>
                    </li>
                    @endcan

                    @can('instance_access')
                    <li>
                        <a href="{{ route('admin.instances.index') }}">
                            <i class="fa fa-plus"></i>
                            <span>@lang('global.instance.title')</span>
                        </a>
                    </li>
                    @endcan

                    @can('host_access')
                    <li>
                        <a href="{{ route('admin.hosts.index') }}">
                            <i class="fa fa-server"></i>
                            <span>@lang('global.hosts.title')</span>
                        </a>
                    </li>
                    @endcan

                </ul>
            </li>@endcan

            @can('channel_server_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-check-square-o"></i>
                    <span>@lang('global.channel-servers.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('channel_server_access')
                    <li>
                        <a href="{{ route('admin.channel_servers.index') }}">
                            <i class="fa fa-long-arrow-right"></i>
                            <span>@lang('global.channel-server.title')</span>
                        </a>
                    </li>@endcan

                    @can('csi_access')
                    <li>
                        <a href="{{ route('admin.csis.index') }}">
                            <i class="fa fa-chain"></i>
                            <span>@lang('global.csi.title')</span>
                        </a>
                    </li>@endcan

                    @can('cso_access')
                    <li>
                        <a href="{{ route('admin.csos.index') }}">
                            <i class="fa fa-sign-out"></i>
                            <span>@lang('global.cso.title')</span>
                        </a>
                    </li>@endcan

                </ul>
            </li>@endcan

            @can('internal_notification_access')
            <li>
                <a href="{{ route('admin.internal_notifications.index') }}">
                    <i class="fa fa-briefcase"></i>
                    <span>@lang('global.internal-notifications.title')</span>
                </a>
            </li>@endcan

            @can('sync_server_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-arrows-alt"></i>
                    <span>@lang('global.sync-servers.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('syncserver_access')
                    <li>
                        <a href="{{ route('admin.syncservers.index') }}">
                            <i class="fa fa-cube"></i>
                            <span>@lang('global.syncservers.title')</span>
                        </a>
                    </li>@endcan

                    @can('aggregation_server_access')
                    <li>
                        <a href="{{ route('admin.aggregation_servers.index') }}">
                            <i class="fa fa-cubes"></i>
                            <span>@lang('global.aggregation-server.title')</span>
                        </a>
                    </li>@endcan

                </ul>
            </li>@endcan

            @can('system_default_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.system-defaults.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('channel_access')
                    <li>
                        <a href="{{ route('admin.channels.index') }}">
                            <i class="fa fa-area-chart"></i>
                            <span>@lang('global.channels.title')</span>
                        </a>
                    </li>@endcan

                    @can('country_access')
                    <li>
                        <a href="{{ route('admin.countries.index') }}">
                            <i class="fa fa-flag"></i>
                            <span>@lang('global.country.title')</span>
                        </a>
                    </li>@endcan

                    @can('timezone_access')
                    <li>
                        <a href="{{ route('admin.timezones.index') }}">
                            <i class="fa fa-location-arrow"></i>
                            <span>@lang('global.timezone.title')</span>
                        </a>
                    </li>@endcan

                    @can('filter_access')
                    <li>
                        <a href="{{ route('admin.filters.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.filters.title')</span>
                        </a>
                    </li>@endcan

                    @can('video_server_type_access')
                    <li>
                        <a href="{{ route('admin.video_server_types.index') }}">
                            <i class="fa fa-file-video-o"></i>
                            <span>@lang('global.video-server-types.title')</span>
                        </a>
                    </li>@endcan

                    @can('notification_server_type_access')
                    <li>
                        <a href="{{ route('admin.notification_server_types.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.notification-server-types.title')</span>
                        </a>
                    </li>@endcan

                    @can('protocol_access')
                    <li>
                        <a href="{{ route('admin.protocols.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.protocols.title')</span>
                        </a>
                    </li>@endcan

                    @can('role_convention_access')
                    <li>
                        <a href="{{ route('admin.role_conventions.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.role-conventions.title')</span>
                        </a>
                    </li>@endcan

                    @can('environment_access')
                    <li>
                        <a href="{{ route('admin.environments.index') }}">
                            <i class="fa fa-adjust"></i>
                            <span>@lang('global.environment.title')</span>
                        </a>
                    </li>
                    @endcan

                    @can('status_access')
                    <li>
                        <a href="{{ route('admin.statuses.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.status.title')</span>
                        </a>
                    </li>
                    @endcan

                    @can('sync_server_function_access')
                    <li>
                        <a href="{{ route('admin.sync_server_functions.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.sync-server-function.title')</span>
                        </a>
                    </li>
                    @endcan

                </ul>
            </li>@endcan

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('permission_access')
                    <li>
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.permissions.title')</span>
                        </a>
                    </li>@endcan

                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.roles.title')</span>
                        </a>
                    </li>@endcan

                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('global.users.title')</span>
                        </a>
                    </li>@endcan

                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span>@lang('global.user-actions.title')</span>
                        </a>
                    </li>@endcan

                </ul>
            </li>@endcan





            @php ($unread = \App\MessengerTopic::countUnread())
            <li class="{{ $request->segment(2) == 'messenger' ? 'active' : '' }} {{ ($unread > 0 ? 'unread' : '') }}">
                <a href="{{ route('admin.messenger.index') }}">
                    <i class="fa fa-envelope"></i>

                    <span>Messages</span>
                    @if($unread > 0)
                        {{ ($unread > 0 ? '('.$unread.')' : '') }}
                    @endif
                </a>
            </li>
            <style>
                .page-sidebar-menu .unread * {font-weight:bold !important; }
                ul.footer-menu {list-style: none; padding: 0; position: relative; float: right; }
                ul.footer-menu li {display: inline; padding-top: 0; padding-right: 20pxpx; padding-bottom: 0; padding-left: 20pxpx; }
            </style>




{{--             <li class="treeview">
                <a href="#">
                    <i class="fa fa-line-chart"></i>
                    <span class="title">Generated Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   <li class="{{ $request->is('/reports/note-sure') }}">
                        <a href="{{ url('/admin/reports/note-sure') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="title">note sure</span>
                        </a>
                    </li>   <li class="{{ $request->is('/reports/channel-servers') }}">
                        <a href="{{ url('/admin/reports/channel-servers') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="title">Channel Servers</span>
                        </a>
                    </li>
                </ul>
            </li> --}}




            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('global.app_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>




        {{-- <li><a id="#ajaxSubmit"><i class="fa fa-circle-o text-red"></i> <span><strong>UPDATE ALL CHANNELS</strong></span></a></a></li> --}}
        {{-- <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li> --}}
        {{-- <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}

        </ul>
        <div class="bottom">
            <ul class="sidebar-menu">
                <li class="header">Channel Update API</li>
                <li><a target="_blank" href="/update-dev-channels"><i class="fa fa-circle-o text-yellow"></i><span>Update Dev Channels</span></a></li>
                <li><a target="_blank" href="/update-qa-channels"><i class="fa fa-circle-o text-yellow"></i><span>Update QA Channels</span></a></li>
                <li><a target="_blank" href="/update-beta-channels"><i class="fa fa-circle-o text-yellow"></i><span>Update Beta Channels</span></a></li>
                <li class="header">Documentation</li>
                <li><a target="_blank" href="{{ url('/docs/1.0') }}"><i class="fa fa-circle-o text-aqua"></i><span>Docs</span></a></li>
                <li><a target="_blank" href="{{ url('/docs/technical') }}"><i class="fa fa-circle-o text-aqua"></i><span>Technical Docs</span></a></li>
                <li><a target="_blank" href="{{ url('/r') }}"><i class="fa fa-circle-o text-aqua"></i><span>Route Cheet Sheet</span></a></li>


                {{-- <li><a href="/telescope">API Activity</a></li> --}}

            </ul>
        </div>

        <img src="{{ asset('images/sling_n_dish.png') }}" />
    </section>

</aside>

