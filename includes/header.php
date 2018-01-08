<script type="text/javascript">
    // When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 
</script>
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
                <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>              
        </div>        
        <center><div style="font-size: 28px;font-weight: bold;">CENTRAL LIBRARY<br/>
        ONLINE DIGITAL LIBRARY MANAGEMENT SYSTEM</div>
        </center>
    </div>
    <div id="loading">
<img id="loading-image" src="assets/img/gear.gif" alt="Loading..." />
</div>  
<script type="text/javascript">
window.onload = function(){ document.getElementById("loading").style.display = "none" }   
</script>
    <?php if((isset($_SESSION['name'])) && (!empty($_SESSION['name'])) ){ ?>
                        <div><h4><?php echo 'Hello '.$_SESSION['name'].''; ?></h4></div>
                        <?php } ?>
    <button onclick="topFunction()" id="myBtn" class="btn btn-danger pull-right" title="Go to top"><i class="fa fa-4x fa-angle-up"></i></button>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">            
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                            <li><a href="about-us.php">About US</a></li>                      
                            <li><a href="dashboard.php" >DASHBOARD</a></li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Profile <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <?php if((isset($_SESSION['is_staff'])) && ($_SESSION['is_staff']==1)){ ?> 
                                <li role="presentation"><a href="staff_profile.php?member_id=<?php echo $_SESSION['alogin']; ?>">My Profile</a></li>                                     
                                <?php }else{ ?>  
                                <li role="presentation"><a href="student_profile.php?member_id=<?php echo $_SESSION['alogin']; ?>">My Profile</a></li>    
                                <?php } ?>  
                                    <li role="presentation"><a href="report_book_issued_to_me.php?member=<?php echo $_SESSION['alogin']; ?>">Books Issued to Me</a></li>
                                    <li><a href="change-password.php">Change Password</a></li>                           
                                </ul>
                            </li>
                            <?php if((isset($_SESSION['is_staff'])) && ($_SESSION['is_staff']==1)){ ?>  
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Student <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-student.php">Add Student</a></li>
                                    <?php if((isset($_SESSION['is_super_admin'])) && ($_SESSION['is_super_admin']==1)){ ?> 
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-student.php">Manage Student</a></li>
                            <?php } ?>
                                </ul>
                            </li>
                            <?php }
                            if((isset($_SESSION['is_super_admin'])) && ($_SESSION['is_super_admin']==1)){ ?>  
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Staff <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-staff.php">Add Staff</a></li>
                                    <?php if((isset($_SESSION['is_super_admin'])) && ($_SESSION['is_super_admin']==1)){ ?>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-staff.php">Manage Staff</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php }
                            if((isset($_SESSION['is_staff'])) && ($_SESSION['is_staff']==1)){ ?>  
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Books <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-book.php">Add Book</a></li>
                                    <?php if((isset($_SESSION['is_super_admin'])) && ($_SESSION['is_super_admin']==1)){ ?>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-books.php">Manage Books</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php }
                            if((isset($_SESSION['is_super_admin'])) && ($_SESSION['is_super_admin']==1)){ ?>  
                           <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Issue Books <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="issue-book.php">Issue New Book</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-issued-books.php">Manage Issued Books</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Reports <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="report_book_by_author.php">Report By Author</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="report_acc_no.php">Report by Acc No</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="report_book_by_publication.php">Report by Publication</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="report_book_entry_date.php">Report by Book Entry Date</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="report_book_issue.php">Report Book Issue</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="report_book_return.php">Report Book Return</a></li>

                                </ul>
                            </li>
                            
                            <?php } ?>        
                            <li><a href="opac.php">OPAC Search</a></li>
                            <?php if((isset($_SERVER['HTTP_REFERER'])) && (!empty($_SERVER['HTTP_REFERER']))){ ?>
                            <!-- <li><a href="<?php //echo $_SERVER['HTTP_REFERER']; ?>"> << Back</a></li> -->
                            <?php } ?> 
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>