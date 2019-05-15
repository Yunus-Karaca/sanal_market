<?php require_once("../baglan.php"); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="tr"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
    <meta charset="UTF-8" />
    <title>SANAL | MARKET</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
   
    <!-- END PAGE LEVEL  STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END  HEAD-->
    <!-- BEGIN BODY-->
<body class="padTop53 " >
     <?php session_start(); ?>
    <?php 
        if($_SESSION){      
            $id=$_SESSION["id"];          
            $uye=$_SESSION["uye"]; 
            $eposta=$_SESSION["eposta"];
            $firma=$_SESSION["firma"];        
        }
    ?> 
     <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
        <div id="top">

           <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">
                    <a href="index.php" class="navbar-brand"><img src="assets/img/logo.png" alt="" /></a>
                </header>
                <!-- END LOGO SECTION -->

                 <ul class="nav navbar-top-links navbar-right">

                    <!-- MESSAGES SECTION -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="label label-success">2</span><i class="icon-envelope-alt"></i>&nbsp; <i class="icon-chevron-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <?php                           
                                $veri = $db->prepare("SELECT * FROM  mesaj where mesaj_okundu='0' and mesaj_alici='$eposta'"); 
                                $veri ->execute();
                                    if($veri->rowCount()){                           
                                        foreach($veri as $row){  
                                        $row['mesaj_id']; 
                                        $a=$row['mesaj_id']; 
                                ?>

                                <?php echo "<a href='firma_read_mail.php?id=".$a."'>";?>
                                    <div>
                                        <span class="pull-right text-muted">
                                        <em><?php echo $row['mesaj_tarih'] ?></em>
                                        </span><br>
                                        <strong><?php echo $row['mesaj_gonderen'] ?></strong>
                                        <div><?php echo $row['mesaj_konu'] ?></div>      
                                    </div>                                   
                                </a>
                                <?php
                                }
                                }
                                else{    
                                    echo '<a class="text-center"> Mesaj bulunmamaktadır</a>';  
                                }
                                ?>
                            </li>
                            
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="firma_bildirim.php">
                                    <strong>Tümünü Oku</strong>
                                    <i class="icon-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--END MESSAGES SECTION -->
                   

                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="icon-user"></i> User Profile </a></li>                          
                            <li class="divider"></li>
                            <li><a href="cikis.php"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->


 
        <!-- MENU SECTION -->
       <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading" style="font-weight: inherit; text-transform: capitalize; font-size: 16px;">
                        <?php 
                        if($_SESSION){               
                            echo $uye;                                
                        }
                        ?> 
                    </h5>
                    <ul class="list-unstyled user-info">                      
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">

                <li class="panel">
                    <a href="index.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav">
                        ANASAYFA            
                    </a>               
                </li>

                <!-- FİRMA CRUD İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="firma_ürün.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav1">
                        ÜRÜN İŞLEMLERİ            
                    </a>               
                </li>
                <!-- FİRMA CRUD BİTTİ -->

                <!-- KATEGORİ CRUD İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav2">
                        KATEGORİ İŞLEMLERİ                                     
                    </a>                   
                </li>
                <!-- KATEGORİ CRUD BİTTİ -->


                <!-- SİPARİŞ İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav3">
                        SİPARİŞ İŞLEMLERİ                                     
                    </a>
                    <ul class="collapse" id="blank-nav3">                        
                        <li><a href="blank.html"><i class="icon-angle-right"></i> Blank Page One  </a></li>
                        <li><a href="blank2.html"><i class="icon-angle-right"></i> Blank Page Two  </a></li>
                    </ul>
                </li>
                <!-- SİPARİŞ  BİTTİ -->

                <!-- FİRMA İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav4">
                        FİRMA BİLGİLERİ                                   
                    </a>
                    <ul class="collapse" id="blank-nav4">                        
                        <li><a href="firma_bilgi.php"><i class="icon-angle-right"></i>FİRMA BİLGİLERİ</a></li>
                        <li><a href="firma_sube.php"><i class="icon-angle-right"></i>ŞUBE BİLGİLERİ</a></li>
                    </ul>
                </li>
                <!-- FİRMA BİTTİ -->

                <!-- İSTATİSTİKLER İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="firma_istatistik.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav5">
                        İSTATİSTİK İŞLEMLERİ                                     
                    </a>                   
                </li>
                <!-- İSTATİSTİKLER BİTTİ -->

                <!-- SANALKART İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav6">
                        SANALKART İŞLEMLERİ                                     
                    </a>
                    <ul class="collapse" id="blank-nav6">                        
                        <li><a href="blank.html"><i class="icon-angle-right"></i> Blank Page One  </a></li>
                        <li><a href="blank2.html"><i class="icon-angle-right"></i> Blank Page Two  </a></li>
                    </ul>
                </li>
                <!-- SANALKART BİTTİ -->

                <!-- İNDİRİM İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="firma_indirim.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav7">
                        İNDİRİM İŞLEMLERİ                                     
                    </a>                   
                </li>
                <!-- İNDİRİM BİTTİ -->

                <!-- MESAJ İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="firma_mailbox.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav8">
                        MESAJ İŞLEMLERİ                                     
                    </a>
                </li>
                <!-- MESAJ BİTTİ -->

                <li><a href="cikis.php"><i class="icon-signin"></i> Login Page </a></li>

             </ul>

        </div>
        <!--END MENU SECTION -->



        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>FİRMA İSTATİSTİK İŞLEMLERİNE HOŞGELDİNİZ</h3>
                    </div>
                </div>
                <hr />

                <div class="row">
                    <div class="col-lg-12 ">
                     	<div class="panel panel-default">
                            <div class="panel-heading text-center">
                                GENEL İSTATİSTİK DURUMU
                            </div>
                            
                            <div class="panel-body">
                            <!-- ÜRÜNLERE YAPILAN TOPLAM YORUM SAYISI -->	
                            <?php 
                                $a=$db->prepare("SELECT yorum_urunid FROM yorum WHERE yorum_firmaid=0");
                                $a->execute();
                                    foreach($a as $row){                                   
                                        $m=$row["yorum_urunid"]; 
                                        $veri = $db->prepare("SELECT * FROM urun where urun_id=?");                        
                                        $veri->execute(array($m));                         
                                        $x = $veri->fetchAll();
                                        $xx = $a->rowCount();                                  
                                            if($xx){    
                                                foreach($x as $b){  
                            ?>
                            <?php
                            }  
                            }                          
                            else{         
                                echo "Veri bulunmamaktadır";  
                            } 
                            }    
                            ?>                        
                            <p>Toplam Yorum Sayısı:<b> <?php echo $xx;?></b></p>
                            <!-- ÜRÜNLERE YAPILAN TOPLAM YORUM SAYISI BİTTİ -->

                            <!-- ÜRÜNLERE YAPILAN TOPLAM VEĞENİ SAYISI -->
                            <?php 
								$veri = $db->prepare("SELECT * FROM urun where urun_favori>? and urun_firma=? ");
								$veri->execute(array(0,$firma));
									  
								$x = $veri->fetchAll();
								$xx = $veri->rowCount();								  
									if($xx){	
										foreach($x as $b){	
							?>
                            <p>Toplam Beğeni Sayısı:<b> <?php echo $xx;?></b></p>
                            <?php
							}  
							}                          
                            else{         
                                echo "Veri bulunmamaktadır";  
                            }                               
                            ?>  
                            <!-- ÜRÜNLERE YAPILAN TOPLAM BEĞENİ SAYISI BİTTİ -->

                            <!-- ÜRÜNLERE YAPILAN TOPLAM ŞUBE SAYISI -->
                            <?php 
								$veri = $db->prepare("SELECT * FROM sube where sube_yetkili=? ");
								$veri->execute(array($id));
									  
								$x = $veri->fetchAll();
								$xx = $veri->rowCount();								  
									if($xx){	
										foreach($x as $b){	
							?>
                           <p>Toplam Şube Sayısı:<b> <?php echo $xx;?></b></p>
                            <?php
							}  
							}                          
                            else{         
                                echo "Veri bulunmamaktadır";  
                            }                               
                            ?>  
                            <!-- ÜRÜNLERE YAPILAN TOPLAM ŞUBE SAYISI BİTTİ -->

                            <!-- ÜRÜNLERE YAPILAN TOPLAM ÜRÜN SAYISI -->
                            <?php 
								$veri = $db->prepare("SELECT * FROM urun where urun_firma=? ");
								$veri->execute(array($firma));
									  
								$x = $veri->fetchAll();
								$xx = $veri->rowCount();								  
									if($xx){	
										foreach($x as $b){	
							?>
							<?php
							}  
							}                          
                            else{         
                                echo "Veri bulunmamaktadır";  
                            }                               
                            ?>  
                        	Toplam Ürün Sayısı:<b><?php echo $xx;?></b>  
                        	<!-- ÜRÜNLERE YAPILAN TOPLAM ÜRÜN SAYISI BİTTİ -->
                            </div>                                   
                        </div>  
                    </div>
                </div>
                <hr />
                           
                <div class="row">                  
                    <div class="col-lg-4">                   
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                ÜRÜNLERİMİZE YAPILAN YORUMLAR
                            </div>
                            
                            <div class="panel-body">
                            <?php 
                                $a=$db->prepare("SELECT yorum_urunid FROM yorum WHERE yorum_firmaid=0");
                                $a->execute();
                                    foreach($a as $row){                                   
                                        $m=$row["yorum_urunid"]; 
                                        $veri = $db->prepare("SELECT * FROM urun where urun_id=?");                        
                                        $veri->execute(array($m));                         
                                        $x = $veri->fetchAll();
                                        $xx = $a->rowCount();                                  
                                            if($xx){    
                                                foreach($x as $b){  
                            ?>
                            <p style="float:right;"><?php echo $b["urun_firma"];?></p>
                            <p><?php echo $b["urun_isim"];?></p>
                            <?php
                            }  
                            }                          
                            else{         
                                echo "Veri bulunmamaktadır";  
                            } 
                            }    
                            ?>  
                            </div>          
                            <div class="panel-footer">
                                Toplam Yorum Sayısı:<b><?php echo $xx;?></b>            
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">                   
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                ÜRÜNLERİMİZE YAPILAN BEĞENİ
                            </div>
                            
                            <div class="panel-body">
                            <?php 
								$veri = $db->prepare("SELECT * FROM urun where urun_favori>? and urun_firma=? ");
								$veri->execute(array(0,$firma));
									  
								$x = $veri->fetchAll();
								$xx = $veri->rowCount();								  
									if($xx){	
										foreach($x as $b){	
							?>
                            <p><?php echo $b["urun_isim"];?></p>
                            <?php
							}  
							}                          
                            else{         
                                echo "Veri bulunmamaktadır";  
                            }                               
                            ?>  
                            </div>          
                            <div class="panel-footer">
                                Toplam Beğeni Sayısı:<b><?php echo $xx;?></b>            
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-4">                   
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                ŞUBELERİMİZ
                            </div>
                            
                            <div class="panel-body">
                            <?php 
								$veri = $db->prepare("SELECT * FROM sube where sube_yetkili=? ");
								$veri->execute(array($id));
									  
								$x = $veri->fetchAll();
								$xx = $veri->rowCount();								  
									if($xx){	
										foreach($x as $b){	
							?>
                            <p><?php echo $b["sube_isim"];?></p>
                            <?php
							}  
							}                          
                            else{         
                                echo "Veri bulunmamaktadır";  
                            }                               
                            ?>  
                            </div>          
                            <div class="panel-footer">
                                Toplam Şube Sayısı:<b><?php echo $xx;?></b>            
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">                   
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                TOPLAM ÜRÜN SAYISI
                            </div>
                            
                            <div class="panel-body">
                            <?php 
								$veri = $db->prepare("SELECT * FROM urun where urun_firma=? ");
								$veri->execute(array($firma));
									  
								$x = $veri->fetchAll();
								$xx = $veri->rowCount();								  
									if($xx){	
										foreach($x as $b){	
							?>
							<?php
							}  
							}                          
                            else{         
                                echo "Veri bulunmamaktadır";  
                            }                               
                            ?>  
                        	Toplam Ürün Sayısı:<b><?php echo $xx;?></b>  
                            
                            </div>          
                            <div class="panel-footer">
                                       
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

       <!--END PAGE CONTENT -->


    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    <!-- PAGE LEVEL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>
