<!-- Bootstrap -->
<link href="<?php echo base_url();?>assets/designs/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/font.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/editor.css" type="text/css" rel="stylesheet"/>
<script src="<?php echo base_url();?>assets/designs/js/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready( function() {
          $("#txtEditor").Editor();                    
     });
</script>
<script src="<?php echo base_url();?>assets/designs/js/editor.js"></script>
<script src="<?php echo base_url();?>assets/designs/js/bootstrap.min.js"></script>
<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <ul>
         <li><a href="<?php echo base_url();?>admin">Home</a></li>
         <li><img  src="<?php echo base_url();?>assets/designs/images/arrow.png"></li>
         <li><a href="#">Email Settings</a></li>
      </ul>
   </div>
</div>
<div class="row">
   <div class="col-md-8">
      <div style="color:#FF0000; font-size:12px; padding-left:10px;"><?php 
         echo $this->session->flashdata('message');
         ?>
      </div>
      <form method="POST" action="<?php echo base_url();?>admin/emailSettings" id="settings_form" enctype="multipart/form-data">
         <?php if(count($data)>0)
            $data=$data[0];
            ?> 
		
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
			
         <div class="form-group">
            <label for="inputEmail">Host</label>
            <?php 
               $val = '';
               	if ($this->input->post( 'smpt_host' )) {
               	$val = $this->input->post( 'smpt_host' );
               	}
               	elseif (count($data)) {
               		$val = $data->smtp_host; 
               	}
            ?>
            <input type="text" class="form-control" id="site_title" name="smtp_host" value="<?php echo $val;?>" placeholder="Smtp Host" >
         </div>
         <div class="form-group">
            <label for="inputEmail">User Name</label>
            <?php 
               $val = '';
               	if ($this->input->post('smtp_user')) {
					$val = $this->input->post('smtp_user');
               	}
               	elseif (count($data)) {
               		$val = $data->smtp_user;
               	}
               ?>
			   <input type="text" class="form-control" id="site_description" name="smtp_user" value="<?php echo $val;?>" placeholder="Smtp User Email" >
         </div>
         <div class="form-group">
            <label for="inputEmail">Password</label>
            <?php 
               $val = '';
               	if ($this->input->post('smtp_pass')) {
					$val = $this->input->post('smtp_pass');
               	}
               	elseif (count($data)) {
               		$val = $data->smtp_pass;
               	}
               
               ?>
            <input type="text" class="form-control" id="site_url" name="smtp_pass" value="<?php echo $val;?>" placeholder="Smtp Password" >
         </div>
		 <div class="form-group">
            <label for="inputEmail">Port</label>
			
			<?php 
				$val = '';
					if(($this->input->post('smtp_port' )))
					{
					$val = $this->input->post('smtp_port');
					}
					elseif(count($data))
					{
						$val = $data->smtp_port;
					}
	
			?>
						
            <input type="text" class="form-control" id="copy_right" name="smtp_port" value="<?php echo $val;?>" placeholder="Port no." >
        </div>
                
         <input type="hidden" name="id" value="<?php if(isset($id)) echo $id;?>">
         <button type="submit" class="btn btn-primary wnm-user">Update</button>
      </form>
   </div>
</div>
<!-- CK EDITOR -->
<script src="<?php echo base_url();?>assets/designs/ckeditor.js"></script>
<script>
   $(function() {
   	$('.editors').each(function(){
   	
   		CKEDITOR.replace($(this).attr('id'), { 
   	/*
   	 * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
   	 */
   	extraPlugins: 'htmlwriter',
   	
   	/*
   	 * Style sheet for the contents
   	 */
   	contentsCss: 'body {color:#000; background-color#:FFF;}',
   
   	/*
   	 * Simple HTML5 doctype
   	 */
   	docType: '<!DOCTYPE HTML>',
   
   	/*
   	 * Allowed content rules which beside limiting allowed HTML
   	 * will also take care of transforming styles to attributes
   	 * (currently only for img - see transformation rules defined below).
   	 *
   	 * Read more: http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter
   	 */
   	allowedContent:
   		'h1 h2 h3 p pre[align]; ' +
   		'blockquote code kbd samp var del ins cite q b i u strike ul ol li hr table tbody tr td th caption; ' +
   		'img[!src,alt,align,width,height]; font[!face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',
   
   	/*
   	 * Core styles.
   	 */
   	coreStyles_bold: { element: 'b' },
   	coreStyles_italic: { element: 'i' },
   	coreStyles_underline: { element: 'u' },
   	coreStyles_strike: { element: 'strike' },
   
   	/*
   	 * Font face.
   	 */
   
   	// Define the way font elements will be applied to the document.
   	// The "font" element will be used.
   	font_style: {
   		element: 'font',
   		attributes: { 'face': '#(family)' }
   	},
   
   	/*
   	 * Font sizes.
   	 */
   	fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
   	fontSize_style: {
   		element: 'font',
   		attributes: { 'size': '#(size)' }
   	},
   
   	/*
   	 * Font colors.
   	 */
   
   	colorButton_foreStyle: {
   		element: 'font',
   		attributes: { 'color': '#(color)' }
   	},
   
   	colorButton_backStyle: {
   		element: 'font',
   		styles: { 'background-color': '#(color)' }
   	},
   
   	/*
   	 * Styles combo.
   	 */
   	stylesSet: [
   		{ name: 'Computer Code', element: 'code' },
   		{ name: 'Keyboard Phrase', element: 'kbd' },
   		{ name: 'Sample Text', element: 'samp' },
   		{ name: 'Variable', element: 'var' },
   		{ name: 'Deleted Text', element: 'del' },
   		{ name: 'Inserted Text', element: 'ins' },
   		{ name: 'Cited Work', element: 'cite' },
   		{ name: 'Inline Quotation', element: 'q' }
   	],
   
   	on: {
   		pluginsLoaded: configureTransformations,
   		loaded: configureHtmlWriter
   	}
   });
   });
   
   
   
   });
   
   /*
    * Add missing content transformations.
    */
   function configureTransformations( evt ) {
   	var editor = evt.editor;
   
   	editor.dataProcessor.htmlFilter.addRules( {
   		attributes: {
   			style: function( value, element ) {
   				// Return #RGB for background and border colors
   				return CKEDITOR.tools.convertRgbToHex( value );
   			}
   		}
   	} );
   
   	// Default automatic content transformations do not yet take care of
   	// align attributes on blocks, so we need to add our own transformation rules.
   	function alignToAttribute( element ) {
   		if ( element.styles[ 'text-align' ] ) {
   			element.attributes.align = element.styles[ 'text-align' ];
   			delete element.styles[ 'text-align' ];
   		}
   	}
   	editor.filter.addTransformations( [
   		[ { element: 'p',	right: alignToAttribute } ],
   		[ { element: 'h1',	right: alignToAttribute } ],
   		[ { element: 'h2',	right: alignToAttribute } ],
   		[ { element: 'h3',	right: alignToAttribute } ],
   		[ { element: 'pre',	right: alignToAttribute } ]
   	] );
   }
   
   /*
    * Adjust the behavior of htmlWriter to make it output HTML like FCKeditor.
    */
   function configureHtmlWriter( evt ) {
   	var editor = evt.editor,
   		dataProcessor = editor.dataProcessor;
   
   	// Out self closing tags the HTML4 way, like <br>.
   	dataProcessor.writer.selfClosingEnd = '>';
   
   	// Make output formatting behave similar to FCKeditor.
   	var dtd = CKEDITOR.dtd;
   	for ( var e in CKEDITOR.tools.extend( {}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent ) ) {
   		dataProcessor.writer.setRules( e, {
   			indent: true,
   			breakBeforeOpen: true,
   			breakAfterOpen: false,
   			breakBeforeClose: !dtd[ e ][ '#' ],
   			breakAfterClose: true
   		});
   	}
   }
   
</script>
<!-- Validations -->
<script src="<?php echo base_url();?>assets/designs/js/jquery.validate.min.js"></script>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {			
   		//form validation rules
              $("#settings_form").validate({
                  
   			ignore: "", //To validate hidden fields
   			rules: {
                      site_title: {
   					required: true,
   					rangelength: [5, 100]
   				},
   				site_description: {
   					required: true
   				},
   				site_keywords: {
   					required: true
   				},
   				site_url: {
   					required: true,
   					url: true
   				},
   				address: {
   					required: true
   				},
   				phone: {
   					required: true,
   					digits: true,
   					rangelength: [10,11]
   				},
   				passing_score: {
   					required: true,
   					digits: true
   				},
   				contact_email: {
   					required: true,
   					email: true
   				},
   				certificate_content: {
   					required: true
   				},
   				certificate_sign_text: {
   					required: true
   				}
   				
                  },
   			
   			messages: {
   				site_title: {
   					required: "Please enter title of website."
   				},
   				site_description: {
   					required: "Please enter description for website."
   				},
   				site_keywords: {
   					required: "Please enter site keywords."
   				},
   				site_url: {
   					required: "Please enter site URL."
   				},
   				address: {
   					required: "Please enter address that is to be appear in contact page."
   				},
   				phone: {
   					required: "Please enter contact number."
   				},
   				passing_score: {
   					required: "Please enter qualifying score of the quizzes/exams."
   				},
   				contact_email: {
   					required: "Please enter contact email."
   				},
   				certificate_content: {
   					required: "Please enter content for certificate."
   				},
   				certificate_sign_text: {
   					required: "Please enter text that is to be appear under the uploaded signature."
   				}
   			},
                  
                  submitHandler: function(form) {
                      form.submit();
                  }
              });
          }
      }
   
      //when the dom has loaded setup form validation rules
      $(D).ready(function($) {
          JQUERY4U.UTIL.setupFormValidation();
      });
   
   })(jQuery, window, document);
   
</script>

