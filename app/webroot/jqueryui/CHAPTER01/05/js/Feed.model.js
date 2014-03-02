var Feed = function ( options ) {
	Model.apply( this, arguments );
}
Feed.prototype = new Model();
Feed.prototype.constructor = Feed;
Feed.prototype.defaults = {
	saveKey: 'feeds',
	title: 'url',
	isStore: true
};

Feed.prototype.beforeValidate = function(data) {
	var texts = $.trim(data.url).split(' ');
	data.url = texts.pop();
	if (data.title !== undefined && !data.title.length) {
		data.title = texts.join(' ');
	}
	return true;
}
Feed.prototype.validate = function(data) {
	if (!Model.prototype.validate.apply( this, arguments )) {
		return false;
	}
	// validations
	var result = true;
	result = result && this._urlEmpty(data.url);
	result = result && this._urlInvalid(data.url);
	result = result && this._urlDuprecated (data.url, data.id);
	return !!result;
}

Feed.prototype._urlEmpty= function(value) {
	value = value || '';
	var result = !!value.length;
	if (!result) {
		this.errors.url = 'Empty URL';
	}
	return result;
}

Feed.prototype._urlInvalid = function(value) {
	value = value || '';
	var result = !!value.match(/^https?:\/\/.+$/);
	if (!result) {
		this.errors.url = 'Invalid URL';
	}
	return result;
}

Feed.prototype._urlDuprecated = function(value, id) {
	value = value || '';
	var _data = this.find();
	var result = true;
	if (_data) {
		for (var i = 0, max = _data.length; i < max; i++) {
			result = result && (value !== _data[i].url || id === i);
		}
	}
	if (!result) {
		this.errors.url = 'Duprecated URL';
	}
	return result;
}
