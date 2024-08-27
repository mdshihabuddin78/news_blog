
    <div class="container-fluid-full">

            <!-- start: Main Menu -->
            <div id="sidebar-left" class="span2">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li><a href="{{route('dashboard')}}"><i class="icon-bar-chart"></i><span
                                        class="hidden-tablet">Dashboard</span></a><li/>

                        <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                                        class="hidden-tablet">Category</span><span
                                        class="label label-important"> 2</span></a>
                            <ul>
                                <li><a class="submenu" href="{{route('cat.list')}}"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet">Category_list</span></a></li>
                                <li><a class="submenu" href="{{route('admin_catelist')}}"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet"> Cate_List</span></a></li>

                            </ul>
                        </li>

                        <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                                        class="hidden-tablet">News</span><span
                                        class="label label-important"> 2</span></a>
                            <ul>
                                <li><a class="submenu" href="{{url('admin/news')}}"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet">News_list</span></a></li>
                                <li><a class="submenu" href="{{route('news_fit')}}"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet"> News-fit</span></a></li>
                            </ul>
                        </li>

                        <li><a href="{{route('admin_comment')}}"><i class="icon-eye-open"></i><span
                                        class="hidden-tablet"> Comments</span></a></li>
                        <li><a href="{{route('widgets')}}"><i class="icon-dashboard"></i><span
                                        class="hidden-tablet"> Widgets</span></a></li>
                        <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                                        class="hidden-tablet"> Dropdown</span><span
                                        class="label label-important"> 2 </span></a>
                            <ul>
                                <li><a class="submenu" href="{{route('subminu')}}"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet"> Sub Menu 1</span></a></li>
                                <li><a class="submenu" href="{{route('subminu2')}}"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet"> Sub Menu 2</span></a></li>

                            </ul>
                        </li>
                        <li><a href="{{route('tasks')}}"><i class="icon-edit"></i><span class="hidden-tablet"> Tasks</span></a>
                        </li>
                        <li><a href="{{route('charts')}}"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a>
                        </li>
                        <li><a href="{{route('calender')}}"><i class="icon-calendar"></i><span
                                        class="hidden-tablet"> Calendar</span></a></li>


                    </ul>
                </div>
            </div>
