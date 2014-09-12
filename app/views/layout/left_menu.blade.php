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
                <i class="fa fa-cogs"></i>
                <span>Locations</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('location/') }}">Administrative Units</a></li>
                <li><a  href="{{ url('location/levels') }}">Administrative Levels</a></li>
            </ul>
        </li>

        <!--multi level menu start-->
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-sitemap"></i>
                <span>Table Management</span>
            </a>
            <ul class="sub">
                <li><a  href="javascript:;">Form Management</a></li>
                <li class="sub-menu">
                    <a  href="boxed_page.html">Data Management</a>
                    <ul class="sub">

                        <li class="sub-menu">
                            <a  href="javascript:;">Options</a>
                            <ul class="sub">
                                <li><a  href="javascript:;">Categories</a></li>

                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <!--multi level menu end-->

        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-cogs"></i>
                <span>Records</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('data/home') }}">View</a></li>
                <li><a  href="{{ url('data/add') }}">Add</a></li>
                <?php
                    $table = TableName::all();
                    foreach($table as $tbl){
                        ?>
                        <li><a  href='{{ url("data/view/{$tbl->id}") }}'>{{ $tbl->categoryName }}</a></li>
                    <?php
                    }
                ?>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-book"></i>
                <span>Trial</span>
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


    </ul>
    <!-- sidebar menu end-->
</div>