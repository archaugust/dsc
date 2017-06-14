<div class="o-layout u-ml-35">
<form $AttributesHTML>
	<% if $Message %>
	<p id="{$FormName}_error" class="message $MessageType">$Message</p>
	<% else %>
	<p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
	<% end_if %>

	<div class="o-layout__item u-1/1 u-pl-35"><h4>Personal Details</h4></div><div class="o-layout__item u-pl-35 u-1/3@desktop u-1/1@tablet">
		<label for="Form_MembershipForm_Name">Name<span class="u-red">*</span></label>
		<input type="text" name="Name" class="text u-form-control" id="Form_MembershipForm_Name" required="required" aria-required="true" />
	</div><div class="o-layout__item u-pl-35 u-1/3@desktop u-1/1@tablet">
		<label>Gender<span class="u-red">*</span> <span class="u-gray">(select one)</span></label>
		<div class="u-radio"><span class='radio'>
		<input type="radio" name="Gender" id="Form_MembershipForm_Gender_M" required="required" aria-required="true" value="M" />
		<label for="Form_MembershipForm_Gender_M" class="u-mr-20">M <span></span></label>
		</span>
		<span class='radio'>
		<input type="radio" name="Gender" id="Form_MembershipForm_Gender_F" required="required" aria-required="true" value="F" />
		<label for="Form_MembershipForm_Gender_F">F <span></span></label>
		</span>
		</div>
	</div><div class="o-layout__item u-pl-35 u-1/3@desktop u-1/1@tablet">
		<label for="form_dob">Date of Birth</label>
		<input type="text" name="DateOfBirth" class="u-form-control" id="form_dob" placeholder="Enter a date" />
	</div><div class="o-layout__item u-pl-35 u-1/3@desktop u-1/1@tablet">
		<label for="form_home_phone">Home Phone</label>
		<input type="text" name="HomePhone" id="form_home_phone" class="u-form-control" />
	</div><div class="o-layout__item u-pl-35 u-1/3@desktop u-1/1@tablet">
		<label for="form_mobile_phone">Mobile Phone<span class="u-red">*</span></label>
		<input type="text" name="MobilePhone" id="form_mobile_phone" class="u-form-control" required="required" aria-required="true" />
	</div><div class="o-layout__item u-pl-35 u-1/3@desktop u-1/1@tablet">
		<label for="Form_MembershipForm_Email">Email<span class="u-red">*</span></label>
		<input type="email" name="Email" id="Form_MembershipForm_Email" class="u-form-control" required="required" aria-required="true" />
	</div><div class="o-layout__item u-pl-35 u-1/2@desktop u-1/1@tablet">
		<label for="form_postal_address">Postal Address<span class="u-red">*</span></label>
		<input type="text" name="PostalAddress" id="form_postal_address" class="u-form-control" required="required" aria-required="true" />
	</div><div class="o-layout__item u-pl-35 u-1/6@desktop u-1/1@tablet">
		<label for="form_postcode">Postcode<span class="u-red">*</span></label>
		<input type="text" name="Postcode" id="form_postcode" class="u-form-control" required="required" aria-required="true" />
	</div><div class="o-layout__item u-pl-35 u-1/3@desktop u-1/1@tablet">
		<label>Discipline <span class="u-gray">(select one)</span></label>
		<div class="u-radio">
		<span class='radio'>
		<input type="radio" name="Discipline" id="form_discipline_1" value="Skier" />
		<label for="form_discipline_1">Skier <span></span></label>
		</span>
		<span class='radio'>
		<input type="radio" name="Discipline" id="form_discipline_2" value="Boarder" />
		<label for="form_discipline_2">Boarder <span></span></label>
		</span>
		</div>
	</div><div class="o-layout__item u-pl-35 u-1/1">
		<h4>Medical Details</h4>
	</div><div class="o-layout__item u-pl-35 u-1/2@desktop u-1/1@tablet">
		<label for="form_medical">Medical Condition/Diagnosis<span class="u-red">*</span></label>
		<textarea name="MedicalCondition" id="form_medical" class="u-form-control" required="required" aria-required="true"></textarea>
	</div><div class="o-layout__item u-pl-35 u-1/2@desktop u-1/1@tablet">
		<label for="form_disabling">Disabling Features<span class="u-red">*</span></label>
		<textarea name="DisablingFeatures" id="form_disabling" class="u-form-control" required="required" aria-required="true"></textarea>
	</div><div class="o-layout__item u-pl-35 u-1/2@desktop u-1/1@tablet">
		<label for="form_visual">Visual Problems</label>
		<textarea name="VisualProblems" id="form_visual" class="u-form-control"></textarea>
	</div><div class="o-layout__item u-pl-35 u-1/2@desktop u-1/1@tablet">
		<label for="form_hearing">Hearing Problems</label>
		<textarea name="HearingProblems" id="form_hearing" class="u-form-control"></textarea>
	</div><div class="o-layout__item u-pl-35 u-1/2@desktop u-1/1@tablet">
		<label for="form_communication">Specific Communication Problems</label>
		<textarea name="CommunicationProblems" id="form_communication" class="u-form-control" ></textarea>
	</div><div class="o-layout__item u-pl-35 u-1/2@desktop u-1/1@tablet">
		<label for="form_method">Method of Communication</label>
		<textarea name="MethodOfCommunication" id="form_method" class="u-form-control" ></textarea>
	</div><div class="o-layout__item u-pl-35 u-1/2@desktop u-1/1@tablet">
		<label for="form_in_case">Things We Should Know in an Emergency</label>
		<textarea name="InCaseOfEmergency" id="form_in_case" class="u-form-control" ></textarea>
	</div><div class="o-layout__item u-pl-35 u-1/2@desktop u-1/1@tablet">
	</div><div class="o-layout__item u-pl-35 u-1/3@desktop u-1/1@tablet">
		<label for="form_gp">GP</label>
		<input type="text" name="GP" id="form_gp" class="u-form-control" />
	</div><div class="o-layout__item u-pl-35 u-1/3@desktop u-1/1@tablet">
		<label for="form_medications">Medications</label>
		<input type="text" name="Medications" id="form_medications" class="u-form-control" />
	</div><div class="o-layout__item u-pl-35 u-1/3@desktop u-1/1@tablet">
		<label for="form_allergies">Allergies</label>
		<input type="text" name="Allergies" id="form_allergies" class="u-form-control" />
	</div><div class="o-layout__item u-pl-35 u-1/1">
		<hr />
		<h4>Next of Kin/Guardian</h4>
	</div><div class="o-layout__item u-pl-35 u-1/3@desktop u-1/1@tablet">
		<label for="form_guardian_name">Name<span class="u-red">*</span></label>
		<input type="text" name="GuardianName" id="form_guardian_name" class="u-form-control" required="required" aria-required="true" />
	</div><div class="o-layout__item u-pl-35 u-1/2@desktop u-1/1@tablet">
		<label for="form_guardian_phone">Phone <span class="u-gray">(in case of emergency)</span><span class="u-red">*</span></label>
		<input type="text" name="GuardianPhone" id="form_guardian_phone" class="u-form-control" required="required" aria-required="true" />
	</div><div class="o-layout__item u-pl-35 u-1/1">
		<hr />
		<h4>Membership Fee <span>Payment due by 30th June. Discounted by $5 if paid by 31st  May.</span></h4>
	</div><div class="o-layout__item u-pl-35 u-1/2@desktop u-1/1@tablet">
		<label>Membership Type <span class="u-gray">(select one)</span><span class="u-red">*</span></label>
		<div class="u-radio">
		<span class='radio'>
		<input type="radio" name="MembershipType" id="form_membership_1" value="Individual" required="required" aria-required="true" />
		<label for="form_membership_1">Individual ($75) <span></span></label>
		</span>
		<span class='radio'>
		<input type="radio" name="MembershipType" id="form_membership_2" value="Family" required="required" aria-required="true" />
		<label for="form_membership_2">Family ($100) <span></span></label>
		</span>
		</div>
	</div><div class="o-layout__item u-pl-35 u-1/3@desktop u-1/1@tablet">
		<label for="form_donation">Donation <span class="u-gray">(optional)</span></label>
		<select id="form_donation" name="Donation" class="u-form-control">
			<option value="">Enter Amount</option><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option><option value="60">60</option><option value="65">65</option><option value="70">70</option><option value="75">75</option><option value="80">80</option><option value="85">85</option><option value="90">90</option><option value="95">95</option><option value="100">100</option><option value="150">150</option><option value="200">200</option><option value="250">250</option><option value="300">300</option><option value="350">350</option><option value="400">400</option><option value="450">450</option><option value="500">500</option><option value="550">550</option><option value="600">600</option><option value="650">650</option><option value="700">700</option><option value="750">750</option><option value="800">800</option><option value="850">850</option><option value="900">900</option><option value="950">950</option><option value="1000">1000</option><option value="1050">1050</option><option value="1100">1100</option><option value="1150">1150</option><option value="1200">1200</option><option value="1250">1250</option><option value="1300">1300</option><option value="1350">1350</option><option value="1400">1400</option><option value="1450">1450</option><option value="1500">1500</option><option value="1550">1550</option><option value="1600">1600</option><option value="1650">1650</option><option value="1700">1700</option><option value="1750">1750</option><option value="1800">1800</option><option value="1850">1850</option><option value="1900">1900</option><option value="1950">1950</option><option value="2000">2000</option>	
		</select>
	</div><div class="o-layout__item u-pl-35 u-1/2@desktop u-1/1@tablet">
		<div class="u-radio">
		<span class='radio'>
		<input type="radio" name="Receipt" id="form_receipt" value="1" />
		<label for="form_receipt">Please send a receipt <span></span></label>
		</span>
		</div>
	</div><div class="o-layout__item u-pl-35 u-1/1">
		<p class="o-payment u-hidden"><strong>Thank you, the total due for payment is $<span id="totalDue"></span>.</strong></p>
		<p>If going on camp you need to be a member of DSC and Adaptive Snowsports NZ.</p>
		<p>Members are entitled to discounted skiing at Mt Hutt, Porters, Mt Cheesman and Mt Dobson. Discounts at other fields requires membership of the National Association: Adaptive Snowsports NZ.</p>
		<hr />
		<h4>Confirmation <span class="u-gray">(To be completed by Parent or Guardian if applicant is under 18 years of age)</span></h4>
		<p><br />Disabled Snowsports Canterbury requests your permission to display photographs of members online for the purposes of promotion and marketing. Do you consent to images being used for this purpose?</p>
		
		<div class="u-radio">
		<span class='radio'>
		<input type="radio" name="OnlineConsent" id="form_consent_1" value="1" />
		<label for="form_consent_1">Yes, I consent <span></span></label>
		</span>
		<span class='radio'>
		<input type="radio" name="OnlineConsent" id="form_consent_2" value="0" />
		<label for="form_consent_2">No, I do not consent <span></span></label>
		</span>
		</div>
		
		<p><br />
		<span class='radio'>
		<input type="radio" id="form_terms_1" value="1" required="required" aria-required="true" />
		<label for="form_terms_1"><span></span> I have read and understand DSC’s <a href="/terms-and-conditions">Terms & Conditions</a>. Disabled Snowsports Canterbury (DSC) is hereby permitted to enter the above information into a database for the purpose of membership benefits and statistics and to assist programme coordinators. I understand that DSC, its staff, officers, branches and members will exercise all due care but will not be liable for injury or damage which I or my son/daughter/charge may sustain to person or property. </label>
		</span>
		</p>
	</div><div class="o-layout__item u-pl-35 u-1/1">
		<% loop $Fields %><% if $Title == "Security ID" %><input $AttributesHTML /><% end_if %><% end_loop %>
		<% loop $Actions %>
		$Field
		<% end_loop %>
		<div id="msgDiv"></div>
	</div>

</form>
</div>