@extends('backend.layouts.master')
@section('dashboard_content')

    <div id="content" class="span10">

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="#">Contact</a></li>
            </ul>
        <h1>Contact Form</h1>
        <form id="contact_form" name="contact_form" method="post" class="container-fluid">
            <div class="mb-5 row">
                <div class="container-fluid">
                    <label>First Name</label>
                    <input type="text" required maxlength="50" class="form-control" id="first_name" name="first_name">
                </div>
                <div class="container-fluid">
                    <label>Last Name</label>
                    <input type="text" required maxlength="50" class="form-control" id="last_name" name="last_name">
                </div>
            </div>
            <div class="mb-5 row">
                <div class="container-fluid">
                    <label for="email_addr">Email address</label>
                    <input type="email" required maxlength="50" class="form-control" id="email_addr" name="email"
                           placeholder="name@example.com">
                </div>
                <div class="container-fluid">
                    <label for="phone_input">Phone</label>
                    <input type="tel" required maxlength="50" class="form-control" id="phone_input" name="Phone"
                           placeholder="Phone">
                </div>
            </div>
            <div class="mb-5 ">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary px-4 btn-lg">Post</button>
        </form>


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
    <div/>

@endsection