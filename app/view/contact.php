<?php 
require 'static/header.php';
require 'header.php';
?>
	<div id="content">
		<p class="aboutus">
		Yaptıklarımıza ve çalışma biçimimize dair birçok bilgiye buradan ulaşabilir, birlikte çalışmak için bizimle iletişime geçebilirsiniz.
		</p>
		<form action='<?php echo url.'/contact/send'; ?>' method='POST'>
			<input type='text' name='cname' placeholder='Adınız, soyadınız'>
			<input type='text' name='csub' placeholder='Destek almak istediğiniz konu'>
			<input type='text' name='cmail' placeholder='Eposta adresiniz'>
			<textarea name='cmess' id='' placeholder='Kısaca bizimle iletişime geçmenize neden olan isteklerinizi yazınız' maxlength='250'></textarea>
			<button name='submit' value='1'><i class='fa fa-hand-point-right'></i></button>
		</form>
		<ol class='contactme'>
			<li><a href=''>bilendis@info.com</a></li>
			<li><a href=''>facebook</a></li>
			<li><a href=''>twitter</a></li>
		</ol>
	</div>

<?php require 'static/footer.php' ?>