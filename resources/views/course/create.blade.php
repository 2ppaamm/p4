@extends('_master')
@section('header')
    Propose Course
@stop

@section('subtitle')
    Author a course for you or others to teach in
@stop

@section('page_styles')
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/select2/select2.css"/>
@stop

@section('content')
	<div class="col-md-12">
		<div class="portlet light" id="form_wizard_1">
			<div class="portlet-title">
				<div class="caption">
					<span class="caption-subject font-green-sharp bold uppercase">
    					<i class="fa fa-gift"></i> Propose Course - <span class="step-title">Step 1 of 4 </span>
					</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
					<a href="javascript:;" class="reload"></a>
					<a href="javascript:;" class="remove"></a>
    			</div>
			</div>
			<div class="portlet-body form">
			    @foreach ($errors->all() as $error)
			        <p class="error">{{ $error }}</p>
			    @endforeach
			    <!-- course/create Form starts -->
		        {!! Form::open([
		            'action' => 'CourseCodeController@store',
		            'id' => 'submit_form',
		            'name'=>'course_create',
		            'class'=>'form-horizontal'
		        ]) !!}
					<div class="form-wizard">
						<div class="form-body">
							<ul class="nav nav-pills nav-justified steps">
								<li>
									<a href="#tab1" data-toggle="tab" class="step">
                                        <span class="number">1 </span>
                                        <span class="desc">
                                        <i class="fa fa-check"></i> Course Author Details </span>
									</a>
								</li>
								<li>
									<a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number">2 </span>
                                        <span class="desc">
                                        <i class="fa fa-check"></i> Course Information </span>
									</a>
								</li>
								<li>
									<a href="#tab3" data-toggle="tab" class="step active">
									    <span class="number">3 </span>
										<span class="desc">
										<i class="fa fa-check"></i> Billing Setup </span>
									</a>
								</li>
								<li>
								    <a href="#tab4" data-toggle="tab" class="step">
                                        <span class="number">4 </span>
                                        <span class="desc">
                                        <i class="fa fa-check"></i> Confirm </span>
									</a>
								</li>
							</ul>
							<div id="bar" class="progress progress-striped" role="progressbar">
								<div class="progress-bar progress-bar-success">
							</div>
						</div>
						<div class="tab-content">
							<div class="alert alert-danger display-none" id=""error-msg">
								<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
							</div>
							<div class="alert alert-success display-none">
								<button class="close" data-dismiss="alert"></button>
								Your form validation is successful!
							</div>
							<div class="tab-pane active" id="tab1">
								<h3 class="block">Provide course author's details</h3>
								<div class="form-group">
									<label class="control-label col-md-3">Course Author</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="course_author" value="{{$user->username}}" readonly/>
											<span class="help-block">The author will be able to view all course materials based on this course, including later versions created by other instructors. </span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Phone Number <span class="required">* </span></label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="phone"/>
										<span class="help-block">Provide your phone number </span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Gender <span class="required">* </span></label>
    								<div class="col-md-4">
										<div class="radio-list">
	           								<label>
											    <input type="radio" name="gender" value="M" data-title="Male"/>Male
											</label>
											<label>
												<input type="radio" name="gender" value="F" data-title="Female"/>Female
											</label>
										</div>
										<div id="form_gender_error"></div>
								    </div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Address <span class="required">* </span></label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="address"/>
										<span class="help-block">
										Provide your street address </span>
									</div>
								</div>
								<div class="form-group">
								<label class="control-label col-md-3">City/Town <span class="required">	* </span></label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="city"/>
										<span class="help-block">
										Provide your city or town </span>
									</div>
								</div>
								<div class="form-group">
    								<label class="control-label col-md-3">Country of Residence</label>
									<div class="col-md-4">
					    				<select name="country" id="country_list" class="form-control">
											<option value=""></option>
											<option value="AF">Afghanistan</option>
											<option value="AL">Albania</option>
											<option value="DZ">Algeria</option>
						    				<option value="AS">American Samoa</option>
											<option value="AD">Andorra</option>
											<option value="AO">Angola</option>
											<option value="AI">Anguilla</option>
											<option value="AQ">Antarctica</option>
											<option value="AR">Argentina</option>
											<option value="AM">Armenia</option>
											<option value="AW">Aruba</option>
											<option value="AU">Australia</option>
											<option value="AT">Austria</option>
											<option value="AZ">Azerbaijan</option>
											<option value="BS">Bahamas</option>
											<option value="BH">Bahrain</option>
											<option value="BD">Bangladesh</option>
											<option value="BB">Barbados</option>
											<option value="BY">Belarus</option>
											<option value="BE">Belgium</option>
											<option value="BZ">Belize</option>
											<option value="BJ">Benin</option>
											<option value="BM">Bermuda</option>
											<option value="BT">Bhutan</option>
											<option value="BO">Bolivia</option>
											<option value="BA">Bosnia and Herzegowina</option>
											<option value="BW">Botswana</option>
											<option value="BV">Bouvet Island</option>
											<option value="BR">Brazil</option>
											<option value="IO">British Indian Ocean Territory</option>
											<option value="BN">Brunei Darussalam</option>
											<option value="BG">Bulgaria</option>
											<option value="BF">Burkina Faso</option>
											<option value="BI">Burundi</option>
											<option value="KH">Cambodia</option>
											<option value="CM">Cameroon</option>
											<option value="CA">Canada</option>
											<option value="CV">Cape Verde</option>
											<option value="KY">Cayman Islands</option>
											<option value="CF">Central African Republic</option>
											<option value="TD">Chad</option>
											<option value="CL">Chile</option>
											<option value="CN">China</option>
											<option value="CX">Christmas Island</option>
											<option value="CC">Cocos (Keeling) Islands</option>
											<option value="CO">Colombia</option>
											<option value="KM">Comoros</option>
											<option value="CG">Congo</option>
											<option value="CD">Congo, the Democratic Republic of the</option>
											<option value="CK">Cook Islands</option>
											<option value="CR">Costa Rica</option>
											<option value="CI">Cote d'Ivoire</option>
											<option value="HR">Croatia (Hrvatska)</option>
											<option value="CU">Cuba</option>
											<option value="CY">Cyprus</option>
											<option value="CZ">Czech Republic</option>
											<option value="DK">Denmark</option>
											<option value="DJ">Djibouti</option>
	    									<option value="DM">Dominica</option>
											<option value="DO">Dominican Republic</option>
											<option value="EC">Ecuador</option>
											<option value="EG">Egypt</option>
											<option value="SV">El Salvador</option>
											<option value="GQ">Equatorial Guinea</option>
											<option value="ER">Eritrea</option>
											<option value="EE">Estonia</option>
											<option value="ET">Ethiopia</option>
											<option value="FK">Falkland Islands (Malvinas)</option>
											<option value="FO">Faroe Islands</option>
											<option value="FJ">Fiji</option>
											<option value="FI">Finland</option>
											<option value="FR">France</option>
											<option value="GF">French Guiana</option>
											<option value="PF">French Polynesia</option>
											<option value="TF">French Southern Territories</option>
											<option value="GA">Gabon</option>
											<option value="GM">Gambia</option>
											<option value="GE">Georgia</option>
											<option value="DE">Germany</option>
								    		<option value="GH">Ghana</option>
											<option value="GI">Gibraltar</option>
											<option value="GR">Greece</option>
											<option value="GL">Greenland</option>
											<option value="GD">Grenada</option>
											<option value="GP">Guadeloupe</option>
											<option value="GU">Guam</option>
											<option value="GT">Guatemala</option>
											<option value="GN">Guinea</option>
											<option value="GW">Guinea-Bissau</option>
											<option value="GY">Guyana</option>
											<option value="HT">Haiti</option>
											<option value="HM">Heard and Mc Donald Islands</option>
											<option value="VA">Holy See (Vatican City State)</option>
											<option value="HN">Honduras</option>
											<option value="HK">Hong Kong</option>
											<option value="HU">Hungary</option>
											<option value="IS">Iceland</option>
											<option value="IN">India</option>
											<option value="ID">Indonesia</option>
											<option value="IR">Iran (Islamic Republic of)</option>
											<option value="IQ">Iraq</option>
											<option value="IE">Ireland</option>
											<option value="IL">Israel</option>
											<option value="IT">Italy</option>
											<option value="JM">Jamaica</option>
											<option value="JP">Japan</option>
											<option value="JO">Jordan</option>
											<option value="KZ">Kazakhstan</option>
											<option value="KE">Kenya</option>
											<option value="KI">Kiribati</option>
											<option value="KP">Korea, Democratic People's Republic of</option>
											<option value="KR">Korea, Republic of</option>
											<option value="KW">Kuwait</option>
											<option value="KG">Kyrgyzstan</option>
											<option value="LA">Lao People's Democratic Republic</option>
											<option value="LV">Latvia</option>
											<option value="LB">Lebanon</option>
											<option value="LS">Lesotho</option>
											<option value="LR">Liberia</option>
											<option value="LY">Libyan Arab Jamahiriya</option>
											<option value="LI">Liechtenstein</option>
											<option value="LT">Lithuania</option>
											<option value="LU">Luxembourg</option>
											<option value="MO">Macau</option>
											<option value="MK">Macedonia, The Former Yugoslav Republic of</option>
											<option value="MG">Madagascar</option>
											<option value="MW">Malawi</option>
											<option value="MY">Malaysia</option>
											<option value="MV">Maldives</option>
											<option value="ML">Mali</option>
											<option value="MT">Malta</option>
											<option value="MH">Marshall Islands</option>
											<option value="MQ">Martinique</option>
											<option value="MR">Mauritania</option>
											<option value="MU">Mauritius</option>
											<option value="YT">Mayotte</option>
											<option value="MX">Mexico</option>
											<option value="FM">Micronesia, Federated States of</option>
											<option value="MD">Moldova, Republic of</option>
											<option value="MC">Monaco</option>
		    								<option value="MN">Mongolia</option>
											<option value="MS">Montserrat</option>
											<option value="MA">Morocco</option>
											<option value="MZ">Mozambique</option>
											<option value="MM">Myanmar</option>
											<option value="NA">Namibia</option>
											<option value="NR">Nauru</option>
											<option value="NP">Nepal</option>
											<option value="NL">Netherlands</option>
											<option value="AN">Netherlands Antilles</option>
											<option value="NC">New Caledonia</option>
											<option value="NZ">New Zealand</option>
											<option value="NI">Nicaragua</option>
											<option value="NE">Niger</option>
											<option value="NG">Nigeria</option>
											<option value="NU">Niue</option>
											<option value="NF">Norfolk Island</option>
											<option value="MP">Northern Mariana Islands</option>
											<option value="NO">Norway</option>
											<option value="OM">Oman</option>
											<option value="PK">Pakistan</option>
											<option value="PW">Palau</option>
											<option value="PA">Panama</option>
			    							<option value="PG">Papua New Guinea</option>
											<option value="PY">Paraguay</option>
											<option value="PE">Peru</option>
											<option value="PH">Philippines</option>
											<option value="PN">Pitcairn</option>
											<option value="PL">Poland</option>
											<option value="PT">Portugal</option>
											<option value="PR">Puerto Rico</option>
											<option value="QA">Qatar</option>
											<option value="RE">Reunion</option>
				    						<option value="RO">Romania</option>
											<option value="RU">Russian Federation</option>
					    					<option value="RW">Rwanda</option>
											<option value="KN">Saint Kitts and Nevis</option>
											<option value="LC">Saint LUCIA</option>
											<option value="VC">Saint Vincent and the Grenadines</option>
											<option value="WS">Samoa</option>
											<option value="SM">San Marino</option>
											<option value="ST">Sao Tome and Principe</option>
											<option value="SA">Saudi Arabia</option>
											<option value="SN">Senegal</option>
											<option value="SC">Seychelles</option>
											<option value="SL">Sierra Leone</option>
											<option value="SG">Singapore</option>
											<option value="SK">Slovakia (Slovak Republic)</option>
											<option value="SI">Slovenia</option>
											<option value="SB">Solomon Islands</option>
											<option value="SO">Somalia</option>
											<option value="ZA">South Africa</option>
											<option value="GS">South Georgia and the South Sandwich Islands</option>
											<option value="ES">Spain</option>
											<option value="LK">Sri Lanka</option>
											<option value="SH">St. Helena</option>
											<option value="PM">St. Pierre and Miquelon</option>
											<option value="SD">Sudan</option>
											<option value="SR">Suriname</option>
											<option value="SJ">Svalbard and Jan Mayen Islands</option>
							    			<option value="SZ">Swaziland</option>
											<option value="SE">Sweden</option>
											<option value="CH">Switzerland</option>
											<option value="SY">Syrian Arab Republic</option>
											<option value="TW">Taiwan, Province of China</option>
											<option value="TJ">Tajikistan</option>
											<option value="TZ">Tanzania, United Republic of</option>
											<option value="TH">Thailand</option>
											<option value="TG">Togo</option>
											<option value="TK">Tokelau</option>
						    				<option value="TO">Tonga</option>
											<option value="TT">Trinidad and Tobago</option>
											<option value="TN">Tunisia</option>
											<option value="TR">Turkey</option>
											<option value="TM">Turkmenistan</option>
											<option value="TC">Turks and Caicos Islands</option>
											<option value="TV">Tuvalu</option>
											<option value="UG">Uganda</option>
											<option value="UA">Ukraine</option>
											<option value="AE">United Arab Emirates</option>
											<option value="GB">United Kingdom</option>
											<option value="US">United States</option>
											<option value="UM">United States Minor Outlying Islands</option>
											<option value="UY">Uruguay</option>
											<option value="UZ">Uzbekistan</option>
											<option value="VU">Vanuatu</option>
											<option value="VE">Venezuela</option>
											<option value="VN">Viet Nam</option>
											<option value="VG">Virgin Islands (British)</option>
											<option value="VI">Virgin Islands (U.S.)</option>
											<option value="WF">Wallis and Futuna Islands</option>
											<option value="EH">Western Sahara</option>
											<option value="YE">Yemen</option>
											<option value="ZM">Zambia</option>
											<option value="ZW">Zimbabwe</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Curriculum Vitae or Resume <span class="required">* </span></label>
									<div class="col-md-4">
                                           {!! Form::file('resume', ['name'=>'resume','class' => 'form-control', 'required']) !!}
										<span class="help-block">Attach your resume in pdf format. </span>
									</div>
								</div>
							</div>

<!-- Beginning of Page 2 of form -->
							<div class="tab-pane" id="tab2">
								<h3 class="block">Provide the course details</h3>
								<div class="form-group">
									<label class="control-label col-md-3">Name of course <span class="required">* </span></label>
									<div class="col-md-4">
									    <input type="text" class="form-control" name="course_title"/>
										<span class="help-block">Provide a name for the course </span>
									</div>
								</div>
								<div class="form-group">
								    <!-- Course_type form input -->
    								<label class="control-label col-md-3">Course Type <span class="required">* </span></label>
									<div class="col-md-4">
                                           {!! Form::select('course_type', ['']+$course_types, Input::old('course_types'),[
                                               'class'=>'form-control', 'required',
                                           ]) !!}
										<span class="help-block">Provide course_type </span>
								    <!-- end: Select input from database for Course_type -->
									</div>
								</div>
								<div class="form-group">
								    <!-- Subject form input -->
    								<label class="control-label col-md-3">Subject <span class="required">* </span></label>
									<div class="col-md-4">
										<select name="subject" id="subject" class="form-control">
											<option value=""></option>
											@foreach($subject_list as $subject)
    											<option value="{{$subject->id}}">{{$subject->description}}|Framework: {{$subject->framework->framework}}</option>
    										@endforeach
    									</select>
										<span class="help-block">Select subject </span>
								    <!-- end: Select input from database for Subject -->
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Course Description <span class="required">* </span></label>
									<div class="col-md-4">
										<!-- Course_history form input -->
								        {!! Form::textarea('course_description', null,[
								            'class' => 'form-control',
								            'id' => 'course_description',
								            'placeholder' => 'Provide a concise course description.'
							            ]) !!}
    				    			    <!-- end: text input Course_history -->
    		    						<span class="help-block">Provide information on where else this course is being taught and links to them. </span>
		    						</div>
			    				</div>
								<div class="form-group">
									<label class="control-label col-md-3">Pre-requisite framework level <span class="required">* </span></label>
									<div class="col-md-4">
									<!-- Pre-req level form input -->
									<input type="number" step="100" class="form-control" id="prereq" name="prereq" min="0" max="1300"/>
				    			    <!-- end: number input Pre-req -->
    		    						<span class="help-block">Choose pre-requisite required to start course </span>
		    						</div>
			    				</div>
								<div class="form-group">
									<label class="control-label col-md-3">Target framework level <span class="required">* </span></label>
									<div class="col-md-4">
									<!-- Target level form input -->
									<input type="number" step="100" class="form-control" id="target" name="target" min="0" max="1300"/>
				    			    <!-- end: number input target level -->
    		    						<span class="help-block">The expected framework level when student completes course </span>
		    						</div>
			    				</div>
								<div class="form-group">
									<label class="control-label col-md-3">Cost per course <span class="required">* </span></label>
									<div class="col-md-4">
                                        <!-- Cost form input -->
                                        <input type="number" step="0" class="form-control" id="cost" name="cost" min="0" max="1300"/>
                                        <!-- end: number input target level -->
                                        <span class="help-block">Rolling courses will be charged quarterly. </span>
		    						</div>
		    					</div>
							</div>
<!-- Beginning of Page 3 of form -->
    						<div class="tab-pane" id="tab3">
								<h3 class="block">More course details</h3>
								<div class="form-group">
									<label class="control-label col-md-3">Course History <span class="required">* </span></label>
									<div class="col-md-4">
										<!-- Course_history form input -->
									    <div class="form-group">
									        {!! Form::textarea('course_history', null,[
									            'class' => 'form-control',
									            'id' => 'course_history',
									            'placeholder' => 'Course history. We give priority to courses that has been taught successfully before.'
									            ]) !!}
					    			    <!-- end: text input Course_history -->
    			    						<span class="help-block">Provide information on where else this course is being taught and links to them. </span>
	    								</div>
		    						</div>
			    				</div>
								<div class="form-group">
									<label class="control-label col-md-3">Image or Cover for course <span class="required">* </span></label>
									<div class="col-md-4">
                                           {!! Form::file('cover', ['name'=>'cover','class' => 'form-control', 'required']) !!}
										<span class="help-block">Provide an image for your course </span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Paypal email address <span class="required">* </span></label>
									<div class="col-md-4">
										<input type="email" class="form-control" name="paypal_email"/>
										<span class="help-block">Provide your paypal details. We pay after course completion, and monthly for rolling courses.</span>
									</div>
								</div>
    							<div class="form-group">
									<label class="control-label col-md-3">Other information </label>
									<div class="col-md-4">
									    <!-- Otherinfo form input -->
									        <div class="form-group">
									            {!! Form::textarea('otherinfo', null,[
									                'class' => 'form-control',
									                'id' => 'otherinfo',
									                'placeholder' => 'Other relevant information about the course to help us evaluate.'
									                ]) !!}
									        </div>
									     <!-- end: text input Otherinfo -->
									</div>
								</div>
								</div>
<!-- Beginning of Page 4 of form confirmation -->
								<div class="tab-pane" id="tab4">
									<h3 class="block">Confirm your course proposal</h3>
									<h4 class="form-section">Author details</h4>
									<div class="form-group">
										<label class="control-label col-md-3">Course Author:</label>
										<div class="col-md-4">
											<p class="form-control-static" data-display="course_author"></p>
										</div>
									</div>
										<div class="form-group">
											<label class="control-label col-md-3">Gender:</label>
											<div class="col-md-4">
    											<p class="form-control-static" data-display="gender"></p>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Phone:</label>
											<div class="col-md-4">
												<p class="form-control-static" data-display="phone"></p>
										    </div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Address:</label>
											<div class="col-md-4">
												<p class="form-control-static" data-display="address"></p>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">City/Town:</label>
											<div class="col-md-4">
													<p class="form-control-static" data-display="city"></p>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Country:</label>
											<div class="col-md-4">
												<p class="form-control-static" data-display="country"></p>
											</div>
										</div>
											<!-- Course Information -->
										<h4 class="form-section">Course Information</h4>
										<div class="form-group">
											<label class="control-label col-md-3">Course Title:</label>
											<div class="col-md-4">
												<p class="form-control-static" data-display="course_title"></p>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Course Description:</label>
											<div class="col-md-4">
												<p class="form-control-static" data-display="course_description"></p>
	    									</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Pre-requisite: </label>
	    									<div class="col-md-4">
												<p class="form-control-static" data-display="prereq"></p>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Target: </label>
											<div class="col-md-4">
												<p class="form-control-static" data-display="target"></p>
											</div>
    									</div>
										<div class="form-group">
											<label class="control-label col-md-3">Cost: US$</label>
											<div class="col-md-4">
													<p class="form-control-static" data-display="cost"></p>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Course History</label>
											<div class="col-md-4">
													<p class="form-control-static" data-display="course_history"></p>
											</div>
										</div>
										<h4 class="form-section">Payment to author</h4>
										<div class="form-group">
											<label class="control-label col-md-3">Paypal email:</label>
											<div class="col-md-4">
												<p class="form-control-static" data-display="paypal_email"></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions">
		    					<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<a href="javascript:;" class="btn default button-previous">
											<i class="m-icon-swapleft"></i> Back </a>
											<a href="javascript:;" class="btn blue button-next">
											Continue <i class="m-icon-swapright m-icon-white"></i>
											</a>
											<a href="javascript:;" class="btn green button-submit">
												Submit <i class="m-icon-swapright m-icon-white"></i>
											    <button type="submit" style="display: block" id="course_code_submit"></button>        <!-- hide a submit button -->
											</a>
										</div>
									</div>
								</div>
							</div>
                        {!! Form::close() !!}
                        <!--  Form ends -->
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('page_scripts')
<script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/form-wizard.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   FormWizard.init();
});
</script>

@stop