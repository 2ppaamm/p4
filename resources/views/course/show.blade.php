@extends('_master')
@section('page_styles')
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/jquery-nestable/jquery.nestable.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/pages/css/todo.css"/>
@stop
@section('content')
<!-- BEGIN PAGE CONTENT INNER -->
<div class="todo-content">
	<div class="portlet light">
	<!-- PROJECT HEAD -->
		<div class="portlet-title">
			<div class="caption">
				<i class="icon-bar-chart font-red-sharp hide"></i>
				<span class="caption-helper">COURSE:</span> &nbsp; <span class="caption-subject font-green-sharp bold uppercase">{{ $course->title }}</span>
			</div>
			<div class="actions">
				<div class="btn-group">
				    <a class="btn green-haze btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				        MANAGE <i class="fa fa-angle-down"></i>
				    </a>
				    <ul class="dropdown-menu pull-right">
					    <li>
						    <a href="javascript:;">
						        <i class="i"></i> New Task </a>
					    </li>
					    <li class="divider"></li>
				    	<li>
					    	<a href="javascript:;">
						    	Pending <span class="badge badge-danger">4 </span>
						    </a>
					    </li>
					    <li>
					    	<a href="javascript:;">
						    	Completed <span class="badge badge-success">12 </span>
					        </a>
					    </li>
					    <li>
					    	<a href="javascript:;">
					    		Overdue <span class="badge badge-warning">9 </span>
					    	</a>
					    </li>
					    <li class="divider"></li>
					    <li>
					    	<a href="javascript:;">
					           	<i class="i"></i> Delete Project </a>
					    </li>
				    </ul>
			    </div>
		    </div>
	    </div>
	    <!-- end PORTLET HEAD -->

	    <div class="portlet light">
		    <div class="portlet-body">
			    <div class="row">
				    <div class="col-md-12">
					    <h3>Serialised Output (per list)</h3>
		    		    <textarea id="nestable_list_1_output" class="form-control col-md-12 margin-bottom-10"></textarea>
					    <textarea id="nestable_list_2_output" class="form-control col-md-12 margin-bottom-10"></textarea>
				    </div>
			    </div>
                <div class="row">
                    <div class="col-md-5 col-sm-4">
                        <!-- start PORTLET BODY -->
                        <div class="portlet-body ">
                            <!-- start List Sections -->
                            @if(count($course->course_sections)<1)
                                No lessons created yet.
                            @else
                                @for($i=0; $i<count($course->course_sections); $i++)
                                	<div class="todo-tasklist-item todo-tasklist-item-border-purple">
            							<img class="todo-userpic pull-left" src="{{ $course->course_sections[$i]->guid }}" width="27px" height="27px">
                            			<div class="todo-tasklist-item-title">
                            				 Lesson: {{ $course->course_sections[$i]->lesson_number }}|{{ $course->course_sections[$i]->title }}
                        				</div>
  										<div class="todo-tasklist-item-text">
                    					    {{ $course->course_sections[$i]->description}}
               							</div>
                    					<div class="todo-tasklist-controls pull-left">
                                            <span class="todo-tasklist-date"><i class="fa fa-calendar"></i> {{ $course->course_sections[$i]->lesson_date }} </span>
                                            <span class="todo-tasklist-badge badge badge-roundless">New</span>
                    					</div>
                    				</div>
                    				@if (count($course->course_sections[$i]->notes)<1)
                                        <div class="dd" id="nestable_list_{{$i+1}}">
                                            <li class="dd-item">
                                                <div class="dd-empty">
                                                </div>
                                            </li>
                                        </div>
                    				@else
                                        <div class="dd" id="nestable_list_{{$i+1}}">
                                            <ol class="dd-list">
                            				    @foreach ($course->course_sections[$i]->notes as $note)
                                                    <li class="dd-item" data-id="{{$note->id}}">
                                                        <div class="row">
                                                            <div class="col-md-1 pull-right">
                                                                <a href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                    <br /><i class="fa fa-gear"></i>
                                                                 </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li id="/note/{{$note->id}}" class="note_action">
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-play-circle"></i>VIEW</a>
                                                                    </li>
                                                                    <li id="/note/{{$note->id}}/duplicate" class="note_action">
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-copy"></i>DUPLICATE</a>
                                                                    </li>
                                                                    <li id="/note/{{$note->id}}/edit" class="note_action"
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-pencil"></i>UPDATE</a>
                                                                    </li>
                                                                    <li id="/note/{{$note->id}}/delete" class="note_action">
                                                                        <a href="javascript:;">
                                                                            <i class="fa fa-minus-circle"></i>DELETE</a>
                                                                    </li>
                                                                    <li id="note/{{$note->id}}/hide" class="note_action">
                                                                        <a href="javascript:;"><i class="fa fa-eye"></i>HIDE</a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="dd-handle">
                                                               {{ $note->note_type->format }}: {{$note->id}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    @endif
                                @endfor
                            @endif
					    </div>
				    </div>
                    <div class="col-md-7 col-sm-8">
                        <div id="notes"></div>
                    	<form action="javascript:;" class="form-horizontal">
					    <!-- TASK HEAD -->
							<div class="form">
						    	<div class="form-group">
									<div class="col-md-8 col-sm-8">
										<div class="todo-taskbody-user">
											<img class="todo-userpic pull-left" src="../../assets/admin/layout/img/avatar6.jpg" width="50px" height="50px">
											<span class="todo-username pull-left">Vanessa Bond</span>
											<button type="button" class="todo-username-btn btn btn-circle btn-default btn-xs">&nbsp;edit&nbsp;</button>
										</div>
									</div>
							    	<div class="col-md-4 col-sm-4">
								    <div class="todo-taskbody-date pull-right">
										<button type="button" class="todo-username-btn btn btn-circle btn-default btn-xs">&nbsp; Complete &nbsp;</button>
									</div>
								</div>
							</div>
						<!-- END TASK HEAD -->

							<div class="form-group">
								<div class="col-md-12">
							    	<input type="text" class="form-control todo-taskbody-tasktitle" placeholder="Task Title...">
								</div>
							</div>
							<!-- TASK DESC -->
							<div class="form-group">
								<div class="col-md-12">
									<textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="Task Description..."></textarea>
								</div>
							</div>
							<!-- END TASK DESC -->
							<!-- TASK DUE DATE -->
							<div class="form-group">
								<div class="col-md-12">
									<div class="input-icon">
							    		<i class="fa fa-calendar"></i>
										<input type="text" class="form-control todo-taskbody-due" placeholder="Due Date...">
									</div>
								</div>
							</div>
							<!-- TASK TAGS -->
							<div class="form-group">
								<div class="col-md-12">
									<input type="text" class="form-control todo-taskbody-tags" placeholder="Tags..." value="Pending, Requested">
								</div>
							</div>
							<!-- TASK TAGS -->
							<div class="form-actions right todo-form-actions">
								<button class="btn btn-circle btn-sm green-haze">Save Changes</button>
								<button class="btn btn-circle btn-sm btn-default">Cancel</button>
							</div>
						</div>
			    		<div class="tabbable-line">
							<ul class="nav nav-tabs ">
								<li class="active">
									<a href="#tab_1" data-toggle="tab"> Comments </a>
				    			</li>
								<li>
    								<a href="#tab_2" data-toggle="tab">History </a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<!-- TASK COMMENTS -->
									<div class="form-group">
										<div class="col-md-12">
											<ul class="media-list">
												<li class="media">
													<a class="pull-left" href="javascript:;">
							    						<img class="todo-userpic" src="../../assets/admin/layout/img/avatar8.jpg" width="27px" height="27px">
													</a>
													<div class="media-body todo-comment">
														<button type="button" class="todo-comment-btn btn btn-circle btn-default btn-xs">&nbsp; Reply &nbsp;</button>
														<p class="todo-comment-head">
															<span class="todo-comment-username">Christina Aguilera</span> &nbsp; <span class="todo-comment-date">17 Sep 2014 at 2:05pm</span>
							    						</p>
														<p class="todo-text-color">
															 Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis
														</p>
														<!-- Nested media object -->
														<div class="media">
															<a class="pull-left" href="javascript:;">
								    							<img class="todo-userpic" src="../../assets/admin/layout/img/avatar4.jpg" width="27px" height="27px">
															</a>
															<div class="media-body">
																<p class="todo-comment-head">
																	<span class="todo-comment-username">Carles Puyol</span> &nbsp; <span class="todo-comment-date">17 Sep 2014 at 4:30pm</span>
																</p>
																<p class="todo-text-color">
																	 Thanks so much my dear!
																</p>
															</div>
														</div>
													</div>
												</li>
												<li class="media">
													<a class="pull-left" href="javascript:;">
														<img class="todo-userpic" src="../../assets/admin/layout/img/avatar5.jpg" width="27px" height="27px">
													</a>
													<div class="media-body todo-comment">
														<button type="button" class="todo-comment-btn btn btn-circle btn-default btn-xs">&nbsp; Reply &nbsp;</button>
														<p class="todo-comment-head">
															<span class="todo-comment-username">Andres Iniesta</span> &nbsp; <span class="todo-comment-date">18 Sep 2014 at 9:22am</span>
														</p>
														<p class="todo-text-color">
															 Cras sit amet nibh libero, in gravida nulla. Scelerisque ante sollicitudin commodo Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. <br>
														</p>
													</div>
												</li>
												<li class="media">
													<a class="pull-left" href="javascript:;">
												    	<img class="todo-userpic" src="../../assets/admin/layout/img/avatar6.jpg" width="27px" height="27px">
															</a>
																			<div class="media-body todo-comment">
																				<button type="button" class="todo-comment-btn btn btn-circle btn-default btn-xs">&nbsp; Reply &nbsp;</button>
																				<p class="todo-comment-head">
																					<span class="todo-comment-username">Olivia Wilde</span> &nbsp; <span class="todo-comment-date">18 Sep 2014 at 11:50am</span>
																				</p>
																				<p class="todo-text-color">
																					 Cras sit amet nibh libero, in gravida nulla. Scelerisque ante sollicitudin commodo Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. <br>
																				</p>
																			</div>
																		</li>
																	</ul>
																</div>
															</div>
															<!-- END TASK COMMENTS -->
															<!-- TASK COMMENT FORM -->
															<div class="form-group">
																<div class="col-md-12">
																	<ul class="media-list">
																		<li class="media">
																			<img class="todo-userpic pull-left" src="../../assets/admin/layout/img/avatar4.jpg" width="27px" height="27px">
																			<div class="media-body">
																				<textarea class="form-control todo-taskbody-taskdesc" rows="4" placeholder="Type comment..."></textarea>
																			</div>
																		</li>
																	</ul>
																	<button type="button" class="pull-right btn btn-sm btn-circle green-haze"> &nbsp; Submit &nbsp; </button>
																</div>
															</div>
															<!-- END TASK COMMENT FORM -->
														</div>
														<div class="tab-pane" id="tab_2">
															<ul class="todo-task-history">
																<li>
																	<div class="todo-task-history-date">
																		 20 Jun, 2014 at 11:35am
																	</div>
																	<div class="todo-task-history-desc">
																		 Task created
																	</div>
																</li>
																<li>
																	<div class="todo-task-history-date">
																		 21 Jun, 2014 at 10:35pm
																	</div>
																	<div class="todo-task-history-desc">
																		 Task category status changed to "Top Priority"
																	</div>
																</li>
																<li>
																	<div class="todo-task-history-date">
																		 22 Jun, 2014 at 11:35am
																	</div>
																	<div class="todo-task-history-desc">
																		 Task owner changed to "Nick Larson"
																	</div>
																</li>
																<li>
																	<div class="todo-task-history-date">
																		 30 Jun, 2014 at 8:09am
																	</div>
																	<div class="todo-task-history-desc">
																		 Task completed by "Nick Larson"
																	</div>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</form>
				    </div>
			    </div>
		    </div>
	    </div>
    </div>
@stop
@section('page_scripts')
    <script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/assets/global/plugins/select2/select2.min.js"></script>
    <script src="/assets/admin/pages/scripts/todo.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-nestable/jquery.nestable.js"></script>
    <script src="/assets/admin/pages/scripts/ui-nestable.js"></script>
    <script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="/assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
    <script src="/assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
    <script>
    jQuery(document).ready(function() {
       // initiate layout and plugins
       Metronic.init(); // init metronic core components
       Layout.init(); // init current layout
       Demo.init(); // init demo features
       UINestable.init();
       Todo.init(); // init todo page
    });
    </script>

    <script>
        $('.note_action').on('click', function () {
            alert(this.id)
            $.get( this.id, function( data ) {
            $( "#notes" ).html( data );
            })
        });
    </script>
@stop