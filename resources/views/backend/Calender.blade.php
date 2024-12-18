@extends('backend.layouts.master')

@section('dashboard_content')

    <div id="content" class="span10">


        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Calendar</a></li>
        </ul>

        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon calendar"></i><span class="break"></span>Calendar</h2>
                </div>
                <div class="box-content">
                    <div id="external-events" class="span3 hidden-phone hidden-tablet">
                        <h4>Draggable Events</h4>
                        <div class="external-event badge">Default</div>
                        <div class="external-event badge badge-success">Completed</div>
                        <div class="external-event badge badge-warning">Warning</div>
                        <div class="external-event badge badge-important">Important</div>
                        <div class="external-event badge badge-info">Info</div>
                        <div class="external-event badge badge-inverse">Other</div>
                        <p>
                            <label for="drop-remove"><input type="checkbox" id="drop-remove" /> remove after drop</label>
                        </p>
                    </div>

                    <div id="calendar" class="span9"></div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div><!--/row-->


    </div><!--/.fluid-container-->

    <!-- end: Content -->
    </div><!--/#content.span10-->
    </div><!--/fluid-row-->

    <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Settings</h3>
        </div>
        <div class="modal-body">
            <p>Here settings can be configured...</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
            <a href="#" class="btn btn-primary">Save changes</a>
        </div>
    </div>

    <div class="clearfix"></div>

    <footer>

        <p>
            <span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>

        </p>

    </footer>

@endsection