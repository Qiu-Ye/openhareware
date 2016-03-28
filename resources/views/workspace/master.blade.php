    @extends('workspace.layout')

    @section('title', '个人主页')

    @section('header')
    <link href="{{ asset('css/application.min.css') }}" rel="stylesheet">
    @endsection

    @section('bodyStyle', 'class="background-dark"')

    @section('content')
<div class="logo">
    <h4><a href="/index"><strong>Microduino</strong>开放平台</a></h4>
</div>
<nav id="sidebar" class="sidebar nav-collapse collapse">
    <ul id="side-nav" class="side-nav">
    @if((Request::fullUrl() == route('device.index')) || (Request::fullUrl() == url('profile'))) 
        <li class="active"> 
    @else 
        <li> 
    @endif
            <a href="{{ route('device.index') }}"><i class="fa fa-home"></i> <span class="name">设备操作</span></a>
        </li>
    @if(Request::fullUrl() == route('device.create')) 
        <li class="active panel"> 
            <a class="accordion-toggle" data-toggle="collapse"
               data-parent="#side-nav" href="#forms-collapse"><i class="fa fa-edit"></i> <span class="name">设备管理</span></a>
            <ul id="forms-collapse" class="panel-collapse collapse in">
    @else 
        <li class="panel"> 
            <a class="accordion-toggle collapsed" data-toggle="collapse"
               data-parent="#side-nav" href="#forms-collapse"><i class="fa fa-edit"></i> <span class="name">设备管理</span></a>
            <ul id="forms-collapse" class="panel-collapse collapse">
    @endif
    @if(Request::fullUrl() == route('device.create')) 
        <li class="active"> 
    @else 
        <li> 
    @endif
                <a href="{{ route('device.create') }}">新增设备</a></li>
                <li><a href="{{ route('device.index') }}">设备列表</a></li>
            </ul>
        </li>
        <li class="panel">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="/log"><i class="fa fa-bar-chart-o"></i> <span class="name">操作日志</span></a>
            <ul id="stats-collapse" class="panel-collapse collapse">
                <li><a href="stat_statistics.html">登录日志</a></li>
                <li><a href="stat_charts.html">设备连接日志</a></li>
                <li><a href="stat_realtime.html">设备操作日志</a></li>
            </ul>
        </li>
        <li class="panel">
            <a class="accordion-toggle collapsed" data-toggle="collapse"
               data-parent="#side-nav" href="#ui-collapse"><i class="fa fa-magic"></i> <span class="name">用户中心</span></a>
            <ul id="ui-collapse" class="panel-collapse collapse">
                <li><a href="/profile">用户信息</a></li>
                <li><a href="ui_dialogs.html">个人信息完善</a></li>
            </ul>
        </li>
        <li class="visible-xs">
            <a href="login.html"><i class="fa fa-sign-out"></i> <span class="name">登出</span></a>
        </li>
    </ul>
    <div id="sidebar-settings" class="settings">
        <button type="button"
                data-value="icons"
                class="btn-icons btn btn-transparent btn-sm">收缩</button>
        <button type="button"
                data-value="auto"
                class="btn-auto btn btn-transparent btn-sm">展开</button>
    </div>
</nav>
<div class="wrap">
    <header class="page-header">
        <div class="navbar">
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="visible-phone-landscape">
                        <a href="#" id="search-toggle">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" title="信息" id="messages"
                           class="dropdown-toggle"
                           data-toggle="dropdown">
                            <i class="fa fa-comments"></i>
                        </a>
                        <ul id="messages-menu" class="dropdown-menu messages" role="menu">
                            <li role="presentation">
                                <a href="#" class="message">
                                    <!--<img src="img/1.jpg" alt="">-->
                                    <div class="details">
                                        <div class="sender">Jane Hew</div>
                                        <div class="text">
                                            Hey, John! How is it going? ...
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="message">
                                    <div class="details">
                                        <div class="sender">Alies Rumiancaŭ</div>
                                        <div class="text">
                                            I'll definitely buy this template
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="message">
                                    <div class="details">
                                        <div class="sender">Michał Rumiancaŭ</div>
                                        <div class="text">
                                            Is it really Lore ipsum? Lore ...
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="text-align-center see-all">
                                    See all messages <i class="fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" title="8 个设备状态"
                           class="dropdown-toggle"
                           data-toggle="dropdown">
                            <i class="fa fa-group"></i>
                            <span class="count">8</span>
                        </a>
                        <ul id="support-menu" class="dropdown-menu support" role="menu">
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-important"><i class="fa fa-bell-o"></i></span>
                                    </div>
                                    <div class="details">
                                        Check out this awesome ticket
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-warning"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                    <div class="details">
                                        "What is the best way to get ...
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-success"><i class="fa fa-tag"></i></span>
                                    </div>
                                    <div class="details">
                                        This is just a simple notification
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-info"><i class="fa fa-info-circle"></i></span>
                                    </div>
                                    <div class="details">
                                        12 new orders has arrived today
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-important"><i class="fa fa-plus"></i></span>
                                    </div>
                                    <div class="details">
                                        One more thing that just happened
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="text-align-center see-all">
                                    See all tickets <i class="fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="hidden-xs">
                        <a href="#" id="settings"
                           title="设置"
                           data-toggle="popover"
                           data-placement="bottom">
                            <i class="fa fa-cog"></i>
                        </a>
                    </li>
                    <li class="hidden-xs dropdown">
                        <a href="#" title="Account" id="account"
                           class="dropdown-toggle"
                           data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                        </a>
                        <ul id="account-menu" class="dropdown-menu account" role="menu">
                            <!--
                            <li role="presentation" class="account-picture">
                                <img src="img/2.jpg" alt="">
                                username
                            </li>
                            -->
                            <li role="presentation">
                                <a href="form_account.html" class="link">
                                    <i class="fa fa-user"></i>
                                    个人信息
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="component_calendar.html" class="link">
                                    <i class="fa fa-calendar"></i>
                                    操作日志
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="link">
                                    <i class="fa fa-inbox"></i>
                                    设备操作
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="visible-xs">
                        <a href="#"
                           class="btn-navbar"
                           data-toggle="collapse"
                           data-target=".sidebar"
                           title="">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                    <li class="hidden-xs"><a href="/logout"><i class="fa fa-sign-out"></i></a></li>
                </ul>
                <form id="search-form" class="navbar-form pull-right" role="search">
                    <input type="search" class="search-query" placeholder="搜索...">
                </form>
                <div class="notifications pull-right">
                    <div class="alert pull-right">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <i class="fa fa-info-circle"></i>注意,你可以在右侧的<a id="notification-link" href="#">设置</a>当中修改你的首页样式
                    </div>
                </div>
        </div>
    </header>
    <div class="content container" style="width: 1102px;">
        @yield('workcontent')
    </div>
</div>
    @endsection

    @section('javascript')
<!-- jquery plugins -->
<script src="{{ asset('lib/icheck.js/jquery.icheck.js') }}"></script>
<script src="{{ asset('lib/jquery/jquery-ui-1.10.3.custom.js') }}"></script>

<!--backbone and friends -->
<script src="{{ asset('lib/backbone/underscore-min.js') }}"></script>
<script src="{{ asset('lib/backbone/backbone-min.js') }}"></script>
<script src="{{ asset('lib/backbone/backbone.localStorage-min.js') }}"></script>

<script src="{{ asset('lib/bootstrap/transition.js') }}"></script>
<script src="{{ asset('lib/bootstrap/dropdown.js') }}"></script>
<script src="{{ asset('lib/bootstrap/collapse.js') }}"></script>
<script src="{{ asset('lib/bootstrap/alert.js') }}"></script>
<script src="{{ asset('lib/bootstrap/tooltip.js') }}"></script>
<script src="{{ asset('lib/bootstrap/popover.js') }}"></script>
<script src="{{ asset('lib/bootstrap/button.js') }}"></script>
<script src="{{ asset('lib/bootstrap/modal.js') }}"></script>
<script src="{{ asset('lib/bootstrap/tab.js') }}"></script>

<!-- basic application js-->
<script src="{{ asset('scripts/app.js') }}"></script>
<script src="{{ asset('scripts/settings.js') }}"></script>

<!-- page specific -->
    @yield('pagescript')

<script type="text/template" id="settings-template">
    <div class="setting clearfix">
        <div>背景</div>
        <div id="background-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% dark = background == 'dark'; light = background == 'light';%>
            <button type="button" data-value="dark" class="btn btn-sm btn-transparent <%= dark? 'active' : '' %>">暗色</button>
            <button type="button" data-value="light" class="btn btn-sm btn-transparent <%= light? 'active' : '' %>">亮色</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>侧边栏显示在</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-sm btn-transparent <%= onRight? '' : 'active' %>">左边</button>
            <button type="button" data-value="right" class="btn btn-sm btn-transparent <%= onRight? 'active' : '' %>">右边</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>侧边栏</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-sm btn-transparent <%= display? 'active' : '' %>">显示</button>
            <button type="button" data-value="false" class="btn btn-sm btn-transparent <%= display? '' : 'active' %>">隐藏</button>
        </div>
    </div>
</script>

<script type="text/template" id="sidebar-settings-template">
    <% auto = sidebarState == 'auto'%>
    <% if (auto) {%>
    <button type="button"
            data-value="icons"
            class="btn-icons btn btn-transparent btn-sm">收缩</button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-sm">展开</button>
    <%} else {%>
    <button type="button"
            data-value="auto"
            class="btn btn-transparent btn-sm">展开</button>
    <% } %>
</script>
    @endsection
