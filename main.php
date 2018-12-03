<?php
require_once 'config.php';
 $sqlCourse = mysqli_query($connection,"SELECT * FROM course");
$admin='false';
?>

<!DOCTYPE html>
<html>

<head>
     <title> Digital Media Inspiration </title>
     <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="mainDesign.css" rel="stylesheet">
    </head>

    <body>
        <div>
   <h1  class="head">
       
       <?php  $sqlinfoLogo=mysqli_query($connection, "SELECT * FROM generalInfo WHERE id=1");
       while ($row=mysqli_fetch_array($sqlinfoLogo)){

                    
                    ?>
       <img src="<?php echo $row['logo'];?>" >  <?}?> 
       Digital <span class="media">Media </span> Inspiration </h1>
            

    <nav class="navbar" style=" margin: 0px;">
        
       
				<div class="navbar-header" style="border-bottom: 2px solid #9d426b;">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#TopNavbar" >
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
				</div>
				<div class="collapse navbar-collapse" style="border-bottom: 2px solid #9d426b;" id="TopNavbar">
					<ul class="nav navbar-nav">
                        <li> <a href='main.php'> <span class="glyphicon glyphicon-home"></span> Home</a></li>
					<?php	echo "<li><a href='aboutus.php?admin=$admin'>About us</a></li>" ;?>
                        
						<li><a  class="dropdown-toggle" data-toggle="dropdown">
				Courses <span class="caret"></span>
                            </a>
                        
                        <ul class="dropdown-menu" name="course">
					<?php
$coureseQuery=mysqli_query($connection, "SELECT * FROM course");

while ($row=mysqli_fetch_array($coureseQuery)){
    $code=$row['code'];
echo"<li> <a href='coursePage.php?code=$code&admin=$admin'>" .$code."</a></li>";
}
?>
				</ul> 
                        </li>
                        
						<li><a href="terms" class="dropdown-toggle" data-toggle="dropdown">
				Terms <span class="caret"></span></a>
                        
                           
                        <ul class="dropdown-menu">
					<?php
$result=mysqli_query($connection, "SELECT * FROM termNumber ORDER BY term ASC");

while ($row=mysqli_fetch_array($result)){
    $term=$row['term'];
echo"<li> <a href='termPage.php?term=$term&admin=$admin'>" .$term ."</a></li>";
}
?>
				</ul>
                        
                        </li>
						
           
             
   <li class="searchD"onmouseover="document.getElementById('searchForm').style.display='block'"> 

        <a id='icon' onmousemove="document.getElementById('icon')" style="color: #5d5d5d; ;"><span class="glyphicon glyphicon-search"></span> </a>
                
             
               </li> 
                        <li class="searchD">
                            <a>
             <form id='searchForm' onmouseover="document.getElementById('searchForm')" action= '<?php echo "search.php?admin=$admin"; ?> 'method='post' onkeyup='searching(this.value)'>
                 
				<input type='text' name='search' placeholder='Search by title, course or term' onkeyup='showHint(this.value)' > 
             
                   
                   <ul class="list-group" id="txtHint">
                   
                   </ul>
                   
                    </form>
               </a></li>
                     
                 	<script>
			function showHint(str) {
			  var xhttp;
			  if (str.length == 0) { 
				document.getElementById("txtHint").innerHTML = "";
				return;
			  }
			  xhttp = new XMLHttpRequest();
			  
			  xhttp.open("GET", "data.php?q="+str, true);
			  xhttp.send();  
			  
			  xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("txtHint").innerHTML = this.responseText;
				}
			  };
			   
			}
		</script>
					</ul>
                    
                    
					<ul class="nav navbar-nav navbar-right" style="padding-right: 20px;">
						
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
					</ul>
				</div>
		</nav>
  
            
                 
        <!-- End of Navigation  -->
            
            
    <div class="testimonials-container">
	        <div class="container">
	        	<div class="row">
		            <div class="col-sm-12 testimonials-title wow fadeIn">
		                <h2>About Digital Media Courses</h2>
		            </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-10 col-sm-offset-1 testimonial-list">
	                	<div role="tabpanel">
	                		<!-- Tab panes -->
	                		<div class="tab-content">
                                <?php 
                               $sqlCourses=mysqli_query($connection, "SELECT * FROM course WHERE course_number=1");

                               while ($row=mysqli_fetch_array($sqlCourses)){
    $t_desc=$row['full_desc'];
    $num=$row['course_number'];                  
    $t_img=$row['main_img'];
    $t_code= $row['code'];    
    $t_name=$row['name'];  
                          
                               ?>
	                			<div role="tabpanel" class="tab-pane fade in active" id="tab<?php echo  $num; ?>">
	                				<div class="testimonial-image">
	                					<img src="<?php echo  $t_img;?>">
	                				</div>
	                				<div class="testimonial-text">
		                                <p>
		                                	<span class="media"><?php echo $t_code."-".$t_name;?></span> <br>
                                          <?php echo $t_desc;?> <br>
		                                	<?php echo "<a href='coursePage.php?code=$t_code&admin=$admin'>Explore projects</a>";?>
		                                </p>
	                                </div>
	                			</div>
                                <? } ?>
                                
                                
                                <?php 
                               $sqlCourses=mysqli_query($connection, "SELECT * FROM course WHERE course_number>1");
$count=2;
                                do {
                                    $row=mysqli_fetch_array($sqlCourses); 
    $t_desc=$row['full_desc'];
    $num=$row['course_number'];                  
    $t_img=$row['main_img'];
    $t_code= $row['code'];    
    $t_name=$row['name'];  
             $count++;                   
                                ?>
	                			<div role="tabpanel" class="tab-pane" id="tab<?php echo  $num; ?>">
	                				<div class="testimonial-image">
	                					<img src="<?php echo  $t_img;?>">
	                				</div>
	                				<div class="testimonial-text">
		                                <p>
		                                	<span class="media"><?php echo $t_code."-".$t_name;?></span> <br>
                                          <?php echo $t_desc;?> <br>
		                                	<?php echo "<a href='coursePage.php?code=$t_code&admin=$admin'>Explore projects</a>";?>
		                                </p>
	                                </div>
	                			</div>
                                <?php }while($count<6) ?>
                                
	                			
                                
                                
	                		</div>
	                		<!-- Nav tabs -->
	                		<ul class="nav nav-tabs" role="tablist">
	                			<li role="presentation" class="active">
	                				<a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"></a>
	                			</li>
	                			<li role="presentation">
	                				<a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"></a>
	                			</li>
	                			<li role="presentation">
	                				<a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"></a>
	                			</li>
	                			<li role="presentation">
	                				<a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"></a>
	                			</li>
                                <li role="presentation">
	                				<a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab"></a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	            </div>
	        </div>
        </div>
         <!-- Body courses -->
    <div classs="container">

             <div class="row">
                	<div class="col-sm-12 wow fadeIn">
                		<div class="footer-border"></div>
                	</div>
                </div>
            
    <section class="BodyCourses"> 
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2 class="BodyCourses-heading text-uppercase" > Digital <span class="media"> Media </span> Courses </h2>
          </div>
 
        </div>
          
        <div class="row">
        
            
                 <?php  
    while ($row=mysqli_fetch_array($sqlCourse)){   
    $c_name=$row['name'];
    $c_code=$row['code']; 
    $c_description=$row['description'];
    $c_img=$row['img'];

     ?>
        <div class="col-md-3 col-sm-6">
              <div class="BodyCourses-item" >
                  <center>  
 <a class="BodyCourses-img" href="<?php echo "coursePage.php?code=$c_code&admin=$admin"; ?>">
              <img src= "<?php echo   $c_img;  ?> " style="height:140px;width:200px;
    max-width:500px;padding-bottom: 15px;" alt="course's image">
            </a>
                                                                                                                                        
      <?php
           echo "<div class='BodyCourses-caption'>
             <a href='coursePage.php?code=$c_code&admin=$admin'>" . $c_code."-".$c_name. "</a> <p>".  $c_description. "</p> 
            </div>";
                   
        ?> 
           </center>
          </div>
            </div>
            <? } ?>
  
            
            
     
            
         
            
                
          
                
        </div>
          
          
          
          
      </div>
    </section>
		
            
             </div>
            
            
               <footer>
            <div class="container">
                <div class="row">
                      <?php 
                               $sqlinfo=mysqli_query($connection, "SELECT * FROM generalInfo WHERE id=1");

                               while ($row=mysqli_fetch_array($sqlinfo)){
?>
                    
                     <img src="<?php echo $row['logo'];?>">
                   
                    <div class="col-sm-3 footer-box">
                        <h4>Contact Us</h4>
                        <div class="footer-box-text footer-box-text-contact">
	                        <p><i class="glyphicon glyphicon-map-marker"></i> Address: <?php echo $row['address'];?></p>
	                        <p><i class="glyphicon glyphicon-phone"></i> Phone: <?php echo $row['phone'];?></p>
	                        
	                        <p><i class="glyphicon glyphicon-envelope"></i> Email: <?php echo $row['email'];?></p>
                        </div>
                    </div>
                    
                    <? }?>
                </div>
                
                <div class="row">
                	<div class="col-sm-12 wow fadeIn">
                		<div class="footer-border"></div>
                	</div>
                </div>
                
                
                <div class="row">
                    <div class="col-sm-12 footer-copyright" style="text-align:center;">
                        <p> Copyright &copy; - All rights reserved to digital media inspiration. </p>
                    </div>
                   
                </div>
            </div>
        </footer>
            
            
            
           
        </div>
    </body>
</html>



