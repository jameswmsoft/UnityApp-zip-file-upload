
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css"/>

    {{--<link href="{{asset('assets/jquery-file-upload/css/jquery.fileupload.css')}}" rel="stylesheet"/>--}}
    {{--<link href="{{asset('assets/jquery-file-upload/css/jquery.fileupload-ui.css')}}" rel="stylesheet"/>--}}

    <link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css"/>
{{--    <link href="{{asset('assets/css/components-rounded.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/layout2/css/layout.css')}}" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{asset('assets/layout2/css/themes/grey.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/layout2/css/custom.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/login/mystyle.css')}}" rel="stylesheet" type="text/css"/>

</head>

<body class="page-container-bg-solid page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo page-fontawesome page-header-fixed">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a id="home_title">
                <h1>WELCOME</h1>
            </a>
            <div id="siderbar_toggle" class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        <div class="page-actions">
            <div class="btn-group">
            </div>
        </div>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->
            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    </li>
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="/app/static/assets/admin/layout2/img/avatar3_small.jpg">
                            <span class="username username-hide-on-mobile">
						{{Auth()->user()->username}} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            {{--<li>--}}
                                {{--<a href="extra_profile.html">--}}
                                    {{--<i class="icon-user"></i> My Profile </a>--}}
                            {{--</li>--}}
                            <li>
                                <a href="{{url('logout')}}">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div><div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <!-- BEGIN SIDEBAR MENU1 -->
        <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu" data-auto-scroll="true" data-slide-speed="200">
            <li class="active open">
                <a>
                    <i class="fa fa-home"></i>
                    <span class="title">Unity Web app</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU1 -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content" style="min-height:1190px">

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">Unity Web App</span>
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group newbtn_draw">
                                        <button type="button" id="home_create" class="btn blue start" style="margin-top: 10px;margin-right: 60px">
                                            <i class="fa fa-plus"></i>
                                            <span>
                                                Create </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                <thead>
                                <tr>
                                    <th>
                                        NO
                                    </th>
                                    <th>
                                        ProjectName
                                    </th>
                                    <th>
                                        FilePath
                                    </th>
                                    <th>
                                        Password
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @foreach($files as $file)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$file->filename}}</td>
                                        <td>{{$file->filepath}}</td>
                                        <td>{{$file->file_pass}}</td>
                                        <td>
                                            <a href="{{$file->filepath}}" target="_blank" class="btn btn-warning" type="button">show</a>
                                            <a href="{{url('file_edit')}}/{{$file->id}}" class="btn btn-success" type="button">edit</a>
                                            <button class="btn btn-primary contentDelete" type="button" onclick="FileDel({{$file->id}})">delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->

                </div>
            </div>

            <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                            Are you really delete the selected File?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                            <a type="button" id="del_allow" class="btn blue">OK</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <div id="create_project" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Create Project</h4>
                        </div>
                        <form action="{{url('file_upload')}}" enctype="multipart/form-data" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Project Name</label>
                                            <div class="col-md-9">
                                                <input type="text" name="filename" class="form-control spinner" placeholder="Project Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" name="password" class="form-control spinner" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile" class="col-md-3 control-label">File input</label>
                                            <div class="col-md-9">
                                                <input type="file" name="file" id="exampleInputFile">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn green">Create</button>
                                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <!--Cooming Soon...-->
    <!-- END QUICK SIDEBAR -->
</div><div class="page-footer">
    <div class="page-footer-inner">
        2018 © theme.
    </div>

</div><div class="scroll-to-top" style="display: none;">
    <i class="icon-arrow-up"></i>
</div>

<script src="{{asset('assets/respond.min.js')}}"></script>
<script src="{{asset('assets/excanvas.min.js')}}"></script>
<![endif]-->
<script src="{{asset('assets/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jquery-migrate.min.js')}}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset('assets/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jquery.cokie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="{{asset('assets/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/layout2/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/layout2/scripts/demo.js')}}" type="text/javascript"></script>
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
    });
</script>
<script>
    $("#siderbar_toggle").on('click',function () {
        if($(".page-container-bg-solid").hasClass('page-sidebar-closed')){
            $('a#home_title').css({'display':'inline'})
        } else{
            $('a#home_title').css({'display':'none'})
        }

    })

    function FileDel($id){
        var herf = '{{url('file_delete')}}' + '/' + $id;
        $('#basic').modal('show');
        $('#del_allow').attr('href',herf);
    }

    $('#home_create').on('click',function () {
        $('#create_project').modal('show');
    })

</script>
<!-- END JAVASCRIPTS -->

<!-- END BODY -->
</body><!-- END BODY -->
</html>