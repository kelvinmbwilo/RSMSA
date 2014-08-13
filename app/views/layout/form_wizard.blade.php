<section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Forms Wizard
                </header>
                <div class="panel-body">
                    <div class="stepy-tab">
                        <ul id="default-titles" class="stepy-titles clearfix">
                            <li id="default-title-0" class="current-step">
                                <div>Step 1</div>
                            </li>
                            <li id="default-title-1" class="">
                                <div>Step 2</div>
                            </li>
                            <li id="default-title-2" class="">
                                <div>Step 3</div>
                            </li>
                        </ul>
                    </div>
                    <form class="form-horizontal" id="default">
                        <fieldset title="Step1" class="step" id="default-step-0">
                            <legend> </legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Full Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Email Address</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">User Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>

                        </fieldset>
                        <fieldset title="Step 2" class="step" id="default-step-1" >
                            <legend> </legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Phone</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control input-sm"  placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Mobile</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Mobile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Address</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" cols="60" rows="5"></textarea>
                                </div>
                            </div>

                        </fieldset>
                        <fieldset title="Step 3" class="step" id="default-step-2" >
                            <legend> </legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Full Name</label>
                                <div class="col-lg-10">
                                    <p class="form-control-static">Tawseef Ahmed</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Email Address</label>
                                <div class="col-lg-10">
                                    <p class="form-control-static">tawseef@vectorlab.com</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">User Name</label>
                                <div class="col-lg-10">
                                    <p class="form-control-static">tawseef</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Phone</label>
                                <div class="col-lg-10">
                                    <p class="form-control-static">01234567</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Mobile</label>
                                <div class="col-lg-10">
                                    <p class="form-control-static">01234567</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Address</label>
                                <div class="col-lg-10">
                                    <p class="form-control-static">
                                        Dreamland Ave, Suite 73
                                        AU, PC 1361
                                        P: (123) 456-7891 </p>
                                </div>
                            </div>
                        </fieldset>
                        <input type="submit" class="finish btn btn-danger" value="Finish"/>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript" src="{{asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/respond.min.js') }}" ></script>

<!--right slidebar-->
<script src="{{ asset('js/slidebars.min.js') }}"></script>

<!--common script for all pages-->
<script src="{{ asset('js/common-scripts.js') }}"></script>

<!--script for this page-->
<script src="{{ asset('js/jquery.stepy.js') }}"></script>


<script>

    //step wizard

    $(function() {
        $('#default').stepy({
            backLabel: 'Previous',
            block: true,
            nextLabel: 'Next',
            titleClick: true,
            titleTarget: '.stepy-tab'
        });
    });
</script>
