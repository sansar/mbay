<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.steps.min.js"></script>
<script type="text/javascript" src="/js/dropdown/jquery.easydropdown.min.js"></script>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/uploader/blueimg-gallery.min.css">
<link rel="stylesheet" href="/css/uploader/jquery.fileupload.css">
<link rel="stylesheet" href="/css/uploader/jquery.fileupload-ui.css">
<link rel="stylesheet" href="/css/dropdown/demo.css">
<link rel="stylesheet" href="/css/dropdown/easydropdown.css">

<div class="admin form">
	<?php
	echo $this->Form->create ( 'Good', Array (
			'url' => '/goods/step2/102' 
	) );
	echo $this->Form->input ( 'images.dirpath', array (
			'value' => $token,
			'type' => 'hidden' 
	) );
	echo $this->Form->input ( 'Good.overview', array (
			'label' => __ ( 'Overview', true ),
			'placeholder' => __ ( 'Overview', true ),
			'error' => array (
					'notEmpty' => __ ( 'Required', true ),
					'maxLength' => __ ( 'Max length is 100', true ) 
			),
			'required' => false 
	) );
	echo $this->Form->input ( 'Good.detail', array (
			'label' => __ ( 'Detail', true ),
			'placeholder' => __ ( 'Enter detail', true ),
			'error' => array (
					'notEmpty' => __ ( 'Enter the detail', true ),
					'minLength' => __ ( 'min length 10', true ) 
			),
			'rows' => 10,
			'required' => false 
	) );
	echo $this->Form->input ( 'Good.pickup_flag', array (
			'legend' => false,
			'label' => false,
			'type' => 'select',
			'multiple'=> 'checkbox',
			'options' => array (
					1 => __ ( 'онцлох бараа', true ),
			),
			'required' => false 
	) );
	echo $this->Form->input ( 'Good.price', array (
			'label' => __ ( 'Price', true ),
			'placeholder' => __ ( 'Price', true ),
			'error' => array (
					'number' => __ ( 'Price must be bigger than 1000', true ) 
			),
			'step' => 100,
			'required' => false 
	) );
	echo $this->Form->input ( 'Good.cond', array (
			'label' => array (
					'text' => __ ( 'Condition', true ) 
			),
			'empty' => __ ( '--Choose condition--' ),
			'options' => array (
					CONDITION_1 => __ ( 'very old', true ),
					CONDITION_2 => __ ( 'old', true ),
					CONDITION_3 => __ ( 'middle', true ),
					CONDITION_4 => __ ( 'almost new', true ),
					CONDITION_5 => __ ( 'new', true ) 
			),
			'error' => array (
					'inList' => __ ( 'Choose the condition', true ) 
			),
			'class' => 'dropdown',
			'required' => false 
	) );
	echo $this->Form->input ( 'Good.quantity', array (
			'label' => __ ( 'Quantity', true ),
			'placeholder' => __ ( 'Quantity', true ),
			'error' => array (
					'number' => __ ( 'Enter the quantity', true ) 
			),
			'default' => 1,
			'required' => false 
	) );
	echo $this->Form->input ( 'ClothesBoot.sex', array (
			'legend' => false,
			'label' => array (
					'text' => __ ( 'Sex', true ) 
			),
			'type' => 'select',
			'multiple'=> 'checkbox',
			'options' => array (
					0 => __ ( 'male', true ),
					1 => __ ( 'female', true ),
			),
			'error' => array (
					'inList' => __ ( 'Choose sex', true ) 
			),
			'required' => false 
	) );
	echo $this->Form->input ( 'ClothesBoot.type', array (
			'label' => array (
					'text' => __ ( 'Type', true ) 
			),
			'empty' => __ ( '--Choose type--', true ),
			'options' => array (
					BOOT_TYPE_puuz => __ ( 'puuz', true ),
					BOOT_TYPE_uvliin => __ ( 'uvliin gutal', true ),
					BOOT_TYPE_sandal => __ ( 'sandal', true ),
					BOOT_TYPE_botink => __ ( 'botink', true ),
					BOOT_TYPE_tufli => __ ( 'tufli', true ),
					BOOT_TYPE_turiitei => __ ( 'turiitei gutal', true ),
					BOOT_TYPE_usgiigui => __ ( 'usgiigui gutal', true ),
					BOOT_TYPE_busad => __ ( 'busad', true ),
			),
			'error' => array (
					'inList' => __ ( 'Choose the type', true ) 
			),
			'class' => 'dropdown',
			'required' => false
	) );
	echo $this->Form->end ( __ ( 'Confirm', true ) );
	?>
	<div class="">
		<form id="fileupload" action="/" method="POST"
			enctype="multipart/form-data">
			<input type="hidden" name="dirpath" value="<?php echo $token; ?>" />
			<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
			<div class="row fileupload-buttonbar">
				<div class="col-lg-7">
					<!-- The fileinput-button span is used to style the file input field as button -->
					<span class="btn btn-success fileinput-button"> <i
						class="glyphicon glyphicon-plus"></i> <span>Add files...</span> <input
						type="file" name="files[]" multiple>
					</span>
					<button type="submit" class="btn btn-primary start">
						<i class="glyphicon glyphicon-upload"></i> <span>Start upload</span>
					</button>
					<button type="reset" class="btn btn-warning cancel">
						<i class="glyphicon glyphicon-ban-circle"></i> <span>Cancel upload</span>
					</button>
					<span class="fileupload-process"></span>
				</div>
				<!-- The global progress state -->
				<div class="col-lg-5 fileupload-progress fade">
					<!-- The global progress bar -->
					<div class="progress progress-striped active" role="progressbar"
						aria-valuemin="0" aria-valuemax="100">
						<div class="progress-bar progress-bar-success" style="width: 0%;"></div>
					</div>
				</div>
			</div>
			<!-- The table listing the files available for upload/download -->
			<table role="presentation" class="table table-striped">
				<tbody class="files"></tbody>
			</table>
		</form>
	</div>
	<!-- The blueimp Gallery widget -->
	<div id="blueimp-gallery"
		class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
		<div class="slides"></div>
		<h3 class="title"></h3>
		<a class="prev">‹</a> <a class="next">›</a> <a class="close">×</a> <a
			class="play-pause"></a>
		<ol class="indicator"></ol>
	</div>
	<!-- The template to display files available for upload -->
	<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:30%"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
	</script>
	<!-- The template to display files available for download -->
	<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
	</script>
	<script src="/js/jquery.ui.widget.js"></script>
	<script src="/js/uploader/tmpl.min.js"></script>
	<script src="/js/uploader/load-image.min.js"></script>
	<script src="/js/uploader/canvas-to-blob.min.js"></script>
	<script src="/js/uploader/jquery.blueimp-gallery.min.js"></script>
	<script src="/js/uploader/jquery.iframe-transport.js"></script>
	<script src="/js/uploader/jquery.fileupload.js"></script>
	<script src="/js/uploader/jquery.fileupload-process.js"></script>
	<script src="/js/uploader/jquery.fileupload-image.js"></script>
	<script src="/js/uploader/jquery.fileupload-validate.js"></script>
	<script src="/js/uploader/jquery.fileupload-ui.js"></script>
	<script src="/js/uploader/main.js"></script>
</div>
