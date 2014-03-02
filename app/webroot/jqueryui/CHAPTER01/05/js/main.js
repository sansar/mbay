google.setOnLoadCallback(function(){
	var model = {};
	model.feed = new Feed();

	$(function(){
		// Feedを読み込み画面に書き出す
		var resultID = '#result';
		var $result = $(resultID);
		var afterLoad = function(e, result, data) {
			if (result.error) {
				console.log(result.error);
				return false;
			}
			var $this = $(this);
			var $body = $this.find('.feed-body');
			$.each(result.feed.entries, function(i, entry) {
				result.feed.entries[i].publishedDate = (new Date(entry.publishedDate)).format();
			});
			$body.html(
				SNBinder.bind_rowset($body.html().fixLinkUrl(), result.feed.entries)
			);
			result.feed.id = data.id;
			result.feed.mytitle = data.title;
			$this.html(
				SNBinder.bind($this.html().fixLinkUrl(), result.feed)
			).appendTo( resultID ).show();
		};
		// 読み込みボタンを押したときの処理
		$('#startReading').click(function(){
			$result.empty();
			for (var i = 0, len = model.feed.data.length; i < len; i++) {
				var feed = model.feed.data[i];
				$('.accordion-group', '#snTemplates')
					.hide().clone()
					.feedReader({
						url: feed.url,
						numEntries: feed.numEntries || 20,
						data: {id: i, title: feed.title || feed.url}
					})
					.on('loaded', afterLoad);
			};
		});
		// feedが登録されてないときのメッセージを表示
		if (!model.feed.data || !model.feed.data.length) {
			$('#emptyFeedInformation').show();
		}
	});

	$(function(){
		// フォームを作成しフィードを保存する
		var tbFeedReader = new TbFeedReader({model: model, sources: sources});
	});
});

// 日付フォーマット
Date.prototype.format = function() {
	year   = this.getYear();
	month  = this.getMonth() + 1;
	day    = this.getDate();
	hour   = this.getHours();
	minute = this.getMinutes();
	if (year < 2000) { year  += 1900; }
	if (month  < 10) { month  = '0'+month; }
	if (day    < 10) { day    = '0'+day; }
	if (hour   < 10) { hour   = '0'+hour; }
	if (minute < 10) { minute = '0'+minute; }
	return String(year)+'年'+month+'月'+day+'日 '+hour+'時'+minute+'分';
};

// firefoxでSNBinderのリンクURLが正常に差し込めないことへの対応
String.prototype.fixLinkUrl = function() {
	return this.replace(/"\$%28\.link%29"/g, '"$(.link)"');
};
