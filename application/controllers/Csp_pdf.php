<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csp_pdf extends CI_Controller {

    function __construct(){

        parent::__construct();

        $this->load->library("Pdf");

    }
	
    public function create_pdf() {

		/* get data */

		$this->load->model('Csp_model');
		$this->load->model('Syaf_model');

		$cspId = $this->uri->segment(3);

		$csp = $this->Csp_model->createPdf($cspId);

		/* get data  */

		$firstName = $csp[0]['firstName'];
		$lastName = $csp[0]['lastName'];
		$stuId = $csp[0]['stuId'];
		$cdAdd = $csp[0]['cdAdd'];
		$cdTel = $csp[0]['cdTel'];
		$cdEmail = $csp[0]['cdEmail'];
		$cdFax = $csp[0]['cdFax'];
		$cName = $csp[0]['cName'];
		$sName = $csp[0]['sName'];
		$camName = $csp[0]['camName'];
		$csp_comments = $csp[0]['csp_comments'];
		$signName = $csp[0]['signName'];
		$sign_date = $csp[0]['sign_date'];
		$days_commencement = $csp[0]['days_commencement'];
		$preferredName = $csp[0]['preferredName'];
		$dob = $csp[0]['dob'];
		
		$gender = $csp[0]['gender'];
		if($gender == 1){
			$gender = "Male";
		}else{
			$gender = "Female";
		}

		$citiz = $this->Syaf_model->createPdfCitiz($csp[0]['cId']);
		$cont = $this->Syaf_model->createPdfCont($csp[0]['cntId']);
		
		$countryName = $cont[0]['countryName'];
		$citizenshipName = $citiz[0]['citizenshipName'];
		
		$icdSignDate = "";
		$ic_sign = "";
		
		$hodNSignDate = "";
		$hodN_sign = "";
		
		$hodCSignDate = "";
		$hodC_sign = "";
		
		if($days_commencement <= 10){
			$icdSignDate = $csp[0]['icdSignDate'];
			$ic = $this->Csp_model->createPdfIC($cspId);
			$signName_ic = $ic[0]['signName'];
			$img_ic = base_url().'ntec_uploads/signature/'.$signName_ic;
			$ic_sign = '<img src="'.$img_ic.'" alt="test alt attribute" height="50" border="0" />';
			
			$hodNSignDate = "";
			$hodN_sign = "";
			
			$hodCSignDate = "";
			$hodC_sign = "";
		
		}else{
			$hodNSignDate = $csp[0]['hodNewSignDate'];
			$hodN = $this->Csp_model->createPdfHODN($cspId);
			$signName_hodN = $hodN[0]['signName'];
			$img_hodN = base_url().'ntec_uploads/signature/'.$signName_hodN;
			$hodN_sign = '<img src="'.$img_hodN.'" alt="test alt attribute" height="50" border="0" />';
			
			$hodCSignDate = $csp[0]['hodCurrentSignDate'];
			$hodC = $this->Csp_model->createPdfHODC($cspId);
			$signName_hodC = $hodC[0]['signName'];
			$img_hodC = base_url().'ntec_uploads/signature/'.$signName_hodC;
			$hodC_sign = '<img src="'.$img_hodC.'" alt="test alt attribute" height="50" border="0" />';
		}
		
		$office_comment = $csp[0]['office_comment'];
		$img = base_url().'ntec_uploads/signature/'.$signName;
		
		$cp = $this->Csp_model->createPdfCP($csp[0]['uId']);
		
		$courseName = $cp[0]['courseName'];
		$proposedStartDate = $cp[0]['proposedStartDate'];
		$campusName = $cp[0]['campusName'];
		$schoolName = $cp[0]['schoolName'];
		
		$faic = $this->Csp_model->createPdfFAIC($cspId);
		$signName_faic = $faic[0]['signName'];
		$img_faic = base_url().'ntec_uploads/signature/'.$signName_faic;
		
		$ppNumber = $csp[0]['ppNumber'];
		$ppIssueDate = $csp[0]['ppIssueDate'];
		$ppExpiryDate = $csp[0]['ppExpiryDate'];
		$disaDescription = $csp[0]['disaDescription'];
		$disa = "";
		if($disaDescription == "NA"){
			$disa = "No";
		}
		else{
			$disa = "Yes";
		}
		//
		$cspCA = $this->Csp_model->checkAgent($cspId);

		$agentName = "NA";
		$ageAdd = "NA";
		$ageTele = "NA";
		$ageFax = "NA";
		$ageEmail = "NA";
		
		if(count($cspCA) > 0){
			$agentName = $cspCA[0]['agentName'];
			$ageAdd = $cspCA[0]['ageAdd'];
			$ageTele = $cspCA[0]['ageTele'];
			$ageFax = $cspCA[0]['ageFax'];
			$ageEmail = $cspCA[0]['ageEmail'];
		}
		
		$echName = $csp[0]['echName'];
		$echRelationship = $csp[0]['echRelationship'];
		$echAdd = $csp[0]['echAdd'];
		$echTele = $csp[0]['echTele'];
		$echEmail = $csp[0]['echEmail'];
		
		$ecnzName = $csp[0]['ecnzName'];
		$ecnzRelationship = $csp[0]['ecnzRelationship'];
		$ecnzAdd = $csp[0]['ecnzAdd'];
		$ecnzTele = $csp[0]['ecnzTele'];
		$ecnzEmail = $csp[0]['ecnzEmail'];
		
		$ss = $this->Syaf_model->createPdfSS($csp[0]['uId']);
		
		$k = 0;
		 $secondarystudies = '<tr bgcolor="#f8f8f0"><td></td><td></td><td></td><td></td></tr>';
		  
		  while ($k < count($ss)) {
		  $secondarystudies = '<tr bgcolor="#f8f8f0">
		
			<td>'.$ss[$k]['qualification'].'</td>
		
			<td>'.$ss[$k]['institution'].'</td>
		
			<td>'.$ss[$k]['countryName'].'</td>
		
			<td>'.$ss[$k]['dateCompleted'].'</td>
		
		  </tr>';
		  $k++;
		  }
		  
		  $ts = $this->Syaf_model->createPdfTS($csp[0]['uId']);
		  
		$n = 0;
		 $tertiarystudies = '<tr bgcolor="#f8f8f0"><td></td><td></td><td></td><td></td></tr>';
		  
		  while ($n < count($ts)) {
		  $tertiarystudies = '<tr bgcolor="#f8f8f0">
		
			<td>'.$ts[$n]['qualification'].'</td>
		
			<td>'.$ts[$n]['institution'].'</td>
		
			<td>'.$ts[$n]['countryName'].'</td>
		
			<td>'.$ts[$n]['dateCompleted'].'</td>
		
		  </tr>';
		  $n++;
		  }
		  
		  $cp = $this->Syaf_model->createPdfCP($csp[0]['uId']);

		$b = 0;
		 $currentprogramme = '<tr bgcolor="#f8f8f0"><td colspan="3">&nbsp;</td><td colspan="1">&nbsp;</td><td colspan="1">&nbsp;</td><td colspan="1">&nbsp;</td><td colspan="2">&nbsp;</td></tr>';
		  
		  while ($b < count($cp)) {
			  
			  $str = explode("-",$courseName);
				$datetime1 = new DateTime($cp[$b]['proposedStartDate']);
				$datetime2 = new DateTime($cp[$b]['proposedFinishDate']);
				$interval = $datetime1->diff($datetime2);

		  $currentprogramme = '<tr bgcolor="#f8f8f0">

            <td>'.$str[0].'</td>
            <td>'.$str[1].'</td>
            <td>'.$interval->format('%y Y %m M %d D').'</td>
            <td>'.$cp[$b]['campusName'].'</td>
            <td>'.$cp[$b]['proposedStartDate'].'</td>

        </tr>';
		  $b++;
		  }
		//

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

            <th style="text-align:center;"><h1>Request for Change of Campus/School/ Programme</h1></th>

        </tr>

    </table>

	<table>

		<tr>

			<td>&nbsp;&nbsp;</td>

		</tr>

	</table>

    <br/>

  <table class="table table-bordered" cellpadding="5" cellspacing="1">

  <tr bgcolor="#f8f8f0" style="border-bottom:2px solid #000;">

    <td>Name</td>

    <td colspan="3">'.$firstName .' '.$lastName.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>Date of Birth</td>

    <td>'.$dob.'</td>

    <td>Student ID</td>

    <td>'.$stuId.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>Contact Phone</td>

    <td>'.$cdTel.'</td>

    <td>Email</td>

    <td>'.$cdEmail.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td rowspan="4">Details of current enrolment</td>

    <td>Programme</td>

    <td colspan="2">'.$courseName.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>Start Date</td>

    <td colspan="2">'.$proposedStartDate.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>Campus</td>

    <td colspan="2">'.$campusName.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>School</td>

    <td colspan="2">'.$schoolName.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td rowspan="3">Change requested</td>

    <td>Progarmme</td>

    <td colspan="2">'.$cName.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>Campus</td>

    <td colspan="2">'.$camName.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>School</td>

    <td colspan="2">'.$sName.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td><p>Why do you wish to change your campus / school / programme?</p></td>

    <td colspan="3">'.$csp_comments.'</td>

  </tr>

</table>



<b>Student Declaration :</b>

  <ol type="i">

    <li>Any change of campus,programme or school is subject to availability,and is at the descretion of the Heads of the relevant Faculties.</li>

    <li><b><i>Change of campus : </i></b>Students who receive approval from Ntec to change to a different campus (while staying with the same school and programme) must pay a transfer fee of $100 (if application is received within 10 days of commencement) <b> or $500 </b> (if application is received after 10 days of commencement)</li>

    <li><b><i>Change of school / Change of programme : </i></b> (new offer of place will be issued)

      <ul type="disc">

        <li>Students who receive approval from Ntec to change to a different school and/or programme are subject to <u>Ntec<sup>,</sup>s Student Fee Refund Policy </u>(refer to Ntec website),and are required to withdraw from their original school and/or programme and re-enrol in the new school and/or programme.</li>

        <li><u>If the application is received 10 working days of the original programme<sup>,</sup>s commencement, </u>the student fees,which he/she paid for the original school/programme, and which are held in the public Trust under FeeProject,will be transffered to the new programme/school,less an administration fee of 25% of the original fees paid.Where the fees for the new programme/school are higher than the original,the student will be required to pay the difference.If the fees for the new programme are less than the original refunded fee,the student will be refunded the difference (if students enrol on a 1 year course) or will be adjusted to the 2nd year (if students enrol on a 2 year course).In addition,student <b>must pay $100 for the admin fee.</b></li>

        <li><u>If the application is received more than 10 working days from the original programme<sup>,</sup>s commencement,</u> as per Ntec<sup>,</sup>s Student Fee Refund Policy, there will be no fee refund, and the student must pay <b>$500 transfer fee and additional fees per term studied(programme changed).</b></li>

      </ul>

    </li>

    <li>Any change of campus,school and/or programme is subject to immigration New Zealand(INZ) approving a Variation of Conditions Application, Which the student must submit to INZ.Ntec will not be liable for any loss or cost of any kind that the student may suffer or incur as a result of his/her transfer application being denied by INZ.</li>

  </ol>
<table class="table table-bordered" cellpadding="3" cellspacing="1">

  <tr bgcolor="#dfdfd8">
    <td colspan="4"><b>Student Declaration:</b></td>
  </tr>
  <tr>
    <td colspan="4">I have read and understand the requirement for campus / school/programme change outlined above.
	<p>&nbsp;</p></td>
  </tr>

  <tr>
    <td><img src="'.$img.'" alt="test alt attribute" height="50" border="0" /></td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>'.$sign_date.'</td>
  </tr>  
  <tr>
  <td>Student Signature</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<td>Date</td>
  </tr>
</table>

<p>&nbsp;</p>

<table class="table table-bordered" cellpadding="4" cellspacing="1">

  <tr bgcolor="#dfdfd8">

    <td colspan="2"><b>For Office use only:</b></td>

    <td colspan="3">&nbsp;</td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td colspan="3">Faculty Admin in charge</td>

    <td><img src="'.$img_faic.'" alt="test alt attribute" width="50" height="50" border="0" /></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td colspan="3">Consultation with student</td>

    <td><img src="'.$img_faic.'" alt="test alt attribute" width="50" height="50" border="0" /></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td colspan="3">Number of days since commencement of original programme</td>

    <td>'.$days_commencement.' Days</td>

  </tr>

</table>



<table class="table table-bordered" cellpadding="4" cellspacing="1">

  <tr>

    <td colspan="2"><em>Comment:</em></td>

  </tr>

  <tr>

    <td colspan="2" style="text-align:left; font-weight: 400; color: #777;">'.$office_comment.'</td>

  </tr>

</table>

<p>&nbsp;</p>

<table border="0" cellpadding="2" cellspacing="1">

  <tr>

    <td colspan="3"><b>Approved by:</b></td>

  </tr>

  <tr>

    <td><blockquote><p>International Counsellor Director</p></blockquote></td>

    <td><blockquote><p>Head of Faculty<br/><sup>current programme</sup></p></blockquote></td>

    <td><blockquote><p>Head of Faculty<br/><sup>new programme</sup></p></blockquote></td>

  </tr>  
  <tr>
    <td style="text-align:center;">'.$ic_sign.'</td>
    <td style="text-align:center;">'.$hodC_sign.'</td>
    <td style="text-align:center;">'.$hodN_sign.'</td>
  </tr>
  <tr>
  	<td style="text-align:center: font-size:10px;">'.$icdSignDate.'</td>
    <td style="text-align:center; font-size:10px;">'.$hodCSignDate.'</td>
    <td style="text-align:center; font-size:10px;">'.$hodNSignDate.'</td>
  </tr>
  <tr>
    <td style="text-align:left;"><blockquote><p><sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(signature,date)</sup></p></blockquote></td>
    <td style="text-align:left;"><blockquote><p><sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(signature,date)</sup></p></blockquote></td>
    <td style="text-align:left;"><blockquote><p><sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(signature,date)</sup></p></blockquote></td>
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

  <tr bgcolor="#dfdfd8">

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

    <td colspan="6">The following information will help us improve services for students with disabilities.The information you supply is confidential.<br />

    </td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td colspan="5"><b>Do you live with the effects of significant injury,long-term mental/physical illness or disability?</b></td>

    <td>'.$disa.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td colspan="4">If Yes ,Please describe this disability</td>

    <td colspan="2">'.$disaDescription.'</td>

  </tr>

</table>



<table  width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

  <tr bgcolor="#dfdfd8">

    <th colspan="4">Applicant Contact Details</th>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td colspan="2">Address</td>

    <td colspan="2">'.$cdAdd.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>Telephone</td>

    <td>'.$cdTel.'</td>

    <td>Fax</td>

    <td>'.$cdFax.'</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td colspan="2">Email</td>

    <td colspan="2">'.$cdEmail.'</td>

  </tr>

</table>



<table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

  <tr bgcolor="#dfdfd8">

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



<table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

  <tr bgcolor="#dfdfd8">

    <th colspan="2">Parents Contact Details*or Emergency Contact(homeCountry) *for student aged under 18</th>

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



<table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

  <tr bgcolor="#dfdfd8">

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



<table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

  <tr bgcolor="#c6c6c0">

    <th>Programme Title</th>

    <th>NZQA Level</th>

    <th>Duration</th>

    <th>Campus</th>

    <th>Proposed Start Date</th>

  </tr>'.$currentprogramme.'

</table>



<table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

  <tr>

    <th>What are your career intensions and goals?How will pursuing this programme of study assist you in achieving those goal?</th>

  </tr>

  <tr>

    <td>&nbsp;</td>

  </tr>

</table>



<table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

  <tr>

    <th>What are your immediate plans after you have completed this programme of study?</th>

  </tr>

  <tr>

    <td>&nbsp;</td>

  </tr>

</table>';



// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');



// reset pointer to the last page

$pdf->lastPage();



    // ---------------------------------------------------------  



// add a page

$pdf->AddPage();



$html ='

<table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

  <tr bgcolor="#dfdfd8">

    <th colspan="4">Educational Background Details</th>

  </tr>

  <tr>

    <td colspan="4">Secondary Studies (high school/secondary school)</td>

  </tr>

  <tr bgcolor="#c6c6c0">

    <td>Highest qualification gained</td>

    <td>Institution</td>

    <td>Country</td>

    <td>Date Completed</td>

  </tr>

  '.$secondarystudies.'

  <tr bgcolor="#dfdfd8">

    <td colspan="4">Tertiary Studies(college/university/polytechnic)</td>

  </tr>

  <tr bgcolor="#c6c6c0">

    <td>Qualification</td>

    <td>Institution</td>

    <td>Country</td>

    <td>Date Completed</td>

  </tr>

  '.$tertiarystudies.'

  <tr>

    <td colspan="4">Please attach certified copies of school/college/university certificates.</td>

  </tr>

</table>



<table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

  <tr bgcolor="#dfdfd8">

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

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td>Student Name:</td>

    <td>'.$firstName .' '.$lastName.'</td>

<!--    <td rowspan="2">To be signed by parent if student is under 18</td>

    <td>Parents Name</td>

    <td>&nbsp;</td>-->

  </tr>

  <tr>

    <td>Signature</td>

    <td><img src="'.$img.'" alt="test alt attribute" height="50" border="0" /></td>

<!--    <td>Signature</td>

    <td>&nbsp;</td>-->
	
	<td align="right" style="text-align:right;">Date :</td>

    <td align="right" style="text-align:right;">'.$sign_date.'</td>

  </tr>

</table>';



// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');



// reset pointer to the last page

$pdf->lastPage();

	

// Close and output PDF document

// This method has several options, check the source code documentation for more information.
/*$pdfName = $firstName . $this->randomName() . '-ntec-pdf-'. $lastName . date('YMd'). ".pdf";
$pdf->Output($pdfName, 'I'); */
$pdf->Output('Application for Change_Campus/School/Programme.pdf', 'I');    

  

//============================================================+

// END OF FILE

//============================================================+

    }

}

  

/* End of file c_test.php */

/* Location: ./application/controllers/c_test.php */