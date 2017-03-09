<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Syaf_pdf extends CI_Controller {

  

    function __construct(){

        parent::__construct();

        $this->load->library("Pdf");

    }

  

    public function create_pdf() {

		/* get data */

		$this->load->model('Syaf_model');

		$syafId = $this->uri->segment(3);

		$syaf = $this->Syaf_model->createPdf($syafId);
		$syf = $this->Syaf_model->checkAgent($syafId);
		$citiz = $this->Syaf_model->createPdfCitiz($syaf[0]['cId']);
		$cont = $this->Syaf_model->createPdfCont($syaf[0]['cntId']);

		/* get data  */

		

		$firstName = $syaf[0]['firstName'];

		$lastName = $syaf[0]['lastName'];

		$dob = $syaf[0]['dob'];

		$stuId = $syaf[0]['stuId'];

		$email = $syaf[0]['cdEmail'];

		$address = $syaf[0]['cdAdd'];

		$telephone = $syaf[0]['cdTel'];

		$courseName = $syaf[0]['courseName'];

		$ppVisaDate = $syaf[0]['ppVisaDate'];

		$iExpiryDate = $syaf[0]['iExpiryDate'];

		$signName = $syaf[0]['signName'];

		$sign_date = $syaf[0]['sign_date'];

		$proposedStartDate = $syaf[0]['proposedStartDate'];

		$proposedFinishDate = $syaf[0]['proposedFinishDate'];

		$avgMarks = $syaf[0]['avgMarks'];

		$attendance = $syaf[0]['attendance'];

		$ieltsDate = $syaf[0]['ieltsDate'];

		if($ieltsDate == "0000-00-00"){

			$ieltsDate = "";

			$ieltsE = "No";

		}else{

			$ieltsE = "Yes";

		}

		$img = base_url().'ntec_uploads/signature/'.$signName;
		
		$schlrShip = $syaf[0]['schlrShip'];
		if($schlrShip == 0){
			$schlrShip = "00";
		}
		$discount = $syaf[0]['discount'];
		if($discount == 0){
			$discount = "00";
		}
		$criterion = $syaf[0]['criterion'];
		if($criterion == 0){
			$criterion = "0.00";
		}
		$fee = $syaf[0]['fee'];
		$resourseFee = $syaf[0]['resourseFee'];
		$insuranceFee = $syaf[0]['insuranceFee'];
		$aosd = 0;
		$nw_fee = 0;
		$total = 0;
		if($schlrShip != 0 && $discount == 0 && $criterion == 0){
			$aosd = ($fee * $schlrShip) / 100;
			$nw_fee = $fee - $aosd;
			$total = $nw_fee + $resourseFee + $insuranceFee;
		}
		if($schlrShip == 0 && $discount != 0 && $criterion == 0){
			$aosd = ($fee * $discount) / 100;
			$nw_fee = $fee - $aosd;
			$total = $nw_fee + $resourseFee + $insuranceFee;
		}
		if($schlrShip == 0 && $discount == 0 && $criterion != 0){
			$aosd = $criterion;
			$nw_fee = $fee - $criterion;
			$total = $nw_fee + $resourseFee + $insuranceFee;
		}
		
		$preferredName = $syaf[0]['preferredName'];
		$gender = $syaf[0]['gender'];
		if($gender == 1){
			$gender = "Male";
		}else{
			$gender = "Female";
		}
		$countryName = $cont[0]['countryName'];
		$citizenshipName = $citiz[0]['citizenshipName'];
		$ppNumber = $syaf[0]['ppNumber'];
		$ppIssueDate = $syaf[0]['ppIssueDate'];
		$ppExpiryDate = $syaf[0]['ppExpiryDate'];
		$disaDescription = $syaf[0]['disaDescription'];
		$disa = "";
		if($disaDescription == "NA"){
			$disa = "No";
		}
		else{
			$disa = "Yes";
		}
		$fax = $syaf[0]['cdFax'];
		
		$agentName = "NA";
		$ageAdd = "NA";
		$ageTele = "NA";
		$ageFax = "NA";
		$ageEmail = "NA";
		
		if(count($syf) > 0){
			$agentName = $syf[0]['agentName'];
			$ageAdd = $syf[0]['ageAdd'];
			$ageTele = $syf[0]['ageTele'];
			$ageFax = $syf[0]['ageFax'];
			$ageEmail = $syf[0]['ageEmail'];
		}
		
		$echName = $syaf[0]['echName'];
		$echRelationship = $syaf[0]['echRelationship'];
		$echAdd = $syaf[0]['echAdd'];
		$echTele = $syaf[0]['echTele'];
		$echEmail = $syaf[0]['echEmail'];
		
		$ecnzName = $syaf[0]['ecnzName'];
		$ecnzRelationship = $syaf[0]['ecnzRelationship'];
		$ecnzAdd = $syaf[0]['ecnzAdd'];
		$ecnzTele = $syaf[0]['ecnzTele'];
		$ecnzEmail = $syaf[0]['ecnzEmail'];
		
		$ss = $this->Syaf_model->createPdfSS($syaf[0]['uId']);
		$k = 0;
		 $secondarystudies = '<tr bgcolor="#f8f8f0"><td colspan="1"></td><td colspan="1"></td><td colspan="1"></td><td colspan="1"></td></tr>';
		  
		  while ($k < count($ss)) {
		  $secondarystudies = '<tr bgcolor="#f8f8f0">
		
			<td colspan="1">'.$ss[$k]['qualification'].'</td>
		
			<td colspan="1">'.$ss[$k]['institution'].'</td>
		
			<td colspan="1">'.$ss[$k]['countryName'].'</td>
		
			<td colspan="1">'.$ss[$k]['dateCompleted'].'</td>
		
		  </tr>';
		  $k++;
		  }
		  
		  $ts = $this->Syaf_model->createPdfTS($syaf[0]['uId']);
		$n = 0;
		 $tertiarystudies = '<tr bgcolor="#f8f8f0"><td colspan="1"></td><td colspan="1"></td><td colspan="1"></td><td colspan="1"></td></tr>';
		  
		  while ($n < count($ts)) {
		  $tertiarystudies = '<tr bgcolor="#f8f8f0">
		
			<td colspan="1">'.$ts[$n]['qualification'].'</td>
		
			<td colspan="1">'.$ts[$n]['institution'].'</td>
		
			<td colspan="1">'.$ts[$n]['countryName'].'</td>
		
			<td colspan="1">'.$ts[$n]['dateCompleted'].'</td>
		
		  </tr>';
		  $n++;
		  }
		  
		  $cp = $this->Syaf_model->createPdfCP($syaf[0]['uId']);

		$b = 0;
		 $currentprogramme = '<tr bgcolor="#f8f8f0"><td colspan="3">&nbsp;</td><td colspan="1">&nbsp;</td><td colspan="1">&nbsp;</td><td colspan="1">&nbsp;</td><td colspan="2">&nbsp;</td></tr>';
		  
		  while ($b < count($cp)) {
			  
			  $str = explode("-",$cp[$b]['courseName']);
				$datetime1 = new DateTime($cp[$b]['proposedStartDate']);
				$datetime2 = new DateTime($cp[$b]['proposedFinishDate']);
				$interval = $datetime1->diff($datetime2);

		  $currentprogramme = '<tr bgcolor="#f8f8f0">

            <td colspan="3">'.$str[0].'</td>

            <td colspan="1">'.$str[1].'</td>

            <td colspan="1">'.$interval->format('%y Y %m M %d D').'</td>

            <td colspan="1">'.$cp[$b]['campusName'].'</td>

            <td colspan="2">'.$cp[$b]['proposedStartDate'].'</td>

        </tr>';
		  $b++;
		  }

 

    // create new PDF document

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

  

    // set document information

    $pdf->SetCreator(PDF_CREATOR);

    $pdf->SetAuthor('Krishan Eranda  Buddi Purnima');

    $pdf->SetTitle('Request for change of Campus / School / Programme');

    $pdf->SetSubject('CSP');

    $pdf->SetKeywords('Campus, School, Programme');   

  

    // set default header data

    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'National Tertiary Education Consortium Report', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));

    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 

	

	// remove default header/footer

	$pdf->setPrintHeader(false);

	//$pdf->setPrintFooter(false);

  

    // set header and footer fonts

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  

  

	// set default monospaced font

	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  

    // set margins

    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    

  

    // set auto page breaks

    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 

  

    // set image scale factor

    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  

  

    // set some language-dependent strings (optional)

    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {

        require_once(dirname(__FILE__).'/lang/eng.php');

        $pdf->setLanguageArray($l);

    }   

  

    // ---------------------------------------------------------    

  

    // set default font subsetting mode

    $pdf->setFontSubsetting(true);   

  

    // Set font

    // dejavusans is a UTF-8 Unicode font, if you only need to

    // print standard ASCII chars, you can use core fonts like

    // helvetica or times to reduce file size.

    $pdf->SetFont('dejavusans', '', 10, '', true);   

  

    // Add a page

    // This method has several options, check the source code documentation for more information.

    $pdf->AddPage(); 

  

    // set text shadow effect

    //$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    

  

  

// create some HTML content

$html ='<table cellspacing="0" class="table table-bordered" style="width:100%; background-color: #003366; color:#fff; padding:10px 0px 10px 0px;">

        <tr>

            <th style="text-align:center;"><h1>2<sup>nd</sup> year : Application Form</h1></th>

        </tr>

    </table>

	<table>

		<tr>

			<td>&nbsp;&nbsp;</td>

		</tr>

	</table>

    <br/>

    <table class="table table-bordered" cellpadding="5" cellspacing="1">

	   <tr bgcolor="#E1DEDA">

            <td>&nbsp;</td>

            <td colspan="2"><sup>(First Name)</sup></td>

            <td colspan="2"><sup>(Last Name)</sup></td>

        </tr>

        <tr bgcolor="#f8f8f0" style="border-bottom:2px solid #000;">

            <td>Name</td>

            <td colspan="2">'.$firstName.'</td>

            <td colspan="2">'.$lastName.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td>Date of Birth</td>

            <td colspan="2">'.$dob.'</td>

            <td>Student ID No</td>

            <td>'.$stuId.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td>Email</td>

            <td colspan="4">'.$email.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td>Current Address</td>

            <td colspan="2">'.$address.'</td>

            <td>Mobile No</td>

            <td>'.$telephone.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td>Course you are applying for</td>

            <td colspan="4">'.$courseName.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td>Your current visa expiration date</td>

            <td colspan="2">'.$ppVisaDate.'</td>

            <td>Your current Insurance expiration date</td>

            <td>'.$iExpiryDate.'</td>

        </tr>

    </table>

<br/>

    <table class="table table-bordered" cellpadding="5" cellspacing="5">
		
		<tr>

            <td colspan="2"><img src="'.$img.'" alt="test alt attribute" height="50" border="0" /></td>

            <td colspan="2" align="right">'.$sign_date.'</td>

        </tr>
		
		<tr>

            <td colspan="2">Student <sup>&nbsp;</sup>s Signature</td>

            <td colspan="2" align="right">Date</td>

        </tr>

    </table>

<br/>



    <table class="table table-bordered" cellpadding="5" cellspacing="0">

        <tr bgcolor="#565656" style="color:#fff;">

            <td class="text-center">..::: Office Use Only :::..</td>

        </tr>

    </table>

<br/>

    <table width="100%" class="table table-bordered" cellpadding="2" cellspacing="1">

        <tr bgcolor="#f8f8f0">

            <td rowspan="2">Course</td>

            <td colspan="2">Course (Term) Start Date</td>

            <td colspan="2">'.$proposedStartDate.'</td>

            <td colspan="2">Average Marks</td>

            <td>'.$avgMarks.'</td>

            <td>%</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="2">Course Completion Date</td>

            <td colspan="2">'.$proposedFinishDate.'</td>

            <td colspan="2">Attendance</td>

            <td>'.$attendance.'</td>

            <td>%</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="1">English Test</td>

            <td colspan="2">IELTS Internal Test </td>

            <td colspan="2">'.$ieltsE.'</td>

            <td colspan="2">Test Date</td>

            <td colspan="2">'.$ieltsDate.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="1">Scholarship/Discount</td>

            <td colspan="2">Scholarship</td>

            <td>'.$schlrShip.'</td>

            <td>%</td>

            <td>Discount</td>

            <td>'.$discount.'</td>

            <td>%&nbsp; <b>OR</b></td>

            <td>'.$criterion.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td rowspan="5">Fees</td>

            <td colspan="3">(Original 2nd yr tuition fee)</td>

            <td colspan="1" align="center">$</td>

            <td colspan="4">'.$fee.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">(Amount of scholarship/Discount)</td>

            <td colspan="1" align="center">-$</td>

            <td colspan="4">'.$aosd.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">(New tuition fee)</td>

            <td colspan="1" align="center">=$</td>

            <td colspan="4">'.$nw_fee.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">(Resource fee)</td>

            <td colspan="1" align="center">+$</td>

            <td colspan="4">'.$resourseFee.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">(Insurance fee)</td>

            <td colspan="1" align="center">+$</td>

            <td colspan="0">'.$insuranceFee.'</td>

            <td colspan="2">=Total fee : $</td>

            <td>'.$total.'</td>

        </tr>

    </table>

<br/>

    <table class="table table-bordered" cellpadding="2" cellspacing="2">

        <tr bgcolor="#f8f8f0">

            <td>(Note):</td>

        </tr>

    </table>';

	

// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');



// reset pointer to the last page

$pdf->lastPage();	

 

// ---------------------------------------------------------    



// add a page

$pdf->AddPage();



$html ='<table class="table table-bordered" cellpadding="5" cellspacing="1">

        <tr bgcolor="#565656" style="color:#fff;">

            <th colspan="6">Personal Details (as shown in passport)</th>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">Family Name </td>



            <td>'.$lastName.'</td>

            <td>First Name(s)</td>

            <td>'.$firstName.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="4">Preferred Name</td>

            <td colspan="2">'.$preferredName.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">Date of Birth</td>

            <td>'.$dob.'</td>

            <td>Gender</td>

            <td>'.$gender.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">Citizenship</td>

            <td>'.$citizenshipName.'</td>

            <td>Country of Birth</td>

            <td>'.$countryName.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td>Passport Number</td>

            <td>'.$ppNumber.'</td>

            <td>Issue Date</td>

            <td>'.$ppIssueDate.'</td>

            <td>Expiray Date</td>

            <td>'.$ppExpiryDate.'</td>

        </tr>

       <tr bgcolor="#f8f8f0">

            <td colspan="6">Disability</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="6" style="font-size:11px;">The following information will help us improve services for students with disabilities.The information you supply is confidential.<br />

            </td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3" style="font-size:11px;">Do you live with the effects of significant injury,long-term mental/physical illness or disability?</td>

            <td colspan="3">'.$disa.'</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="4">If Yes ,Please describe this disability</td>

            <td colspan="2">'.$disaDescription.'</td>

        </tr>

    </table>



    <table width="100%" cellpadding="0" cellspacing="0">

        <tr>

            <td align="left">

				<table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

                    <tr bgcolor="#565656" style="color:#fff;">

                        <th colspan="4">Applicant Contact Details</th>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td colspan="" rowspan="2">Address</td>

                        <td colspan="3">'.$address.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td colspan="3">&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Telephone</td>

                        <td>'.$telephone.'</td>

                        <td>Fax</td>

                        <td>'.$fax.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td colspan="2">Email</td>

                        <td colspan="2">'.$email.'</td>

                    </tr>

                </table>

            </td>

            <td>

            	<table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

                    <tr bgcolor="#565656" style="color:#fff;">

                        <th colspan="4">Agent Contact(for approved Ntec agent,if applicable)</th>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td colspan="2">Agent Name</td>

                        <td colspan="2">'.$agentName.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td colspan="2">Address</td>

                        <td colspan="2">'.$ageAdd.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Telephone</td>

                        <td>'.$ageTele.'</td>

                        <td>Fax</td>

                        <td>'.$ageFax.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td colspan="2">Email</td>

                        <td colspan="2">'.$ageEmail.'</td>

                    </tr>

                </table>

            </td>

        </tr>

        <tr>

            <td>

				<table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

                    <tr bgcolor="#565656" style="color:#fff;">

                       <th colspan="2">Parents Contact Details* or Emergency Contact(Home Country) *for student aged under 18</th>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Name</td>

                        <td>'.$echName.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Relationship with you</td>

                        <td>'.$echRelationship.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Address</td>

                        <td>'.$echAdd.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Tel/mobile number</td>

                        <td>'.$echTele.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Email</td>

                        <td>'.$echEmail.'</td>

                    </tr>

                </table>

            </td>

            <td>

                <table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

                    <tr bgcolor="#565656" style="color:#fff;">

                        <th colspan="2">Emergency Contact in New Zealand(If any)</th>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Name</td>

                        <td>'.$ecnzName.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Relationship with you</td>

                        <td>'.$ecnzRelationship.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Address</td>

                        <td>'.$ecnzAdd.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Tel/mobile number</td>

                        <td>'.$ecnzTele.'</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Email</td>

                        <td>'.$ecnzEmail.'</td>

                    </tr>

                </table>

            </td>

        </tr>

    </table>



    <table class="table table-bordered" cellpadding="5" cellspacing="1">

        <tr bgcolor="#565656" style="color:#fff;">

            <th colspan="3">Programme Title</th>

            <th colspan="1">NZQA Level</th>

            <th colspan="1">Duration</th>

            <th colspan="1">Campus</th>

            <th colspan="2">Proposed Start Date</th>

        </tr>'.$currentprogramme.'
    </table>

    <table class="table" cellpadding="5" cellspacing="1">

        <tr bgcolor="#565656" style="color:#fff;">

            <td>What are your career intensions and goals?How will pursuing this programme of study assist you in achieving those goal?</td>

        </tr>

        <tr>

            <td>&nbsp;</td>

        </tr>

    </table>

    <table class="table" border="2" bordercolor="#FF0000" cellpadding="5" cellspacing="1">

        <tr bgcolor="#565656" style="color:#fff;">

            <th>What are your immediate plans after you have completed this programme of study?</th>

        </tr>

        <tr>

            <td style="font-size:11px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nulla tellus, lacinia nec tempus id, porttitor in urna. Aliquam sodales luctus tempor. Aenean a lacus convallis, mattis enim a, mattis ipsum. Quisque eu odio a massa auctor tincidunt. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla sed justo turpis.</td>

        </tr>

    </table>';



// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');



// reset pointer to the last page

$pdf->lastPage();

// ---------------------------------------------------------    



// add a page

$pdf->AddPage();



$html ='<table class="table table-bordered" cellpadding="5" cellspacing="1">

  <tr bgcolor="#565656" style="color:#fff;">

    <th colspan="4">Educational Background Details</th>

  </tr>

  <tr>

    <th colspan="4">Secondary Studies (high school/secondary school)</th>

  </tr>

  <tr bgcolor="#E8E6C7">

    <td	>Highest qualification gained</td>

    <td>Institution</td>

    <td>Country</td>

    <td>Date Completed</td>

  </tr>'.$secondarystudies.'<tr>

    <td colspan="4">Tertiary Studies(college/university/polytechnic)</td>

  </tr>

  <tr bgcolor="#E8E6C7">

    <td>Qualification</td>

    <td>Institution</td>

    <td>Country</td>

    <td>Date Completed</td>

  </tr>'.$tertiarystudies.'<tr>

    <td colspan="4">Please attach certified copies of school/college/university certificates.</td>

  </tr>

</table>

<table class="table table-bordered" cellpadding="5" cellspacing="1">

  <tr bgcolor="#565656" style="color:#fff;">

    <th colspan="5">Declaration by student (and parent if student is under 18)</th>

  </tr>

  <tr>

    <td colspan="5"><sup>*I confirm that all the information contained in this application and in any attachments is true and correct to the best of my knowledge and belief.</sup></td>

  </tr>

  <tr>

    <td colspan="5"><sup>*I have read and understood the information contained in the Ntec Student Prospectus(also available on the Ntec website),and agree to comply with the attendance and behaviour requirements.</sup></td>

  </tr>

  <tr>

    <td colspan="5"><sup>*I have read and understood the Ntec Student Fee Protection,Student Withdrawls and Fee Refunds Policy, which is printed in the prospectus and is on the Ntec website.</sup></td>

  </tr>

  <tr>

    <td colspan="5"><sup>*I acknowledge that the provision of false information or the withholding of relevant information may result in termination of enrolment.</sup></td>

  </tr>

  <tr>

    <td colspan="5"><sup>*I will inform the school if there are any changes to the details of this application.</sup></td>

  </tr>

  <tr>

    <td colspan="5"><sup>*I acknowledge that I have read the information about the course I have enrolled for.</sup></td>

  </tr>

  <tr>

    <td colspan="5"><sup>*I give permission for Ntec to contact my parents in the event of an emergency.</sup></td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>Date</td>

    <td>'.$sign_date.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>Student Name</td>

    <td>'.$firstName.' ' .$lastName.'</td>

    <td rowspan="2">To be signed by parent if student is under 18</td>

    <td>Parents Name</td>

    <td>&nbsp;</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>Signature</td>

    <td><img src="'.$img.'" alt="test alt attribute" height="50" border="0" /></td>

    <td>Signature</td>

    <td>&nbsp;</td>

  </tr>

</table>';



// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');



// reset pointer to the last page

$pdf->lastPage();

	

// Close and output PDF document

// This method has several options, check the source code documentation for more information.
/*$pdfName = $firstName . $this->randomName() . '-ntec-pdf-'.$lastName . date('YMd'). ".pdf";
$pdf->Output($pdfName, 'I');*/
$pdf->Output('example_001.pdf', 'I');    

  

//============================================================+

// END OF FILE

//============================================================+

    }

}

  

/* End of file c_test.php */

/* Location: ./application/controllers/c_test.php */