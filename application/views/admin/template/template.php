<script>
$(document).ready(function(){
	tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "modern",
	plugins : "advlist,anchor,autolink,autoresize,autosave,bbcode,charmap,code,colorpicker,contextmenu,directionality,emoticons,example,example_dependency,fullpage,fullscreen,hr,importcss,image,insertdatetime,layer,noneditable,visualchars,nonbreaking,template",
 
	// Theme options
	theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
 
	// Drop lists for link/image/media/template dialogs
	template_external_list_url : "js/template_list.js",
	external_link_list_url : "js/link_list.js",
	external_image_list_url : "js/image_list.js",
	media_external_list_url : "js/media_list.js"
});
})
</script>
<div class='body-container'>
	<div class='main-contain'>
					
		<div class='contain'>
			<form id="template" method='post' action="<?php echo base_url("admin/saveTemplate/".$id)?>">
				<div class='block-contain'>
					<div  class='block-title'>
						<span><?php echo $title?></span>
					</div>
					<div id='contain'> 
						<div class='box'>
							<div id='label'>
								<span>Name</span>
							</div>
							<div id='text'>
								
								<input class="form-control" type='text' id='name' name='name' value='<?php echo $title?>'readonly='readonly'/>
							</div>
						</div>
						
						<div class='box'>
							<div id='label'>
								<span>Description</span>
							</div>
							<div id='text'>
								<textarea class="form-control" id="desc" name='desc'></textarea>
							</div>
						</div>
						
						<div class='box'>
							<div id='label'>
								<span>Video/Image</span>
							</div>
							<div id='text'>
								<input  type='file' name='img'/>
							</div>
						</div>
							
						<div class='box'>
							<div id='label'>
									<span> </span>
							</div>
							<div id='text'>
								<button>Save</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<div class='block-contain'>
				<form id="template" method='post' action="<?php echo base_url("admin/saveContact/".$id)?>">
				<div  class='block-title'>
					<span>Create Class</span>
				</div>
				<div id='contain'> 
					<div class='box'>
						<div id='label'>
							<span>Name</span>
						</div>
						<div id='text'>
							
							<input class="form-control" type='text'  name='name'/>
						</div>
					</div>
					<div class='box'>
						<div id='label'>
							<span>Author</span>
						</div>
						<div id='text'>
							
							<input class="form-control" type='text' name='name'/>
						</div>
					</div>
					<div class='box'>
						<div id='label'>
							<span>Description</span>
						</div>
						<div id='text'>
							<textarea class="form-control" name='desc'></textarea>
						</div>
					</div>
					
					<div class='box'>
						<div id='label'>
							<span>Video/Image</span>
						</div>
						<div id='text'>
							<input  type='file' name='img'/>
						</div>
					</div>
						
					<div class='box'>
						<div id='label'>
								<span> </span>
						</div>
						<div id='text'>
							<button>Create</button>
						</div>
					</div>
				</div>
			</div>
		</form>
			<div class='block-contain'>
				<div class='block-title'>
					<span>List of Class</span>
				</div>
				<div id='contain'> 
					<table>
						<thead>
							<th>Date</th>
							<th>Title</th>
		
							<th>Author</th>
							<th>Action</th>
						</head>
						
					</table>
						
					
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		
		$form =$("#template");
		//validateform($form,data);
		$('#template').FormValidate(["name","desc"]);
	})
</script>