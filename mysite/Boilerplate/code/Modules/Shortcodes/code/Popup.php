<?php
    require_once( 'ShortcodeGenerator.php' );
    $popup = trim( $_GET['shortcode'] );
    $shortcode = new ShortcodeGenerator( $popup );
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $shortcode->title; ?></title>
<link rel="stylesheet" href="../../../../../../framework/thirdparty/tinymce/themes/advanced/skins/default/dialog.css">
<style type="text/css">
	<!--
		.hide{display:none;}
	-->
</style>
<script type="text/javascript" src="../plugins/jquery.js"></script>
<script type="text/javascript" src="../../../../../../framework/thirdparty/tinymce/tiny_mce_popup.js"></script>
<script type="text/javascript">

    var hex = {
        loadVals : function(){
            var shortcode = $('#_shortcode').text(),
                uShortcode = shortcode;
            $('.shortcode-input').each(function() {
                var input = $(this),
                    id = input.attr('id'),
                    id = id.replace('hex_', ''),
                    re = new RegExp("{{"+id+"}}","g");

                uShortcode = uShortcode.replace(re, input.val());
            });
            $('#_shortcode_hidden').text(uShortcode);
        },
        load : function(){
            hex.loadVals();
            $('.shortcode-input').on('change', function() {
                hex.loadVals();
            });
        }
    }
    $(hex.load);
    var ButtonDialog = {
        local_ed : 'ed',
        init : function(ed) {
            ButtonDialog.local_ed = ed;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert : function insertButton(ed) {
            tinyMCEPopup.execCommand('mceRemoveNode', false, null);
            output = $('#_shortcode_hidden').text();
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);

</script>

</head>
<body>
	<div class="tabs" role="tablist" tabindex="-1">
		<ul>
			<li id="general_tab" aria-controls="general_panel" class="current" role="tab" tabindex="0"><span><a href="javascript:mcTabs.displayTab('general_tab','general_panel');" onmousedown="return false;" tabindex="-1">General</a></span></li>
		</ul>
	</div><!-- /.tabs -->
	<div class="panel_wrapper">
		<div id="general_tab" class="panel current">
			<?php echo $shortcode->out; ?>
		</div><!-- /.panel current -->
	</div><!-- /.panel_wrapper -->
	<div class="mceActionPanel">
		<input type="submit" onClick="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" class="button-primary" value="Insert" />
		<input type="button" id="cancel" name="cancel" value="Cancel" onclick="tinyMCEPopup.close();">
	</div><!-- /.mceActionPanel -->
</body>
</html>