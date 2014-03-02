var TbFeedReader = function(options) {
	//this.options = $.extend({}, this.defaults, options);
	this.model = options.model;
	this.sources = options.sources;
	this.addMethod('Edit');
	this.addMethod('Add');
	this.addMethod('Delete');
};
// add and edit feeds
TbFeedReader.prototype.addMethod = function(method) {
	var model = this.model;
	var isAdd = method === 'Add';
	var isEdit = method === 'Edit';
	var isDelete = method === 'Delete';
	var $form = $('#' + method.toLowerCase() + 'Feeds');
	var $submit = $('#submit' + method + 'Feeds');
	var $success = $('.alert-success', $form);
	var $error = $('.alert-error', $form);
	var $id = $('.form-settings-id', $form);
	var $url = $('.form-settings-url', $form);
	var $title = $('.form-settings-title', $form);
	var $numEntries = $('.form-settings-numentries', $form);
	// url
	if (isAdd) {
		$url.typeahead({
			source: this.sources,		// 選択肢
			items: 20
		});
	}
	// numEntries
	$numEntries.typeahead({
		source: ['4', '8', '12', '16', '20'],	// 選択肢
		sorter: function(items){return items},	// 順序を並び替えない
		matcher: function(item){return true}	// すべてマッチさせ選択肢を開く
	});
	var insertOptions = function(max) {
		var result = '';
		for (var i = 0; i < max; i++) {
			result += '<option>' + i + '</option>';
		}
		return result;
	}
	$id.on('change', function(){
		var _data = {url: '', title: '', numEntries: ''};
		if (!isAdd) {
			_data = model.feed.data[ parseInt( $id.val() ) ];
		}
		$url.val(_data.url);
		$title.val(_data.title);
		$numEntries && $numEntries.val(_data.numEntries);
	});
	// validation and save
	$form.on('show', function(){
		$error.hide();
		$success.hide();
		$submit.removeAttr('disabled');
		if (!isAdd) {
			// feedが無い場合は編集と削除はできない
			if (!model.feed.data.length) {
				$(this).hide();
				return false;
			}
			$id.html(insertOptions(model.feed.data.length)).val(0);
		}
		$id.trigger('change');
		model.feed.errors = {};
	});
	$submit.on('click', function(){
		var _data = {
			url: $url.val(),
			title: $title.val(),
			numEntries: $numEntries.val()
		};
		var options = {data: _data};
		if (!isAdd) {
			options.data.id = parseInt($id.val());
		}
		$success.slideUp();
		$submit.attr('disabled', 'disabled');
		// 入力値を検証後、保存する もしくは削除する
		if (isDelete) {
			var result = model.feed.del(options);
		} else {
			var result = model.feed.save(options);
		}
		if (result) {
			$error.hide();
			$success.slideDown();
			return false;
		} else {
			if (model.feed.errors.url) {
				$url.focus();
			}
			$error.slideDown();
			$submit.removeAttr('disabled');
			console && console.log(model.feed.errors);
		}
		return false; 
	});
};
