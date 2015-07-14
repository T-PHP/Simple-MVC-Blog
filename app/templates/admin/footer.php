<?php

use Helpers\Assets;
use Helpers\Url;

?>

</div> <!-- /#page-wrapper -->

</div> <!-- /#wrapper -->

<!-- JS -->
<?php
Assets::js(array(
	Url::templateAdminPath() . 'js/jquery.js',
	'//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js',
    '//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.0.1/metisMenu.min.js',
    Url::templateAdminPath() . 'js/tinymce/tinymce.min.js',
    Url::templateAdminPath() . 'js/sb-admin-2.js',
));
?>
<script>
tinymce.init({
    selector: "textarea.tinymce",
    plugins: [
         "advlist autolink link image lists charmap preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons paste textcolor jbimages sh4tinymce"
   ],
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | preview media | forecolor backcolor emoticons jbimages sh4tinymce", 
    relative_urls : false
 }); 
    
</script>

<?php echo $data['js']; ?>

</body>
</html>