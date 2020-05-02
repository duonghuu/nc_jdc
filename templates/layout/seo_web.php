<meta charset="UTF-8">
<link id="favicon" rel="shortcut icon" href="<?=_upload_hinhanh_l.$favicon['thumb_'.$lang]?>" type="image/x-icon"/>
<title><?php if($title_bar!='') echo $title_bar; else echo $row_setting['title']; ?></title>
<meta name="description" content="<?php if($description_bar!='') echo $description_bar; else echo $row_setting['description']; ?>">
<meta name="keywords" content="<?php if($keywords_bar!='') echo $keywords_bar; else echo $row_setting['keywords']; ?>">
<meta name="robots" content="noodp,index,follow"/>
<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/">
<meta name="DC.title" content="<?php if($title_bar!='') echo $title_bar; else echo $row_setting["title"]; ?>">
<meta name="DC.identifier" content="<?=getCurrentPageURL()?>">
<meta name="DC.description" content="<?=$row_setting['description']?>">
<meta name="DC.subject" content="<?=$row_setting["keywords"]?>">
<meta name="DC.language" content="vi">
<meta name="geo.region" content="VN"/>
<meta name="geo.placename" content="<?=$row_setting["diachi_".$lang]?>"/>
<meta name="geo.position" content="<?=$row_setting["toado"]?>"/>
<meta name="ICBM" content="<?=$row_setting["toado"]?>"/>
<link rel="canonical" href="<?=getCurrentPageURL_CANO()?>"/>
<link href='//maxcdn.bootstrapcdn.com' rel='dns-prefetch'/>
<link href='//fonts.googleapis.com' rel='dns-prefetch'/>
<link href='//maps.googleapis.com' rel='dns-prefetch'/>
<link href='//maps.gstatic.com/' rel='dns-prefetch'/>
<link href='//www.facebook.com' rel='dns-prefetch'/>
<link href='//plus.google.com' rel='dns-prefetch'/>
<link href='//csi.gstatic.com' rel='dns-prefetch'/>
<link href='//www.youtube.com' rel='dns-prefetch'/>
<link href='//feedburner.google.com' rel='dns-prefetch'/>
<link href='//scontent.fsgn3-1.fna.fbcdn.net' rel='dns-prefetch'/>
<link href='//googleads.g.doubleclick.net' rel='dns-prefetch'/>
<link href='//static.doubleclick.net' rel='dns-prefetch'/>
<link href='//apis.google.com' rel='dns-prefetch'/>
<link href='//maps.google.com' rel='dns-prefetch'/>
<link href='//connect.facebook.net' rel='dns-prefetch'/>
<link href="//www.google-analytics.com" rel="dns-prefetch"/>
<link href="//www.googletagmanager.com/" rel="dns-prefetch" />