
<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>The Gym| Add RAting</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<style>
 		#button1
		{
		width:126px;
		}
		.page-container .sidebar-menu #main-menu li#planhassubopen > a {
    		background-color: #2b303a;
    		color: #ffffff;
		}
		.fa-star:hover:before
		{
			color:yellow;
		}
	</style>
</head>
     <body class="page-body  page-fade" onload="collapseSidebar()">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				
					<img src="../../images/logo.png" alt="" width="192" height="80" />
				
			</div>
			
					<!-- logo collapse icon -->
					<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php'); ?>
    	</div>

    		<div class="main-content">
		
				<div class="row">
					
					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<!-- Raw Links -->
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">

							<li>Welcome <?php echo $_SESSION['full_name']; ?> 
							</li>						
						
							<li>
								<a href="logout.php">
									Log Out <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h3>Add Rating</h3>
		<p>Click on stars to add ratings </p>
		<hr />

		<table class="table table-bordered datatable" id="table-1" border=1>

			
				
				<?php
				$rating = 0;
				$query1  = "select * from rating where  memberid = ".$_SESSION['userid'];
				$result1 = mysqli_query($con, $query1);
				if (mysqli_affected_rows($con) == 1) {
					 while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
						 $rating=$row['rating'];
					 }
				}
				?>
		
				
				<span id="rat1" data-id="1" class="fa fa-star checked"></span>
				<span id="rat2" data-id="2" class="fa fa-star checked"></span>
				<span id="rat3" data-id="3" class="fa fa-star checked"></span>
				<span id="rat4" data-id="4" class="fa fa-star"></span>
				<span id="rat5" data-id="5" class="fa fa-star"></span>
				
				<input type="hidden" id="memberid" value="<?php echo $_SESSION['userid'] ?>"/>
				<input type="hidden" id="ratingselected" value="<?php echo $rating ?>"/>

<?php include('footer.php'); ?>
    	</div>
		 <script src="../../js/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function(){
	
	if($("#ratingselected").val()!=0)
	{
		var id =$("#ratingselected").val();
		for(var i=1;i<=id;i++)
		{
			$("#rat"+i).css("color","yellow");
		}
	}
	
	$(".fa-star").hover(function()
	{
		var id = $(this).attr("data-id");
		//console.log(id);
		$(".fa-star").css("color","black");
		for(var i=1;i<=id;i++)
		{
			$("#rat"+i).css("color","yellow");
		}
		
		
	});
	$(".fa-star").click(function()
	{
		var id = $(this).attr("data-id");
		 $.ajax({
            url:"saverating.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
           data: {memberid: $("#memberid").val(), rating: id},
            success:function(result){

             //console.log(result.abc);
			 alert("Rating Added");
           }
         });
		
		
	});
});
</script>
    </body>
</html>



				
