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
        </li>   <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-cogs"></i>
                <span>Data Importation</span>
            </a>
            <ul class="sub">
                <li><a  href="{{url('databaseCredentials')}}">Script</a></li>
                <li><a  href="{{url('excel')}}">Excel</a></li>

            </ul>
        </li>

        <!--multi level menu start-->
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-sitemap"></i>
                <span>Table Management</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('form') }}">Form Management</a></li>
                <li><a  href="{{ url('form_creation') }}">Form Data Entry</a></li>
                <li><a  href="{{ url('dataTable') }}">Section Management</a></li>
                <li><a  href="{{ url('mapping') }}">Section Mapping Management</a></li>
                <li><a  href="{{ url('option') }}">Field Management</a></li>
                <li><a  href="{{ url('category') }}">Category Management</a></li>

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