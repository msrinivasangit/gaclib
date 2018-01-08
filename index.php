<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <!------MENU SECTION START-->
<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">                
                <a class="navbar-brand">
                    <img src="assets/img/logo.gif" style="width:100%;height:auto;" />
                </a>                 
            </div>

            <div class="left-div">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="right-div">
                <a href="index.php" class="btn btn-danger pull-right">Home</a>
            </div>              
        </div>
        <center><div style="font-size: 28px;font-weight: bold;">CENTRAL LIBRARY<br/>
        ONLINE DIGITAL LIBRARY MANAGEMENT SYSTEM</div> </center>
    </div>
    <!-- LOGO HEADER END-->
    <!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
</div>
</div>
             
<!--LOGIN PANEL START-->   
<?php include('includes/carousel.php');?>         
                     
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
    <a href="studentlogin.php">STUDENT LOGIN</a>
</div>
<div class="panel-body">    
    <a href="stafflogin.php">STAFF LOGIN</a>
 </div>
</div>
</div>
</div>  
<div class="row">
        <!-- Container Start -->
            <div class="container">
                <!-- Row Start -->
                <div class="row">
                                                                    <div class="col-md-12 ">
                        <div class="rich_editor_text"><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="wpb_wrapper">
    <div class="wpb_text_column wpb_content_element ">
    
    <div class="wpb_wrapper">
    <p>
        Government Arts College, Salem, is a general degree college located in Salem, Tamil Nadu. It was established in the year 1857. The college is affiliated with Periyar University. This college offers different courses in arts, commerce and science.
    </p> 
            <ul>
<li>Each department is having a library of its own with Textbooks, Reference books and Periodicals.</li>
<li>Apart from the Departmental libraries, there is a Central library having Textbooks, reference books, Encyclopedias and periodicals. English and Tamil dailies, Journals and weekly / Monthly magazines are available in the reading section.</li>
<li>Total number of volumes in the college library including those in the departmental libraries is approximately 70,000.</li>
<li>The college is receiving grants from the UGC, and from the Government of TamilNadu for the purchase of books and periodicals.</li>
</ul>

        </div> 
    </div> </div></div></div><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="wpb_wrapper"><div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center"><span class="vc_sep_holder vc_sep_holder_l"><span style="border-color:#ff8800;" class="vc_sep_line"></span></span>    
    </div>

    <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center"><span class="vc_sep_holder vc_sep_holder_l"><span style="border-color:#ff8800;" class="vc_sep_line"></span></span>      <h4>Journals / Magazines</h4><span class="vc_sep_holder vc_sep_holder_r"><span style="border-color:#ff8800;" class="vc_sep_line"></span></span>
    </div>
</div></div></div><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-6"><div class="wpb_wrapper">
    <div class="wpb_text_column wpb_content_element ">
        <div class="wpb_wrapper">
            <h4>English</h4>
<ul>
<li>Dialogue</li>
<li>ELTAI journal of English Language Teaching</li>
<li>TANCHE’s Journal of Humanities and Social Science</li>
</ul>

        </div> 
    </div> </div></div><div class="wpb_column vc_column_container vc_col-sm-6"><div class="wpb_wrapper">
    <div class="wpb_text_column wpb_content_element ">
        <div class="wpb_wrapper">
            <h4>Physics</h4>
<ul>
<li>Bulletin of Material Science</li>
<li>Journal of Astrophysics &amp; Astronomy</li>
<li>Pramane – Journal of Physics</li>
<li>Resonaace – Journal of Science Educational</li>
</ul>

        </div> 
    </div> </div></div></div><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-6"><div class="wpb_wrapper">
    <div class="wpb_text_column wpb_content_element ">
        <div class="wpb_wrapper">
            <h4>Chemistry</h4>
<ul>
<li>Indian Journal of Chemistry Sec-A</li>
<li>Indian Journal of Chemistry Sec-B</li>
<li>Current Science</li>
</ul>

        </div> 
    </div> </div></div><div class="wpb_column vc_column_container vc_col-sm-6"><div class="wpb_wrapper">
    <div class="wpb_text_column wpb_content_element ">
        <div class="wpb_wrapper">
            <h4>Zoology</h4>
<ul>
<li>Current Science</li>
<li>Indian Journal of Experimental Biology</li>
<li>Indian Journal of Biotechnology</li>
</ul>

        </div> 
    </div> </div></div></div>
<h4><span style="color: blue;"><strong> Librarian</strong></span></h4>
<img src="assets/img/library0.jpg" alt="" style="width:20%; height:auto;" />
<h4><strong> <span style="color: #CB0CCA;">Mr. S. Louis</span></strong><p></p>
</h4><h4><span style="color: blue;">Advisory Committee </span></h4>
<ol><span style="color: #CB0CCA;"><p></p>
<li> Dr. T. Gangadharan, Associate Professor of English</li>
<li>Mr. J.Partheban, Assistant Professor of English </li>
<li>Mr. .Madheswaran, Assistant Professor of Chemistry </li>
<li> Dr. R. Vikram Prasad, Assistant Professor of Mathematics </li>
<p></p></span></ol>
<p></p>
</div>                 </div>
                                               
                                   
             </div>
            <!-- Row End -->
        </div>
       
</div>
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
