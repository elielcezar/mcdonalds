
<?php 

unset($dbh); unset($stmt);

?>

<footer>
	<div class="container">
		<p><span>powered by:</span> MegaMidia Group</p>
	</div>
</footer>

<script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
$('form input').on('change invalid', function() {
    var textfield = $(this).get(0);
    textfield.setCustomValidity('');    
    if (!textfield.validity.valid) {
      textfield.setCustomValidity('Por favor, preencha esse campo');  
    }
});
</script>

</body>
</html>