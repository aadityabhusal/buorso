<?php
include '../../core.php';

if(isset($userid)){
$filedir = "../../";
$title = "Privacy Settings - Buorso";
include '../../header.php';

$privacysql = "SELECT * from settings WHERE user_id='$userid'";
if($privacyrun = mysqli_query($con,$privacysql)){
	$privacydata = mysqli_fetch_array($privacyrun);

	$prodvisible = $privacydata['prodvisible'];
	$message= $privacydata['message'];
	$comment = $privacydata['comment'];
	$adult = $privacydata['adult'];
	$address = $privacydata['address'];

	if($prodvisible==0){$prodcheckstatus = 'checked="checked"'; $prodval=1;}else{$prodcheckstatus=''; $prodval=0;}
	if ($message==0) {$msgcheckstatus = 'checked="checked"'; $msgval=1;}else{$msgcheckstatus =''; $msgval=0;}
	if ($comment==0) {$cmtcheckstatus = 'checked="checked"'; $cmtval=1;}else{$cmtcheckstatus =''; $cmtval=0;}
	if ($adult==0) {$adtcheckstatus = 'checked="checked"'; $adtval=1;}else{$adtcheckstatus =''; $adtval=0;}
	if ($address==0) { $addcheckstatus = 'checked="checked"';$addval=1;}else{$addcheckstatus =''; $addval=0;}

}

?>
<script type="text/javascript">
	function privacysettings(privacytype){
		if (window.XMLHttpRequest) {
			privacy = new XMLHttpRequest();
		}else{
			privacy = new ActiveXObject('Microsoft.XMLHTTP')
		}

		privacy.onreadystatechange = function(){
			if(privacy.readyState == 4 && privacy.status == 200){
				document.getElementById(privacytype).value=privacy.responseText;
			}
		}

		param = "type="+document.getElementById(privacytype).id+"&privacy="+document.getElementById(privacytype).value+"&produserid="+<?php echo $userid; ?>;

		privacy.open('POST','../../assets/Codesnips/privacy.php?',true);
		privacy.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		privacy.send(param);
	}

</script>

<div class="global-container">
	<div class="container">
		<div class="left-section dib-vat">
			<h4 class="left-list-title h4lb">Settings</h4>
			<ul class="left-list">
				<li><a href="../../settings/">Profile Settings</a></li>
				<li><a href="../account">Account Settings</a></li>
				<li class="active"><a href="../privacy">Privacy Settings</a></li>
			</ul>		
		</div>
		<div class="settings-section dib-vat">
			<h3 class="settings-title h3lb">Privacy Settings</h3>
			<div class="setting-content">
				<ul class="settings-list">
				<li>
					<label>Products Visibility</label>
					<label><input type="checkbox" id="privacyprodvisible" name="prodview" onclick="privacysettings('privacyprodvisible');" value="<?php echo $prodval ?>" <?php echo $prodcheckstatus ?>/>Do not allow anyone to see my products</label>
				</li>
				<li>
					<label>Messaging</label>
					<label><input type="checkbox" id="privacymessage" name="allowmsg" onclick="privacysettings('privacymessage');" value="<?php echo $msgval ?>" <?php echo $msgcheckstatus ?>/>Do not allow anyone to send me message</label>
				</li>
				<li>
					<label>Commenting</label>
					<label><input type="checkbox" id="privacycomment" name="allowcmt" onclick="privacysettings('privacycomment');" value="<?php echo $cmtval ?>" <?php echo $cmtcheckstatus ?>/>Do not allow anyone to comment on my products</label>
				</li>					
				<li>
					<label>Address</label>
					<label><input type="checkbox" id="privacyaddress" name="allowaddr" onclick="privacysettings('privacyaddress');" value="<?php echo $addval ?>" <?php echo $addcheckstatus ?>/>Do not allow your address to appear on your Profile page</label>
				</li>					
				<li>
					<label>Adult Products</label>
					<label><input type="checkbox" id="privacyadult" name="allowaddr" onclick="privacysettings('privacyadult');" value="<?php echo $adtval ?>" <?php echo $adtcheckstatus ?>/>Allow adult products to appear in your feed</label>
				</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php
include '../../footer.php';
}else{
header('location:../../login/');
}
?>