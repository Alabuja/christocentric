<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p><strong>SONG SUBMITTED BY: </strong>{!!$sendItems['fullname']!!}</p>
	<p><strong>EMAIL ADDRESS: </strong>{!!$sendItems['email'] or ''!!}</p>
	<p><strong>PHONE NUMBER: </strong>{!!$sendItems['phone_number'] or ''!!}</p>
	<p><strong>TWITTER HANDLE: </strong>{!!$sendItems['twitter_name'] or ''!!}</p>
	<p><strong>FACEBOOK HANDLE: </strong>{!!$sendItems['facebook_name'] or ''!!}</p>
	<p><strong>SONG TITLE: </strong>{!!$sendItems['song_title'] !!}</p>
	<p><strong>ARTISTE NAME: </strong>{!!$sendItems['artiste_name'] !!}</p>
	<p><strong>DOWNLOAD LINK : </strong>{!!$sendItems['download_link'] !!}</p>
	<p><strong>LYRICS</strong>{!!$sendItems['lyrics'] or ''!!}</p>

</body>
</html>