var sources = [
'Googleニュース - ピックアップ http://news.google.com/news?hl=ja&ned=us&ie=UTF-8&oe=UTF-8&output=rss&topic=ir', 
'Googleニュース - 社会 http://news.google.com/news?hl=ja&ned=us&ie=UTF-8&oe=UTF-8&output=rss&topic=y', 
'Googleニュース - 国際 http://news.google.com/news?hl=ja&ned=us&ie=UTF-8&oe=UTF-8&output=rss&topic=w', 
'Googleニュース - ビジネス http://news.google.com/news?hl=ja&ned=us&ie=UTF-8&oe=UTF-8&output=rss&topic=b', 
'Googleニュース - 政治 http://news.google.com/news?hl=ja&ned=us&ie=UTF-8&oe=UTF-8&output=rss&topic=p', 
'Googleニュース - エンタメ http://news.google.com/news?hl=ja&ned=us&ie=UTF-8&oe=UTF-8&output=rss&topic=e', 
'Googleニュース - スポーツ http://news.google.com/news?hl=ja&ned=us&ie=UTF-8&oe=UTF-8&output=rss&topic=s', 
'Googleニュース - テクノロジー http://news.google.com/news?hl=ja&ned=us&ie=UTF-8&oe=UTF-8&output=rss&topic=t', 
'Googleニュース - 話題のニュース http://news.google.com/news?hl=ja&ned=us&ie=UTF-8&oe=UTF-8&output=rss&topic=po', 
'Yahoo!トピックス - トピックストップ http://rss.dailynews.yahoo.co.jp/fc/rss.xml', 
'Yahoo!トピックス - 国内 http://rss.dailynews.yahoo.co.jp/fc/domestic/rss.xml', 
'Yahoo!トピックス - 海外 http://rss.dailynews.yahoo.co.jp/fc/world/rss.xml', 
'Yahoo!トピックス - 経済 http://rss.dailynews.yahoo.co.jp/fc/economy/rss.xml', 
'Yahoo!トピックス - エンターテインメント http://rss.dailynews.yahoo.co.jp/fc/entertainment/rss.xml', 
'Yahoo!トピックス - スポーツ http://rss.dailynews.yahoo.co.jp/fc/sports/rss.xml', 
'Yahoo!トピックス - コンピュータ http://rss.dailynews.yahoo.co.jp/fc/computer/rss.xml', 
'Yahoo!トピックス - サイエンス http://rss.dailynews.yahoo.co.jp/fc/science/rss.xml', 
'Yahoo!トピックス - 地域 http://rss.dailynews.yahoo.co.jp/fc/local/rss.xml', 
'Yahoo!ニュース - 国内 http://headlines.yahoo.co.jp/rss/all-dom.xml', 
'Yahoo!ニュース - 国内 - Business Media 誠 http://headlines.yahoo.co.jp/rss/zdn_mkt-dom.xml', 
'Yahoo!ニュース - 国内 - ITmedia ニュース http://headlines.yahoo.co.jp/rss/zdn_n-dom.xml', 
'Yahoo!ニュース - 国内 - J-CASTニュース http://headlines.yahoo.co.jp/rss/jct-dom.xml', 
'Yahoo!ニュース - 国内 - nikkei TRENDYnet http://headlines.yahoo.co.jp/rss/nkbp_tren-dom.xml', 
'Yahoo!ニュース - 国内 - 医療介護ＣＢニュース http://headlines.yahoo.co.jp/rss/cbn-dom.xml', 
'Yahoo!ニュース - 国内 - カナロコ http://headlines.yahoo.co.jp/rss/kana-dom.xml', 
'Yahoo!ニュース - 国内 - 産経新聞 http://headlines.yahoo.co.jp/rss/san-dom.xml', 
'Yahoo!ニュース - 国内 -レスポンス http://headlines.yahoo.co.jp/rss/rps-dom.xml', 
'Yahoo!ニュース - 海外 http://headlines.yahoo.co.jp/rss/all-c_int.xml', 
'Yahoo!ニュース - 海外 - Business Media 誠 http://headlines.yahoo.co.jp/rss/zdn_mkt-c_int.xml', 
'Yahoo!ニュース - 海外 - CNN.co.jp http://headlines.yahoo.co.jp/rss/cnn-c_int.xml', 
'Yahoo!ニュース - 海外 - Record China http://headlines.yahoo.co.jp/rss/rcdc-c_int.xml', 
'Yahoo!ニュース - 海外 - アジアプレス http://headlines.yahoo.co.jp/rss/asiap-c_int.xml', 
'Yahoo!ニュース - 海外 - インド新聞 http://headlines.yahoo.co.jp/rss/indonews-c_int.xml', 
'Yahoo!ニュース - 海外 - ウォール・ストリート・ジャーナル http://headlines.yahoo.co.jp/rss/wsj-c_int.xml', 
'Yahoo!ニュース - 海外 - サーチナ http://headlines.yahoo.co.jp/rss/scn-c_int.xml', 
'Yahoo!ニュース - 海外 - 産経新聞 http://headlines.yahoo.co.jp/rss/san-c_int.xml', 
'Yahoo!ニュース - 海外 - 中央日報日本語版 http://headlines.yahoo.co.jp/rss/cnippou-c_int.xml', 
'Yahoo!ニュース - 海外 - 朝鮮日報日本語版 http://headlines.yahoo.co.jp/rss/chosun-c_int.xml', 
'Yahoo!ニュース - 海外 - 毎日中国経済 http://headlines.yahoo.co.jp/rss/xinhua-c_int.xml', 
'Yahoo!ニュース - 海外 - 聯合ニュース http://headlines.yahoo.co.jp/rss/yonh-c_int.xml', 
'Yahoo!ニュース - 経済 http://headlines.yahoo.co.jp/rss/all-bus.xml', 
'Yahoo!ニュース - 経済 - Business Media 誠 http://headlines.yahoo.co.jp/rss/zdn_mkt-bus.xml', 
'Yahoo!ニュース - 経済 - Impress Watch http://headlines.yahoo.co.jp/rss/impress-bus.xml', 
'Yahoo!ニュース - 経済 - J-CASTニュース http://headlines.yahoo.co.jp/rss/jct-bus.xml', 
'Yahoo!ニュース - 経済 - MONEYzine http://headlines.yahoo.co.jp/rss/sh_mon-bus.xml', 
'Yahoo!ニュース - 経済 - nikkei TRENDYnet http://headlines.yahoo.co.jp/rss/nkbp_tren-bus.xml', 
'Yahoo!ニュース - 経済 - ウォール・ストリート・ジャーナル http://headlines.yahoo.co.jp/rss/wsj-bus.xml', 
'Yahoo!ニュース - 経済 - サーチナ http://headlines.yahoo.co.jp/rss/scn-bus.xml', 
'Yahoo!ニュース - 経済 - 産経新聞 http://headlines.yahoo.co.jp/rss/san-bus.xml', 
'Yahoo!ニュース - 経済 - 帝国データバンク http://headlines.yahoo.co.jp/rss/teikokudb-bus.xml', 
'Yahoo!ニュース - 経済 - フジサンケイ　ビジネスアイ http://headlines.yahoo.co.jp/rss/fsi-bus.xml', 
'Yahoo!ニュース - 経済 - 誠 Biz.ID http://headlines.yahoo.co.jp/rss/zdn_b-bus.xml', 
'Yahoo!ニュース - 経済 - レスポンス http://headlines.yahoo.co.jp/rss/rps-bus.xml', 
'Yahoo!ニュース - エンターテインメント http://headlines.yahoo.co.jp/rss/all-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - cinemacafe.net http://headlines.yahoo.co.jp/rss/cine-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - Impress Watch http://headlines.yahoo.co.jp/rss/impress-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - ITmedia ガジェット http://headlines.yahoo.co.jp/rss/it_gadget-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - J-CASTニュース http://headlines.yahoo.co.jp/rss/jct-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - Movie Walker http://headlines.yahoo.co.jp/rss/mvwalk-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - nikkei TRENDYnet http://headlines.yahoo.co.jp/rss/nkbp_tren-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - RBB TODAY http://headlines.yahoo.co.jp/rss/rbb-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - Record China http://headlines.yahoo.co.jp/rss/rcdc-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - WoW!Korea http://headlines.yahoo.co.jp/rss/wow-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - ＠ぴあ http://headlines.yahoo.co.jp/rss/pia-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - インサイド http://headlines.yahoo.co.jp/rss/isd-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - 映画.com http://headlines.yahoo.co.jp/rss/eiga-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - お笑いナタリー http://headlines.yahoo.co.jp/rss/natalieo-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - ギズモード・ジャパン http://headlines.yahoo.co.jp/rss/giz-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - コミックナタリー http://headlines.yahoo.co.jp/rss/nataliec-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - サーチナ http://headlines.yahoo.co.jp/rss/scn-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - 産経新聞 http://headlines.yahoo.co.jp/rss/san-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - サンケイスポーツ http://headlines.yahoo.co.jp/rss/sanspo-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - シネマトゥデイ http://headlines.yahoo.co.jp/rss/flix-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - デビュー http://headlines.yahoo.co.jp/rss/devi-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - ナタリー http://headlines.yahoo.co.jp/rss/natalien-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - 日刊ゲンダイ http://headlines.yahoo.co.jp/rss/nkgendai-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - ぴあ映画生活 http://headlines.yahoo.co.jp/rss/piaeiga-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - ＋D LifeStyle http://headlines.yahoo.co.jp/rss/zdn_lp-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - ＋D PC USER http://headlines.yahoo.co.jp/rss/piaeiga-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - 夕刊フジ http://headlines.yahoo.co.jp/rss/ykf-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - レスポンス http://headlines.yahoo.co.jp/rss/rps-c_ent.xml', 
'Yahoo!ニュース - エンターテインメント - 聯合ニュース http://headlines.yahoo.co.jp/rss/yonh-c_ent.xml', 
'Yahoo!ニュース - テクノロジー http://headlines.yahoo.co.jp/rss/all-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - BCN http://headlines.yahoo.co.jp/rss/bcn-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - CNET Japan http://headlines.yahoo.co.jp/rss/cnetj-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - Computerworld http://headlines.yahoo.co.jp/rss/cwj-c_sci.xml', 
'Yahoo!ニュース -テクノロジー - Engadget 日本版 http://headlines.yahoo.co.jp/rss/engadget-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - Impress Watch http://headlines.yahoo.co.jp/rss/impress-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - ITmedia eBook USER http://headlines.yahoo.co.jp/rss/it_ebook-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - ITmedia エンタープライズ http://headlines.yahoo.co.jp/rss/zdn_ep-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - ITmedia ガジェット http://headlines.yahoo.co.jp/rss/it_gadget-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - ITmedia デジカメプラス http://headlines.yahoo.co.jp/rss/it_camera-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - ITmedia ニュース http://headlines.yahoo.co.jp/rss/zdn_n-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - japan.internet.com http://headlines.yahoo.co.jp/rss/inet-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - J-CASTニュース http://headlines.yahoo.co.jp/rss/jct-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - MarkeZine http://headlines.yahoo.co.jp/rss/sh_mar-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - nikkei TRENDYnet http://headlines.yahoo.co.jp/rss/nkbp_tren-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - RBB TODAY http://headlines.yahoo.co.jp/rss/rbb-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - Scan http://headlines.yahoo.co.jp/rss/scan-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - TechCrunch Japan http://headlines.yahoo.co.jp/rss/techcr-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - TechTargetジャパン http://headlines.yahoo.co.jp/rss/zdn_tt-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - ＠IT http://headlines.yahoo.co.jp/rss/zdn_ait-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - サーチナ http://headlines.yahoo.co.jp/rss/scn-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - ねとらぼ http://headlines.yahoo.co.jp/rss/it_nlab-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - ＋D LifeStyle http://headlines.yahoo.co.jp/rss/zdn_lp-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - ＋D Mobile http://headlines.yahoo.co.jp/rss/zdn_m-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - ＋D PC USER http://headlines.yahoo.co.jp/rss/zdn_pc-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - マイナビニュース http://headlines.yahoo.co.jp/rss/mycomj-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - 誠 Biz.ID http://headlines.yahoo.co.jp/rss/zdn_b-c_sci.xml', 
'Yahoo!ニュース - テクノロジー - レスポンス http://headlines.yahoo.co.jp/rss/rps-c_sci.xml', 
'Yahoo!ニュース - スポーツ - http://headlines.yahoo.co.jp/rss/all-c_spo.xml', 
'Yahoo!ニュース - スポーツ - Goal.com http://headlines.yahoo.co.jp/rss/goal-c_spo.xml', 
'Yahoo!ニュース - スポーツ - SOCCER KING http://headlines.yahoo.co.jp/rss/soccerk-c_spo.xml', 
'Yahoo!ニュース - スポーツ - ＠ぴあ http://headlines.yahoo.co.jp/rss/pia-c_spo.xml', 
'Yahoo!ニュース - スポーツ - オートスポーツweb http://headlines.yahoo.co.jp/rss/rcg-c_spo.xml', 
'Yahoo!ニュース - スポーツ - 格闘技ウェブマガジンGBR http://headlines.yahoo.co.jp/rss/gbr-c_spo.xml', 
'Yahoo!ニュース - スポーツ - カナロコ http://headlines.yahoo.co.jp/rss/kana-c_spo.xml', 
'Yahoo!ニュース - スポーツ - グーサイクル http://headlines.yahoo.co.jp/rss/cyc-c_spo.xml', 
'Yahoo!ニュース - スポーツ - ゲキサカ http://headlines.yahoo.co.jp/rss/gekisaka-c_spo.xml', 
'Yahoo!ニュース - スポーツ - ゴルフ情報ALBA.Net http://headlines.yahoo.co.jp/rss/alba-c_spo.xml', 
'Yahoo!ニュース - スポーツ - ゴルフダイジェスト・オンライン http://headlines.yahoo.co.jp/rss/gdo-c_spo.xml', 
'Yahoo!ニュース - スポーツ - サーチナ http://headlines.yahoo.co.jp/rss/scn-c_spo.xml', 
'Yahoo!ニュース - スポーツ - 産経新聞 http://headlines.yahoo.co.jp/rss/san-c_spo.xml', 
'Yahoo!ニュース - スポーツ - サンケイスポーツ http://headlines.yahoo.co.jp/rss/sanspo-c_spo.xml', 
'Yahoo!ニュース - スポーツ - スポーツナビ http://headlines.yahoo.co.jp/rss/spnavi-c_spo.xml', 
'Yahoo!ニュース - スポーツ - テニスナビ http://headlines.yahoo.co.jp/rss/tennisnavi-c_spo.xml', 
'Yahoo!ニュース - スポーツ - 日刊ゲンダイ http://headlines.yahoo.co.jp/rss/nkgendai-c_spo.xml', 
'Yahoo!ニュース - スポーツ - 日刊スポーツ http://headlines.yahoo.co.jp/rss/nksports-c_spo.xml', 
'Yahoo!ニュース - スポーツ - 夕刊フジ http://headlines.yahoo.co.jp/rss/ykf-c_spo.xml', 
'Yahoo!ニュース - スポーツ - レスポンス http://headlines.yahoo.co.jp/rss/rps-c_spo.xml', 
'Yahoo!ニュース - スポーツ - 聯合ニュース http://headlines.yahoo.co.jp/rss/yonh-c_spo.xml', 
'ニッカンスポーツ - 野球 - チーム情報 - 中日ドラゴンズ http://www.nikkansports.com/rss/baseball/professional/dragons.rdf', 
'ニッカンスポーツ - 野球 - チーム情報 - 東京ヤクルトスワローズ http://www.nikkansports.com/rss/baseball/professional/swallows.rdf', 
'ニッカンスポーツ - 野球 - チーム情報 - 読売ジャイアンツ http://www.nikkansports.com/rss/baseball/professional/giants.rdf', 
'ニッカンスポーツ - 野球 - チーム情報 - 阪神タイガース http://www.nikkansports.com/rss/baseball/professional/tigers.rdf', 
'ニッカンスポーツ - 野球 - チーム情報 - 広島東洋カープ http://www.nikkansports.com/rss/baseball/professional/carp.rdf', 
'ニッカンスポーツ - 野球 - チーム情報 - 横浜ＤｅＮＡベイスターズ http://www.nikkansports.com/rss/baseball/professional/baystars.rdf', 
'ニッカンスポーツ - 野球 - チーム情報 - 福岡ソフトバンクホークス http://www.nikkansports.com/rss/baseball/professional/hawks.rdf', 
'ニッカンスポーツ - 野球 - チーム情報 - 北海道日本ハムファイターズ http://www.nikkansports.com/rss/baseball/professional/fighters.rdf', 
'ニッカンスポーツ - 野球 - チーム情報 - 埼玉西武ライオンズ http://www.nikkansports.com/rss/baseball/professional/lions.rdf', 
'ニッカンスポーツ - 野球 - チーム情報 - オリックス・バファローズ http://www.nikkansports.com/rss/baseball/professional/buffaloes.rdf', 
'ニッカンスポーツ - 野球 - チーム情報 - 楽天ゴールデンイーグルス http://www.nikkansports.com/rss/baseball/professional/eagles.rdf', 
'ニッカンスポーツ - 野球 - チーム情報 - 千葉ロッテマリーンズ http://www.nikkansports.com/rss/baseball/professional/marines.rdf'
];
