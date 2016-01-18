<!-- keep these styles line at the top; I will remove this later -->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" media="all">
<link  href="../css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../css/rateit.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../assets/bootstrap-select/bootstrap-select.css">
<!-- keep this javascript at the top as well -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="../js/bootstrap.min.js" ></script>
<script src="../js/bootstrap-multiselect.js"></script>
<script src="../js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="../assets/bootstrap-select/bootstrap-select.js"></script>

<script src="../js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    width: 520,
    height: 200,
    plugins: [
         "autolink link lists charmap ",
         "wordcount  ",
         "emoticons paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "bold italic | bullist numlist | link | forecolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>
<script type="text/javascript">
        $(window).on('load', function () {

           $('.selectpicker').selectpicker('show');
        });
    </script>
<?php require_once("../includes/functions.php");?>