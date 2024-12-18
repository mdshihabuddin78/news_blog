@extends('backend.layouts.master')
@section('dashboard_content')

    <div id="content" class="span10">


        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Tasks</a></li>
        </ul>

        <div class="row-fluid">

            <div class="span7">
                <h1>Tasks</h1>

                <div class="priority high"><span>high priority</span></div>

                <div class="task high">
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                    </div>
                    <div class="time">
                        <div class="date">Jun 1, 2012</div>
                        <div> 1 day</div>
                    </div>
                </div>
                <div class="task high">
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                    </div>
                    <div class="time">
                        <div class="date">Jun 1, 2012</div>
                        <div>1 day</div>
                    </div>
                </div>
                <div class="task high">
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                    </div>
                    <div class="time">
                        <div class="date">Jun 1, 2012</div>
                        <div> 1 day</div>
                    </div>
                </div>
                <div class="task high last">
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                    </div>
                    <div class="time">
                        <div class="date">Jun 1, 2012</div>
                        <div>1 day</div>
                    </div>
                </div>

                <div class="priority medium"><span>medium priority</span></div>

                <div class="task medium">
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                    </div>
                    <div class="time">
                        <div class="date">Jun 1, 2012</div>
                        <div> 1 day</div>
                    </div>
                </div>
                <div class="task medium last">
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                    </div>
                    <div class="time">
                        <div class="date">Jun 1, 2012</div>
                        <div> 1 day</div>
                    </div>
                </div>

                <div class="priority low"><span>low priority</span></div>

                <div class="task low">
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                    </div>
                    <div class="time">
                        <div class="date">Jun 1, 2012</div>
                        <div> 1 day</div>
                    </div>
                </div>
                <div class="task low">
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                    </div>
                    <div class="time">
                        <div class="date">Jun 1, 2012</div>
                        <div> 1 day</div>
                    </div>
                </div>
                <div class="task low">
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                    </div>
                    <div class="time">
                        <div class="date">Jun 1, 2012</div>
                        <div> 1 day</div>
                    </div>
                </div>
                <div class="task low">
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                    </div>
                    <div class="time">
                        <div class="date">Jun 1, 2012</div>
                        <div> 1 day</div>
                    </div>
                </div>
                <div class="task low">
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                    </div>
                    <div class="time">
                        <div class="date">Jun 1, 2012</div>
                        <div> 1 day</div>
                    </div>
                </div>
                <div class="task low">
                    <div class="desc">
                        <div class="title">Lorem Ipsum</div>
                        <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                    </div>
                    <div class="time">
                        <div class="date">Jun 1, 2012</div>
                        <div> 1 day</div>
                    </div>
                </div>

                <div class="clearfix"></div>

            </div>

            <div class="span5 noMarginLeft">

                <div class="dark">

                    <h1>Timeline</h1>

                    <div class="timeline">

                        <div class="timeslot">

                            <div class="task">
					    		<span>
									<span class="type">appointment</span>
									<span class="details">
										Dennis Ji at Bootstrap Metro Dashboard HQ
									</span>
									<span>
										remaining time
										<span class="remaining">
											3h 38m 15s
										</span>
									</span>
								</span>
                                <div class="arrow"></div>
                            </div>
                            <div class="icon">
                                <i class="icon-map-marker"></i>
                            </div>
                            <div class="time">
                                3:43 PM
                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <div class="timeslot alt">

                            <div class="task">
					    		<span>
									<span class="type">phone call</span>
									<span class="details">
										Dennis Ji
									</span>
									<span>
										remaining time
										<span class="remaining">
											3h 38m 15s
										</span>
									</span>
								</span>
                                <div class="arrow"></div>
                            </div>
                            <div class="icon">
                                <i class="icon-phone"></i>
                            </div>
                            <div class="time">
                                3:43 PM
                            </div>

                        </div>

                        <div class="timeslot">

                            <div class="task">
					    		<span>
									<span class="type">mail</span>
									<span class="details">
										Dennis Ji
									</span>
									<span>
										remaining time
										<span class="remaining">
											3h 38m 15s
										</span>
									</span>
								</span>
                                <div class="arrow"></div>
                            </div>
                            <div class="icon">
                                <i class="icon-envelope"></i>
                            </div>
                            <div class="time">
                                3:43 PM
                            </div>

                        </div>

                        <div class="timeslot alt">

                            <div class="task">
					    		<span>
									<span class="type">deadline</span>
									<span class="details">
										Fixed bugs
									</span>
									<span>
										remaining time
										<span class="remaining">
											3h 38m 15s
										</span>
									</span>
								</span>
                                <div class="arrow"></div>
                            </div>
                            <div class="icon">
                                <i class="icon-calendar"></i>
                            </div>
                            <div class="time">
                                3:43 PM
                            </div>

                        </div>

                        <div class="timeslot">

                            <div class="task">
					    		<span>
									<span class="type">appointment</span>
									<span class="details">
										Dennis Ji at Bootstrap Metro Dashboard HQ
									</span>
									<span>
										remaining time
										<span class="remaining">
											3h 38m 15s
										</span>
									</span>
								</span>
                                <div class="arrow"></div>
                            </div>
                            <div class="icon">
                                <i class="icon-map-marker"></i>
                            </div>
                            <div class="time">
                                3:43 PM
                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <div class="timeslot alt">

                            <div class="task">
					    		<span>
									<span class="type">skype call</span>
									<span class="details">
										Dennis Ji
									</span>
									<span>
										remaining time
										<span class="remaining">
											3h 38m 15s
										</span>
									</span>
								</span>
                                <div class="arrow"></div>
                            </div>
                            <div class="icon">
                                <i class="icon-phone"></i>
                            </div>
                            <div class="time">
                                3:43 PM
                            </div>

                        </div>

                        <div class="timeslot">

                            <div class="task">
					    		<span>
									<span class="type">mail</span>
									<span class="details">
										Dennis Ji
									</span>
									<span>
										remaining time
										<span class="remaining">
											3h 38m 15s
										</span>
									</span>
								</span>
                                <div class="arrow"></div>
                            </div>
                            <div class="icon">
                                <i class="icon-envelope"></i>
                            </div>
                            <div class="time">
                                3:43 PM
                            </div>

                        </div>

                        <div class="timeslot alt">

                            <div class="task">
					    		<span>
									<span class="type">project deadline</span>
									<span class="details">
										Fixed bugs
									</span>
									<span>
										remaining time
										<span class="remaining">
											3h 38m 15s
										</span>
									</span>
								</span>
                                <div class="arrow"></div>
                            </div>
                            <div class="icon">
                                <i class="icon-calendar"></i>
                            </div>
                            <div class="time">
                                3:43 PM
                            </div>

                        </div>

                        <div class="timeslot">

                            <div class="task">
					    		<span>
									<span class="type">mail</span>
									<span class="details">
										Dennis Ji
									</span>
									<span>
										remaining time
										<span class="remaining">
											3h 38m 15s
										</span>
									</span>
								</span>
                                <div class="arrow"></div>
                            </div>
                            <div class="icon">
                                <i class="icon-envelope"></i>
                            </div>
                            <div class="time">
                                3:43 PM
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>



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

