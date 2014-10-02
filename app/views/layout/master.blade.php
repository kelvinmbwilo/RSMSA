<!DOCTYPE html>
@if(Auth::guest())
{{Redirect::to("login")}}
@else
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Martha Shaka,Isaya Zacharia,Kelvin Mbwilo">
    <meta name="keyword" content="RSMSA, Road Safety, Road Safety Management System, Accidents, Traffic Police, Stakeholders, Data Architecture">
<!--    <link rel="shortcut icon" href="http://thevectorlab.net/flatlab/img/favicon.png">-->

    <title>RSMSA - Road Safety Management System Architecture</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ asset('multiselect/css/multi-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/advanced-datatable/media/css/demo_page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/advanced-datatable/media/css/demo_table.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/data-tables/DT_bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">

    <!--right slidebar-->
    <link href="{{ asset('css/slidebars.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />

    <!--    including jquery library-->
    <script src="{{ asset('js/jquery.js') }}"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="{{ asset('js/html5shiv.js') }}"></script>
      <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
<!--header start-->
<header class="header white-bg">
  @include('layout.header')
</header>
<!--header end-->
<!--sidebar start-->
<aside>
  @include('layout.left_menu')
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
<section class="wrapper">
   @yield('contents')
</section>
</section>
<!--main content end-->
</section>
<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        {{ date('Y') }} &copy; Coict.
<!--        <a href="index.html#" class="">-->
<!--            <i class="fa fa-angle-up"></i>-->
<!--        </a>-->
    </div>
</footer>
<!--footer end-->


<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('assets/advanced-datatable/media/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/data-tables/DT_bootstrap.js') }}"></script>
<script class="include" type="text/javascript" src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.sparkline.js') }}" type="text/javascript"></script>
<script src="{{ asset('multiselect/js/jquery.multi-select.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}" ></script>
<script src="{{ asset('js/jquery.customSelect.min.js') }}" ></script>
<script src="{{ asset('js/respond.min.js') }}" ></script>


<!--right slidebar-->
<script src="{{ asset('js/slidebars.min.js') }}"></script>

<!--common script for all pages-->
<script src="{{ asset('js/common-scripts.js') }}"></script>

<!--script for this page-->
<script src="{{ asset('js/sparkline-chart.js') }}"></script>
<script src="{{ asset('js/easy-pie-chart.js') }}"></script>
<script src="{{ asset('js/count.js') }}"></script>

<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>

</body>
</html>
@endif
