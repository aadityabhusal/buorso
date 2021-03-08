<?php
include '../core.php';
if(isset($userid)){

$title ="Messages - Buorso";
include '../header.php';

?>
<script type="text/javascript">
	function showmsg(){
		if(window.XMLHttpRequest){
			show = new XMLHttpRequest();
		}else{
			show = new ActiveXObject('Microsoft.XMLHTTP');
		}

		show.onreadystatechange = function(){
			if(show.readyState==4 && show.status==200){
				document.getElementById('messages-body').innerHTML = show.responseText;
			}
		}
		parameters = 'userid=' + <?php echo @$_GET['userid'];?> + '&mainuserid=' + <?php echo @$userid ;?>;
		
		show.open('POST','../assets/Codesnips/msgshow.php',true);
		show.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		show.send(parameters);	

	}
	setInterval(function(){showmsg()},1000);


	function insert(){
		if(window.XMLHttpRequest){
			upload = new XMLHttpRequest();
		}else{
			upload = new ActiveXObject('Microsoft.XMLHTTP');
		}
		
		upload.onreadystatechange = function(){
			if(upload.readyState==4 && upload.status==200){
				$("#messages-body").animate({ scrollTop: $('#messages-body').prop("scrollHeight")}, 1000);
			}
		}
		
		param = 'messagebox='+document.getElementById('messagebox').value + '&userid=' + <?php echo @$userid ;?>  + '&recieverid=' + <?php if(isset($_GET['userid'])){echo @$_GET['userid'];}else{echo '0';}?>;
		
		upload.open('POST','../assets/Codesnips/msg.php',true);
		upload.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		upload.send(param);
		document.getElementById('messagebox').value = '';
		document.getElementById('messagebtn').setAttribute('disabled','disabled');

		// $("#messages-body").on("DOMSubtreeModified", "#messages-body", function(){
		// 	$("#messages-body").animate({ scrollTop: $("#messages-body").prop("scrollHeight")}, 1000);
		// });
	}
</script>
<div class="global-container">
	<div class="container messages-container">
		<div class="left-section dib-vat">
			<div class="left-section-head">
				<div class="listheadoverlay all0"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
				<h4 class="left-list-title h4lb">People</h4>
			</div>
			<ul class="left-list">
			<?php 
			 $msguserquery = "SELECT user_id, profile_image, firstname, lastname, date FROM users as u INNER JOIN ( SELECT sender_id, reciever_id, date FROM messages where reciever_id='$userid' GROUP BY sender_id ORDER BY date desc ) m ON u.user_id = m.sender_id where sender_id!='$userid' ORDER BY date desc";
			 $runmsguserquery = mysqli_query($con,$msguserquery);
			 while($row = mysqli_fetch_assoc($runmsguserquery)){
				 $msglistid = $row['user_id'];
				 $peoplename = $row['firstname'].' '.$row['lastname'];
				 $peopleimg = $row['profile_image'];
				$date = $row['date'];
				
				if(isset($_GET['userid'])){
					$getid=$_GET['userid'];
				if($getid==$msglistid){$active='active';}else{$active = '';}
				}

				$lastseen = "SELECT * FROM messages WHERE reciever_id='$userid' AND sender_id='$msglistid' ORDER BY msg_id DESC LIMIT 1";
				$lastseenrun = mysqli_query($con,$lastseen);
				$lastseencheck = mysqli_fetch_array($lastseenrun);
				$seenornot = $lastseencheck['status'];
				
				if($seenornot=='0'){
					$bold='font-weight:bold;';
				}else{
					$bold='';
				}
				
				
				global $active;
				echo"<li class='$active'><a href='../messages/?userid=$msglistid'>
				<img class='peopleimg dib-vat' src='../user/images/$peopleimg' style='height:20px; width:20px;'>
				<div class='peoplename dib-vat' style='font-size:16px; $bold background:transparent;'>$peoplename </div>
				</a></li>";
			 }
			?>
			</ul>
			<ul class="left-list hiddenleftlist sml-scrl">
			<?php
			echo"<li class='$active'><a href='../messages/?userid=$msglistid'>
			<img class='peopleimg dib-vat' src='../user/images/$peopleimg' style='height:20px; width:20px;'>
			<div class='peoplename dib-vat' style='font-size:16px; $bold background:transparent;'>$peoplename </div>
			</a></li>";
			?>
			</ul>
			
		</div>
		<div class="message-section dib-vat">
			<div class="messages-head">
				<h3 class="messages-title">Messages</h3>
			</div>
			<div id="messages-body" class="messages-body sml-scrl">
			<?php 
			if(!isset($_POST['userid'])){
				echo"<h4 style='text-align:center; color:#7f8c8d'>Select a person from your contact.</h4>";
			}
			?>
			</div>
			<?php
			if($_GET['userid']!=$userid){
				echo "
				<div class='messages-foot'>
				<form name='msgform' id='msgform' class='uploadformcomp' method='POST' action='#' enctype='application/x-www-form-urlencoded'>
					<div class='messagebox-wrap dib-vat'><textarea id='messagebox' name='messagebox' class='dib-vat sml-scrl' placeholder='Write a message' required></textarea></div>
					<input type='button' name='messagebtn' id='messagebtn' class='submitbtn dib-vat' value='Send' onclick='insert();' disabled='disabled' />
				</form>
			</div>";
			}
			?>		


		</div>
	</div>
</div>

<?php
include '../footer.php';

echo"
<script type='text/javascript'>

$(document).ready(function() {
	$('.listheadoverlay').on('click',function(e){
		$('.hiddenleftlist').toggle();
		e.stopPropagation();
	  }); 	
	
	$(window).resize(function(){
		if ($(this).width() < 800){
			$('.listheadoverlay').on('click',function(e){
				$('.hiddenleftlist').toggle();
				e.stopPropagation();
			  }); 
			
		}else{
			$('.hiddenleftlist').hide();
		}
	});
});
$(window).click(function(){ $('.hiddenleftlist').hide();});
 </script>
";

}else{
header('location:../login/');
}
?>