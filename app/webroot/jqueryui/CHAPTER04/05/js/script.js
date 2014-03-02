/* Author: Toshiya TSURU <t_tsuru@sunbi.co.jp>

*/

/**
 * LocationProvider クラス
 */
var LocationProvider = function(attributes) {
	// 属性としてコピー
	for(var k in attributes) {
		this[k] = attributes[k];
	}

	/*
	 * 作例用に皇居１週の座標データをプリセットしています。
	 */
	this._locations = [{
		lat : 35.689317,
		lng : 139.760685
	}, {
		lat : 35.690398,
		lng : 139.758775
	}, {
		lat : 35.691252,
		lng : 139.756222
	}, {
		lat : 35.693117,
		lng : 139.754398
	}, {
		lat : 35.694319,
		lng : 139.752038
	}, {
		lat : 35.695469,
		lng : 139.751501
	}, {
		lat : 35.695173,
		lng : 139.748926
	}, {
		lat : 35.694389,
		lng : 139.746459
	}, {
		lat : 35.692803,
		lng : 139.746137
	}, {
		lat : 35.690921,
		lng : 139.745772
	}, {
		lat : 35.689073,
		lng : 139.745429
	}, {
		lat : 35.687714,
		lng : 139.74504
	}, {
		lat : 35.685518,
		lng : 139.74452
	}, {
		lat : 35.683932,
		lng : 139.744334
	}, {
		lat : 35.68259,
		lng : 139.744184
	}, {
		lat : 35.681405,
		lng : 139.744871
	}, {
		lat : 35.679854,
		lng : 139.746029
	}, {
		lat : 35.67879,
		lng : 139.747939
	}, {
		lat : 35.677448,
		lng : 139.749312
	}, {
		lat : 35.677379,
		lng : 139.751801
	}, {
		lat : 35.677727,
		lng : 139.753647
	}, {
		lat : 35.677047,
		lng : 139.755256
	}, {
		lat : 35.677605,
		lng : 139.756479
	}, {
		lat : 35.679017,
		lng : 139.75723
	}, {
		lat : 35.680045,
		lng : 139.75811
	}, {
		lat : 35.681422,
		lng : 139.758797
	}, {
		lat : 35.682782,
		lng : 139.759719
	}, {
		lat : 35.684647,
		lng : 139.760535
	}, {
		lat : 35.686651,
		lng : 139.761415
	}, {
		lat : 35.687801,
		lng : 139.761393
	}];
	this._i = 0;

	return this;
}
/**
 * getLocation()
 * 位置情報を取得する
 */
LocationProvider.prototype.getLocation = function(args, callback) {
	
	 // 「今ここ！」からデータを取得する(下記のコードは未検証です。)
	 /*
	 $.getJSON(
		 'http://imakoko-gps.appspot.com/api/latest?callback=?',
		 {
		 	user: args.username
		 },
		 function(data) {
			// コールバックを呼ぶ
			if( typeof callback == 'function') {
				callback({
					location : {
				 		lat: data.points[0].lat,
				 		lng: data.points[0].lop
				 	}
				}, this);
			}
	 	 });
	*/
	/*
	 * 作例用には、プリセットデータを使用します。
	 */
	
	var location = this._locations[this._i++ % this._locations.length];
	if(this._locations.length <= this._i) {
		location = this._locations[this._locations.length -1];
	}
	// コールバックを呼ぶ
	if( typeof callback == 'function') {
		callback({
			location : location
		}, this);
	}

}
/**
 * Runner class
 */
var Runner = function(userName) {
	/*
	 * _userName : 「今ここ！」のユーザー名
	 */
	this._userName = userName;
	/*
	 * _position : ランナーの現在位置（google.maps.LatLng）
	 */
	this._position = null;
	/**
	 * _handlers : イベントハンドラの配列
	 */
	this._handlers = {
		positionChanged : []
	};
	/**
	 * _locationProvider
	 */
	this._locationProvider = new LocationProvider();

	return this;
}
/**
 * getUserName function
 * Runner のユーザー名（今ここ！のユーザー名）
 */
Runner.prototype.getUserName = function() {
	return this._userName;
}
/**
 * getPosition
 * Runner の現在地を返す
 */
Runner.prototype.getPosition = function() {
	return this._position;
}
/**
 * setPosition
 * Runner の現在地を変更する
 */
Runner.prototype.setPosition = function(position) {
	var oldPosition = this._position;
	var newPosition = position;
	if(!newPosition.equals(oldPosition)) {
		this._position = newPosition;
		this.fireEvent('positionChanged', {
			"old" : oldPosition,
			"new" : newPosition
		});
	}
}
/**
 * positionChanges イベントハンドラをセット
 */
Runner.prototype.positionChanged = function(handler) {
	if( typeof handler == 'function') {
		this._handlers.positionChanged.push(handler);
	}
}
/**
 * イベントハンドラを実行する
 */
Runner.prototype.fireEvent = function(eventName, eventData) {
	if( eventName in this._handlers) {
		var handlers = this._handlers[eventName];
		if(!( handlers instanceof Array))
			handlers = [handlers];
		for(var i = 0; i < handlers.length; ++i) {
			var handler = handlers[i];
			if( typeof handler == 'function') {
				handler(eventData, this);
			}
		}
	}
}
/**
 * updatePosition
 * Runner オブジェクトの現在位置を更新する
 */
Runner.prototype.updatePosition = function(callback) {

	// 位置情報の更新
	var runner = this;
	runner._locationProvider.getLocation({
		username: runner.getUserName()
	},function(data, sender) {
		var location = data.location;
		runner.setPosition(new google.maps.LatLng(location.lat, location.lng));
	});

};

/**
 *
 */
$(function() {

	// Googleマップを表示する為のコンテナ要素を取得
	var $canvas = $('#map-canvas');

	// Google マップを表示する
	var $map = $canvas.gmap({
		zoom : 15,
		center : '35.689317,139.760685',
		callback : function() {

			// 
			var $map = this;

			// Runner オブジェクトを生成
			var runner = new Runner('turutosiya');

			// 現在地のマーカー
			var current_marker = null;

			// 位置が更新された際のイベントハンドラを設定
			runner.positionChanged(function(e, sender) {
				var oldPosition = e['old'];
				var newPosition = e['new'];

				// 古いマーカーがある場合は、アイコンを変える
				if(current_marker != null) {
					current_marker.setIcon('img/history.png');
				}
				
				// 進行方向(heading)の算出 (N:0,E:90,S:180,W:270)
				var heading = 0;
				if(oldPosition) {
					// 角度を算出
					var x =  newPosition.lng() - oldPosition.lng();
					var y =  newPosition.lat() - oldPosition.lat();
					var arc = (Math.atan2(y, x) * 180) / Math.PI;
					// -180° ~ 180° となっているのを、 0° ~ 360° スケールに変える
					if(arc < 0) arc = 360 - Math.abs(arc);
					
					// Norty:90,East:0,South:270,West:180 を Noth:0,East:90,South:180,West:270　にする
					arc = 360 - arc; // 角度のベクトルを逆転（反時計回り -> 時計回り）
					arc = arc - 270; // 時計周りに90°回転
					if(arc < 0) arc = 360 - Math.abs(arc); // はみ出た分を 0° ~ 360° スケールに変える
					heading = Math.floor(arc); // 小数点以下切り捨て
				}
				
				// 使用するアイコン画像を決定する　（ランナーの走っている方向を算出 。 w:WEST, e:EAST）
				var direction = (heading == null) ? 'w' : ((0 < heading && heading < 180) ? 'e' : 'w');
				var icon = 'img/runner-' + direction + '.png';
				 
				// マーカークリック時のイベントハンドラ
				var infoWindowHandler = function(marker) {
					var _marker = (marker) ? marker : this;
					
					// 現在位置の取得
					var position = _marker.getPosition();
					
					// マーカーがクリックされた際に、ランナーの名前と時刻と現在地のストリートビューを表示する
					// https://developers.google.com/maps/documentation/streetview/
					var date = new Date();
					var img = 'http://maps.googleapis.com/maps/api/streetview' + 
										'?size=300x145' + // {width}x{height} 
										'&location=' + position.lat() + ',%20' + position.lng() + '' + 
										'&fov=90' + 
										'&heading=' + heading + 
										// '&pitch=10' + 
										'&sensor=false';
					$map.openInfoWindow({
						"content": '<b>' + _marker.getTitle() + '</b>&nbsp;'+
						           '到達時刻：<i>' + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds() + '</i><br/>' + 
						           '<img src="' + img + '" />' 
					 }, _marker);
				};
				
				//現在位置にマーカーを置く
				var $marker = $map.addMarker({
					position : newPosition,
					icon : icon,
					title : runner.getUserName()
				}, function(map, marker) {
					current_marker = marker;
					// マーカーを地図の中心にする
					map.panTo(marker.getPosition());
					// 情報ウィンドウを開く
					infoWindowHandler(marker);
				});
				
				// クリックイベントハンドラを設定
				$marker.click(function() { 
					infoWindowHandler(this);
				});
							
			});

			// 2 秒毎に位置を更新する
			window.setInterval(function() {
				runner.updatePosition();
			}, 2 * 1000);
		}
	});

});
