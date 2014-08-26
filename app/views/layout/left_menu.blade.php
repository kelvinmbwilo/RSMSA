<div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
        <li>
            <a  href="{{ url('dashboard') }}"> <i class="fa fa-book"></i>Dashboard</a>
        </li>

        <li class="sub-menu">
            <a  href="#">
                <i class="fa fa-cogs"></i>Stakeholder</a>
             <ul class="sub">
                <li><a  href="{{ url('stakeholder') }}">Main Stakeholders</a></li>
                <li><a  href="{{ url('stakeholderBranch') }}">Stakeholder Branches</a></li>
            </ul>
        </li>

        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-th-large"></i>
                <span>Reference Tables</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('reference') }}">References</a></li>
                <li><a  href="{{ url('dynamic_table') }}">Dynamic table</a></li>

            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-th-list"></i>
                <span>Data Tables</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('table_name') }}">Table Names</a></li>
                <li><a  href="{{ url('table_data') }}">Table data</a></li>


            </ul>
        </li>

        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-cogs"></i>
                <span>Locations</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('location/') }}">Administrative Units</a></li>
                <li><a  href="{{ url('location/levels') }}">Administrative Levels</a></li>
            </ul>
        </li>

        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-cogs"></i>
                <span>Data</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('data/home') }}">View</a></li>
                <li><a  href="{{ url('data/add') }}">Add</a></li>
                <li><a  href="gallery.html">Gallery</a></li>
                <li><a  href="todo_list.html">Todo List</a></li>
                <li><a  href="draggable_portlet.html">Draggable Portlet</a></li>
                <li><a  href="tree.html">Tree View</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-book"></i>
                <span>Data Tables</span>
            </a>
            <ul class="sub">

                <li><a  href="{{ url('table_name') }}">Data Table Management</a></li>
             </ul>
        </li>
        <li>
            <a  href="{{ url('user') }}">
                <i class="fa fa-user"></i>
                <span>User</span>
            </a>
        </li>

<!--        datatype details-->
        <li>
            <a  href="{{ url('datatype') }}">
                <i class="fa fa-database"></i>
                <span>Data type</span>
            </a>
        </li>

        <!--multi level menu start-->
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-sitemap"></i>
                <span>Multi level Menu</span>
            </a>
            <ul class="sub">
                <li><a  href="javascript:;">Menu Item 1</a></li>
                <li class="sub-menu">
                    <a  href="boxed_page.html">Menu Item 2</a>
                    <ul class="sub">
                        <li><a  href="javascript:;">Menu Item 2.1</a></li>
                        <li class="sub-menu">
                            <a  href="javascript:;">Menu Item 3</a>
                            <ul class="sub">
                                <li><a  href="javascript:;">Menu Item 3.1</a></li>
                                <li><a  href="javascript:;">Menu Item 3.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <!--multi level menu end-->

    </ul>
    <!-- sidebar menu end-->
</div>