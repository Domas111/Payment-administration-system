
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">PASIRIRINKIMAI</a>
            </div>

        </nav>
        <!-- /. Navigacinis langas-->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                     
                                <?php echo $_SESSION['rainbow_name'];?>
                            <br />
                               
                            </div>
                        </div> -->

                    </li>


                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard "></i>PAGRINDINIS</a>
                    </li>
					
					 <li>
                        <a href="branch.php"><i class="fa fa-university "></i>MOKĖJIMŲ PASKIRTIS</a>
                    </li>
					
					 <li>
                        <a href="student.php"><i class="fa fa-users "></i>GYVENTOJAI</a>
                    </li>
					<li>
                        <a href="fees.php"><i class="fa fa-inr "></i>PRIIMTI MOKĖJIMUS</a>
                    </li>
					 <li>
                        <a href="report.php"><i class="fa fa-file-text "></i>ATASKAITA </a>
                    </li>
					
					 
					
					<li>
                        <a href="setting.php"><i class="fa fa-cogs "></i>NUSTATYMAI</a>
                    </li>
					
					 <li>
                        <a href="logout.php"><i class="fa fa-power-off "></i>ATSIJUNGTI</a>
                    </li>
					
			
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->