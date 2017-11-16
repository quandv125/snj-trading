
<script>
	function getUrlParam( paramName ) {
		var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
		var match = window.location.search.match( reParam );
		return ( match && match.length > 1 ) ? match[1] : null;
	}
	function returnFileUrl( pics ) {
	
		var funcNum = getUrlParam( 'CKEditorFuncNum' );
		var fileUrl = pics;
		
		window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl, function() {
			var dialog = this.getDialog();
			
			if ( dialog.getName() == 'image' ) {
				var element = dialog.getContentElement( 'info', 'txtAlt' );
				if ( element )
					element.setValue( 'alt text' );
			}
		} );
		window.close();
	}
</script>


<?= $this->Form->create(NULL,['url'=>['action'=>'UploadMedia'],'enctype'=>'multipart/form-data']);?>
<?= $this->Form->input('pics.',[ 'type'=>'file', 'multiple']); ?>
<?= $this->Form->button('Submit',array('class' => 'btn btn-success waves-effect waves-button waves-red')); ?>
<?php echo $this->Form->end(); ?>

<div class="clearfix divider15"></div>


<?php foreach ($att as $key => $pics): ?>
	
	<a href= "#" onClick="returnFileUrl('<?php echo 'http://'.$_SERVER[ 'SERVER_ADDR' ].'/img/'.$pics->path;?>');">
		<?php echo $this->Html->image($pics->thumbnail) ?>
	</a>
	
<?php endforeach ?>
