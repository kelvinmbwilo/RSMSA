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
                <i class="fa fa-book"></i>
                <span>Reference Tables</span>
            </a>
            <ul class="sub">

                <li><a  href="{{ url('reference') }}">Reference Management</a></li>
                <li><a  href="{{ url('dynamic_table') }}">Dynamic Tables</a></li>

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