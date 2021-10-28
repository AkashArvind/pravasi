<?php $current_file_name = basename($_SERVER['PHP_SELF']) . "?" . $_SERVER['QUERY_STRING']; ?>

<?php
	if($ln=='en')
	{
		?>
		<a href="includes/langChange.php?ln=ml&redr=<?= $current_file_name ?>" class="lang-btn1"><p>Malayalam</p></a>
		<?php
	}
	else
	{
		?>
		<a href="includes/langChange.php?ln=en&redr=<?= $current_file_name ?>" class="lang-btn1"><p>View English</p></a>
		<?php
	}
?>


<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>