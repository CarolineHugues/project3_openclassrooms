<!DOCTYPE html>
<html>
	<head>
		<title><?= $title ?></title>
		<meta charset="utf-8" />
		<link href="public/css/styleBackend.css" rel="stylesheet" />
		<script type="text/javascript" src="Public/javascript/tinymce_4.7.9/tinymce/js/tinymce/tinymce.min.js"></script>
    	<script type="text/javascript">
        tinyMCE.init({
     		mode : "textareas",
     		plugins : "link, image, lists, media, wordcount, preview, hr, advlist, autolink, charmap, textcolor",
  			toolbar: "undo, redo, formatselect, bold, italic, alignleft, aligncenter, alignright, alignjustify, forecolor, backcolor, charmap, bullist, numlist, image, link, unlink, blockquote",
     		language : "fr_FR"
        });
     	</script> 
	</head>
	<body>
		<header id="headerAdmin">
			<h1>Administration du site</h1>
			<h2>Roman : <i>Billet simple pour l'Alaska</i> - Jean Forteroche</h2>
		</header>
		<?= $content ?>
	</body>
</html>