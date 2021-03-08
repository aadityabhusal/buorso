
<footer>
<div id="footnav">
<div class="logobx dib-vat" style=" font-size:14px; margin-top:15px; color:#999;">&copy; <?php echo date("Y"); ?> Buorso</div>
<ul class="footnav-ul dib-vat">
<li><a href="<?php echo $filedir;?>about/">About</a></li>
<li><a href="<?php echo $filedir;?>terms/">Terms</a></li>
<li><a href="<?php echo $filedir;?>privacy/">Privacy</a></li>
<li><a href="#">Safety</a></li>
<li><a href="<?php echo $filedir;?>help/">Help</a></li>
<li><a href="<?php echo $filedir;?>contact/">Contact</a></li>
</ul>
</div>
</footer>
<?php echo "<script type='text/javascript'>

function externalLinks() {
  for(var c = document.getElementsByTagName('a'), a = 0;a < c.length;a++) {
    var b = c[a];
    b.getAttribute('href') && b.hostname !== location.hostname && (b.target = '_blank');
  }
}
externalLinks();

/*
function btnfrmsubmit(formname,textname){
	if($.trim(document.getElementById(textname).value)==''){}else{
	var formnameid = document.getElementById(formname);
	formnameid.submit();
	 }
}
*/

var modalbg = document.getElementById('modal-bg');
var modal = document.getElementById('modal');
var docbody = document.getElementById('body');
function show_msgbox(){modal.style.display='block';modalbg.style.display='block';docbody.style.overflow = 'hidden';}
function exit_msgbox(){modal.style.display='none';modalbg.style.display='none';	docbody.style.overflow = 'auto';}




function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(input).siblings('.changeimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$('#file').change(function(){
    readURL(this);
});
$('#file2').change(function(){
    readURL(this);
});
$('#file3').change(function(){
    readURL(this);
});
$('#file4').change(function(){
    readURL(this);
});


$('.promoclose').attr('title','Close ad');
$('.promo').attr('title','This is an Advertisement');

$('.promoclose').click(function(){
	$(this).parents('.promo').css('display','none');
});





//Validation Starts

(function() {
    $('.uploadformcomp input,.uploadformcomp textarea').on('input paste drop focusin',function() {

        var empty = false;
        $('.uploadformcomp input[required],.uploadformcomp textarea[required]').each(function() {
            if ($.trim($(this).val()) == '') {
                empty = true;
            }
        });

        if (empty) {
            $('.submitbtn').attr('disabled', 'disabled');
        } else {
            $('.submitbtn').removeAttr('disabled');
        }
    });
})()


/*
$(document).ready(function () {
    $('form').submit(function () {
        $('input[type=submit]').attr('disabled', true);
        return true;
    });
});
*/




 $('#pass').focusin(function(){
$('#pass').css('borderColor','#4d90fe');
	$('#pmsg').fadeOut(0);
});

		
$('#pass').focusout(function(){
	if ($.trim($('#pass').val()).length<8){
		$('#pass').css('borderColor','red');
		$('#pmsg').fadeIn(100).css('marginBottom','0px');
	}else{
		$('#pass').css('borderColor','#ecf0f1');
		$('#pmsg').hide(0);
	}
});

$('#signupbtn').click(function(){	
  if ($.trim($('#pass').val()).length<8){
    $('#signupform').submit(function(e){
        e.preventDefault();
    });
  }else{
	  $('#signupform').submit();
  }
});

</script>";?>
</body>
</html>