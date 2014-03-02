var Model = function ( options ) {
	this.options = $.extend({}, this.defaults, options);
	if (typeof localStorage !== 'object') {
		this.options.isStore = false;
		return false;
	}
	this.find();
}

Model.prototype = {
	constructor: Model
	, defaults: {
		saveKey: 'data',
		title: 'title',
		isStore: true
	}
	, data: []
	, errors: {}
	, beforeFind: function(options) {
		return options;
	}
	, afterFind: function(results) {
		return results;
	}
	, beforeValidate: function(data) {
		return true;
	}
	, beforeSave: function(options) {
		return true;
	}
	, afterSave: function() {
		return;
	}
	, beforeDelete: function(options) {
		return true;
	}
	, afterDelete: function() {
		return;
	}
	, getItem: function() {
		if (this.options.isStore) {
			this.data = JSON.parse(localStorage.getItem(this.options.saveKey));
		}
		return this.data;
	}
	, setItem: function(data) {
		this.data = data;
		if (this.options.isStore) {
			localStorage.setItem(this.options.saveKey, JSON.stringify(data));
		}
		return this.data;
	}
	, _find: function() {
		return this.getItem();
	}
	, find: function(options) {
		// beforeFind
		options = this.beforeFind(options);
		if (options === false) {
			return false;
		}
		// find
		data = this._find();
		// afterFind
		data = this.afterFind(data);
		return this.data = data;
	}
	, _save: function(data) {
		this.setItem(data);
	}
	, save: function(options) {
		var data = this._find();
		// check
		if (!options.data) {
			this.errors.checkData = 'empty data';
			return false;
		}
		var isEdit = options.data.id !== undefined;
		if (isEdit && !data[options.data.id]) {
			this.errors.checkData = 'id is not exist';
			return false;
		}
		// validate
		if ((options.validate === undefined || options.validate !== false) && !this.validate(options.data)) {
			this.errors.autoValidate = 'beforeSave validation return false';
			return false;
		}
		// beforeSave
		if (!this.beforeSave(options)) {
			this.errors.beforeSave = 'beforeSave return false';
			return false;
		}
		// set
		if (isEdit) {
			var id = options.data.id;
			delete options.data.id;
			data.splice(id, 1, options.data);
		} else {
			data = $.isArray(data) && data.length ? [options.data].concat(data) : [options.data];
		}
		// save
		this._save(data);
		// afterSave
		this.afterSave();
		return data;
	}
	,del: function(options) {
		var data = this.find();
		// beforeDelete
		if (!options.data || options.data.id === undefined || !data[options.data.id] || !this.beforeDelete(options)) {
			this.errors.check = 'empty data';
			return false;
		}
		// check data
		if (data[options.data.id][this.options.title] !== options.data[this.options.title]) {
			this.errors.check = 'invalid data';
			return false;
		}
		// delete
		data.splice(options.data.id, 1);
		this._save(data);
		// afterDelete
		this.afterDelete();
		return true;
	}
	,validate: function(data) {
		this.errors = {};
		// beforeValidate
		if (!this.beforeValidate(data)) {
			this.errors.beforeValidate = 'beforeValidate return false';
			return false;
		}
		// validate
		if (data === undefined) {
			this.errors.all = 'Empty Data';
			return false;
		}
		return true;
	}
}
