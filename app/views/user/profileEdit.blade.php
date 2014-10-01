@extends('layout.master')

@section('contents')

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<body>

<!--main content start-->

        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="profile-edit.html#">
                            <img src="img/pro-ac-1.png" alt="">
                        </a>
                        <h1>{{ Auth::user()->firstName }} {{ Auth::user()->middleName }} {{ Auth::user()->lastName }}</h1>
                        <p>{{ Auth::user()->email }}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('user/profile') }}"> <i class="fa fa-user"></i> Profile</a></li>
                    </ul>

                </section>
            </aside>
            <aside class="profile-info col-lg-9">
                <section class="panel">
                    <div class="bio-graph-heading">
                       Editing {{ Auth::user()->firstName }} {{ Auth::user()->middleName }} {{ Auth::user()->lastName }}'s Profile
                    </div>
                    <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form class="form-horizontal"  action="{{ url('user/profileEdit')}}/{{ Auth::user()->id}}" method="post">
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">First Name</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="firstname" value=" {{ Auth::user()->firstName }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Middle Name</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="middlename" value="{{ Auth::user()->middleName }} ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Last Name</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="lastname" value="{{ Auth::user()->lastName }} ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">User Name</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }} ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }} ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Phone Number</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="phonenumber" value="{{ Auth::user()->phoneNumber }} ">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a type="submit" class="btn btn-default" href="{{ URL::to('user/profile') }}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </aside>
        </div>

        <!-- page end-->


<!--main content end-->

<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/jquery-knob/js/jquery.knob.js"></script>
<script src="js/respond.min.js" ></script>

<!--right slidebar-->
<script src="js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="js/common-scripts.js"></script>


</body>
</html>





@stop