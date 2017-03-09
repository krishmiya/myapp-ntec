<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csp_pdf extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library("Pdf");
    }

    public function create_pdf() {
		/* get data */
		$this->load->model('Csp_model');
		$cspId = $this->uri->segment(3);
		$csp = $this->Csp_model->createPdf($cspId);
		/* get data  */
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage(); 
    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal')); 
    // Set some content to print
    $html = <<<EOF
	<!-- EXAMPLE OF CSS STYLE -->
    <style>
	table {
		background-color: #fff;
		font-size:12px;
		vertical-align:middle;
	}

	caption {
	  padding-top: 8px;
	  padding-bottom: 8px;
	  color: #777777;
  	  text-align: left;
	}

	th {
	  text-align: left;
	  }
	tr{
		border-bottom:1px solid #ccc;
	}
	.table {
	  width: 100%;
	  max-width: 100%;
	  margin-bottom: 20px;
	}
	.table > thead > tr > th,
	.table > tbody > tr > th,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > tbody > tr > td,
	.table > tfoot > tr > td {

  padding: 8px;

  line-height: 1.42857143;

  vertical-align: top;

  border-top: 1px solid #ddd;

}

.table > thead > tr > th {

  vertical-align: bottom;

  border-bottom: 2px solid #ddd;

}

.table > caption + thead > tr:first-child > th,

.table > colgroup + thead > tr:first-child > th,

.table > thead:first-child > tr:first-child > th,

.table > caption + thead > tr:first-child > td,

.table > colgroup + thead > tr:first-child > td,

.table > thead:first-child > tr:first-child > td {

  border-top: 0;

}

.table > tbody + tbody {

  border-top: 2px solid #ddd;

}

.table .table {

  background-color: #fff;

}

.table-condensed > thead > tr > th,

.table-condensed > tbody > tr > th,

.table-condensed > tfoot > tr > th,

.table-condensed > thead > tr > td,

.table-condensed > tbody > tr > td,

.table-condensed > tfoot > tr > td {

  padding: 5px;

}

.table-bordered {

  border: 1px solid #dddddd;

}



.table-bordered tr{

  border-bottom: 1px solid #dddddd;

}

		

.text-left {

  text-align: left;

}

.text-right {

  text-align: right;

}

.text-center {

  text-align: center;

}

.text-justify {

  text-align: justify;

}

.text-nowrap {

  white-space: nowrap;

}

.text-lowercase {

  text-transform: lowercase;

}

.text-uppercase {

  text-transform: uppercase;

}

.text-capitalize {

  text-transform: capitalize;

}

.text-muted {

  color: #777777;

}

.pull-right {

  float: right !important;

}

.pull-left {

  float: left !important;

}

.hide {

  display: none !important;

}

.show {

  display: block !important;

}

.invisible {

  visibility: hidden;

}

	

</style>



   <table cellspacing="0" class="table table-bordered text-center" style="width:100%; background-color: #003366; color:#fff; padding:10px 0px 10px 0px;">

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

	   <tr>

            <td>&nbsp;</td>

            <td colspan="2"><sup>(First Name)</sup></td>

            <td colspan="2"><sup>(Last Name)</sup></td>

        </tr>

        <tr bgcolor="#f8f8f0" style="border-bottom:2px solid #000;">

            <td>Name</td>

            <td colspan="2"></td>

            <td colspan="2"></td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td>Date of Birth</td>

            <td colspan="2">&nbsp;</td>

            <td>Student ID No</td>

            <td>&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td>Email</td>

            <td colspan="4">&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td>Current Address</td>

            <td colspan="2">&nbsp;</td>

            <td>Mobile No</td>

            <td>&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td>Course you are applying for</td>

            <td colspan="4">&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td>Your current visa expiration date</td>

            <td colspan="2">&nbsp;</td>

            <td>Your current Insurance expiration date</td>

            <td>&nbsp;</td>

        </tr>

    </table>

<br/>

    <table class="table table-bordered" cellpadding="5" cellspacing="2">

        <tr>

            <td>Student<sup>,</sup>s Signature</td>

            <td>&nbsp;</td>

            <td>Date</td>

            <td>&nbsp;</td>

        </tr>

    </table>

<br/>



    <table class="table table-bordered" cellpadding="5" cellspacing="0">

        <tr bgcolor="#565656" style="color:#fff;">

            <td class="text-center">..::: Office Use Only :::..</td>

        </tr>

    </table>

<br/>

    <table width="100%" class="table table-bordered" cellpadding="2" cellspacing="2">

        <tr bgcolor="#f8f8f0">

            <td rowspan="2">Course</td>

            <td colspan="2">Course (Term) Start Date</td>

            <td colspan="2"></td>

            <td colspan="2">Average Marks</td>

            <td>&nbsp;</td>

            <td>%</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="2">Course Completion Date</td>

            <td colspan="2"></td>

            <td colspan="2">Attendance</td>

            <td>&nbsp;</td>

            <td>%</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="1">English Test</td>

            <td colspan="2">IELTS Internal Test </td>

            <td colspan="2">Yes / No </td>

            <td colspan="2">Test Date</td>

            <td colspan="2"></td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="1">Scholarship/Discount</td>

            <td colspan="2">Scholarship</td>

            <td>&nbsp;</td>

            <td>%</td>

            <td>Discount</td>

            <td>&nbsp;</td>

            <td>%&nbsp; <b>OR</b></td>

            <td>Criterion 1 / Criterion 2</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td rowspan="5">Fees</td>

            <td colspan="3">(Original 2nd yr tuition fee)</td>

            <td colspan="1" class="text-center">$</td>

            <td colspan="4">&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">(Amount of scholarship/Discount)</td>

            <td colspan="1" class="text-center">-$</td>

            <td colspan="4">&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">(New tuition fee)</td>

            <td colspan="1" class="text-center">=$</td>

            <td colspan="4">&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">(Resource fee)</td>

            <td colspan="1" class="text-center">+$</td>

            <td colspan="4">&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">(Insurance fee)</td>

            <td colspan="1" class="text-center">+$</td>

            <td colspan="0">&nbsp;</td>

            <td colspan="2">=Total fee : $</td>

            <td>&nbsp;100</td>

        </tr>

    </table>

<br/>

    <table class="table table-bordered" cellpadding="2" cellspacing="2">

        <tr bgcolor="#f8f8f0">

            <td>(Note):</td>

        </tr>

    </table>

		   

EOF;

    // Print text using writeHTMLCell()

    //$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   



	$pdf->writeHTML($html, true, false, true, false, '');



	// reset pointer to the last page

	$pdf->lastPage();	

 

    // ---------------------------------------------------------    



// add a page

$pdf->AddPage();



$html =<<<EOF

<!-- EXAMPLE OF CSS STYLE -->

    <style>

table {

  background-color: #fff;

  font-size:12px;

  vertical-align:middle;

}

caption {

  padding-top: 8px;

  padding-bottom: 8px;

  color: #777777;

  text-align: left;

}

th {

  text-align: left;



  }

  

tr{

	border-bottom:1px solid #ccc;

}



.table {

  width: 100%;

  max-width: 100%;

  margin-bottom: 20px;

}

.table > thead > tr > th,

.table > tbody > tr > th,

.table > tfoot > tr > th,

.table > thead > tr > td,

.table > tbody > tr > td,

.table > tfoot > tr > td {

  padding: 8px;

  line-height: 1.42857143;

  vertical-align: top;

  border-top: 1px solid #ddd;

}

.table > thead > tr > th {

  vertical-align: bottom;

  border-bottom: 2px solid #ddd;

}

.table > caption + thead > tr:first-child > th,

.table > colgroup + thead > tr:first-child > th,

.table > thead:first-child > tr:first-child > th,

.table > caption + thead > tr:first-child > td,

.table > colgroup + thead > tr:first-child > td,

.table > thead:first-child > tr:first-child > td {

  border-top: 0;

}

.table > tbody + tbody {

  border-top: 2px solid #ddd;

}

.table .table {

  background-color: #fff;

}

.table-condensed > thead > tr > th,

.table-condensed > tbody > tr > th,

.table-condensed > tfoot > tr > th,

.table-condensed > thead > tr > td,

.table-condensed > tbody > tr > td,

.table-condensed > tfoot > tr > td {

  padding: 5px;

}

.table-bordered {

  border: 1px solid #dddddd;

}



.table-bordered tr{

  border-bottom: 1px solid #dddddd;

}

		

.text-left {

  text-align: left;

}

.text-right {

  text-align: right;

}

.text-center {

  text-align: center;

}

.text-justify {

  text-align: justify;

}

.text-nowrap {

  white-space: nowrap;

}

.text-lowercase {

  text-transform: lowercase;

}

.text-uppercase {

  text-transform: uppercase;

}

.text-capitalize {

  text-transform: capitalize;

}

.text-muted {

  color: #777777;

}

	

</style>



    <table class="table table-bordered" cellpadding="5" cellspacing="1">

        <tr bgcolor="#565656" style="color:#fff;">

            <th colspan="6">Personal Details (as shown in passport)</th>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">Family Name </td>

            <td>&nbsp;</td>

            <td>First Name(s)</td>

            <td>&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="4">Preferred Name</td>

            <td colspan="2">&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">Date of Birth</td>

            <td>&nbsp;</td>

            <td>Gender</td>

            <td>&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">Citizenship</td>

            <td>&nbsp;</td>

            <td>Country of Birth</td>

            <td>&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td>Passport Number</td>

            <td>&nbsp;</td>

            <td>Issue Date</td>

            <td>&nbsp;</td>

            <td>Expiray Date</td>

            <td>&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="6">Disability</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="6">

                The following information will help us improve services for students with disabilities.The information you supply is confidential.<br />

            </td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="5"><b>Do you live with the effects of significant injury,long-term mental/physical illness or disability?</b></td>

            <td>&nbsp;</td>

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="4">If Yes ,Please describe this disability</td>

            <td colspan="2">&nbsp;</td>

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

                        <td colspan="3">&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td colspan="3">&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Telephone</td>

                        <td>&nbsp;</td>

                        <td>Fax</td>

                        <td>&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td colspan="2">Email</td>

                        <td colspan="2">&nbsp;</td>

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

                        <td colspan="2">&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td colspan="2">Address</td>

                        <td colspan="2">&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Telephone</td>

                        <td>&nbsp;</td>

                        <td>Fax</td>

                        <td>&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td colspan="2">Email</td>

                        <td colspan="2">&nbsp;</td>

                    </tr>

                </table>

            </td>

        </tr>

        <tr>

            <td>

				<table width="100%" class="table table-bordered" cellpadding="5" cellspacing="1">

                    <tr bgcolor="#565656" style="color:#fff;">

                       <th colspan="2">Parents Contact Details* or Emergency Contact(homeCountry) *for student aged under 18</th>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Name</td>

                        <td>&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Relationship with you</td>

                        <td>&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Address</td>

                        <td>&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Tel/mobile number</td>

                        <td>&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Email</td>

                        <td>&nbsp;</td>

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

                        <td>&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Relationship with you</td>

                        <td>&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Address</td>

                        <td>&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Tel/mobile number</td>

                        <td>&nbsp;</td>

                    </tr>

                    <tr bgcolor="#f8f8f0">

                        <td>Email</td>

                        <td>&nbsp;</td>

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

        </tr>

        <tr bgcolor="#f8f8f0">

            <td colspan="3">&nbsp;</td>

            <td colspan="1">&nbsp;</td>

            <td colspan="1">&nbsp;</td>

            <td colspan="1">&nbsp;</td>

            <td colspan="2">&nbsp;</td>

        </tr>

    </table>

    <table class="table table-bordered" cellpadding="5" cellspacing="1">

        <tr bgcolor="#565656" style="color:#fff;">

            <td>What are your career intensions and goals?How will pursuing this programme of study assist you in achieving those goal?</td>

        </tr>

        <tr>

            <td>&nbsp;</td>

        </tr>

    </table>

    <table class="table table-bordered" cellpadding="5" cellspacing="1">

        <tr bgcolor="#565656" style="color:#fff;">

            <th>What are your immediate plans after you have completed this programme of study?</th>

        </tr>

        <tr>

            <td>&nbsp;</td>

        </tr>

    </table>



EOF;







// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');



// reset pointer to the last page

$pdf->lastPage();



    // ---------------------------------------------------------    



// add a page

$pdf->AddPage();



$html =<<<EOF

<!-- EXAMPLE OF CSS STYLE -->

    <style>

table {

  background-color: #fff;

  font-size:12px;

  vertical-align:middle;

}

caption {

  padding-top: 8px;

  padding-bottom: 8px;

  color: #777777;

  text-align: left;

}

th {

  text-align: left;



  }

  

tr{

	border-bottom:1px solid #ccc;

}



.table {

  width: 100%;

  max-width: 100%;

  margin-bottom: 20px;

}

.table > thead > tr > th,

.table > tbody > tr > th,

.table > tfoot > tr > th,

.table > thead > tr > td,

.table > tbody > tr > td,

.table > tfoot > tr > td {

  padding: 8px;

  line-height: 1.42857143;

  vertical-align: top;

  border-top: 1px solid #ddd;

}

.table > thead > tr > th {

  vertical-align: bottom;

  border-bottom: 2px solid #ddd;

}

.table > caption + thead > tr:first-child > th,

.table > colgroup + thead > tr:first-child > th,

.table > thead:first-child > tr:first-child > th,

.table > caption + thead > tr:first-child > td,

.table > colgroup + thead > tr:first-child > td,

.table > thead:first-child > tr:first-child > td {

  border-top: 0;

}

.table > tbody + tbody {

  border-top: 2px solid #ddd;

}

.table .table {

  background-color: #fff;

}

.table-condensed > thead > tr > th,

.table-condensed > tbody > tr > th,

.table-condensed > tfoot > tr > th,

.table-condensed > thead > tr > td,

.table-condensed > tbody > tr > td,

.table-condensed > tfoot > tr > td {

  padding: 5px;

}

.table-bordered {

  border: 1px solid #dddddd;

}



.table-bordered tr{

  border-bottom: 1px solid #dddddd;

}

		

.text-left {

  text-align: left;

}

.text-right {

  text-align: right;

}

.text-center {

  text-align: center;

}

.text-justify {

  text-align: justify;

}

.text-nowrap {

  white-space: nowrap;

}

.text-lowercase {

  text-transform: lowercase;

}

.text-uppercase {

  text-transform: uppercase;

}

.text-capitalize {

  text-transform: capitalize;

}

.text-muted {

  color: #777777;

}

	

</style>

<table class="table table-bordered" cellpadding="5" cellspacing="1">

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

  </tr>

  <tr bgcolor="#f8f8f0">

    <td colspan="1">&nbsp;</td>

    <td colspan="1">&nbsp;</td>

    <td colspan="1">&nbsp;</td>

    <td colspan="1">&nbsp;</td>

  </tr>

  <tr>

    <td colspan="4">Tertiary Studies(college/university/polytechnic)</td>

  </tr>

  <tr bgcolor="#E8E6C7">

    <td>Qualification</td>

    <td>Institution</td>

    <td>Country</td>

    <td>Date Completed</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

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

    <td>&nbsp;</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>Student Name</td>

    <td>&nbsp;</td>

    <td rowspan="2">To be signed by parent if student is under 18</td>

    <td>Parents Name</td>

    <td>&nbsp;</td>

  </tr>

  <tr bgcolor="#f8f8f0">

    <td>Signature</td>

    <td>&nbsp;</td>

    <td>Signature</td>

    <td>&nbsp;</td>

  </tr>

</table>



EOF;



// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');



// reset pointer to the last page

$pdf->lastPage();

	

    // Close and output PDF document

    // This method has several options, check the source code documentation for more information.

    $pdf->Output('example_001.pdf', 'I');    

  

    //============================================================+

    // END OF FILE

    //============================================================+

    }

}

  

/* End of file c_test.php */

/* Location: ./application/controllers/c_test.php */