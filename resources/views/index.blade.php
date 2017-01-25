<!DOCTYPE html>
<html>
<head>
	<title>GuestBook</title>
</head>
<style type="text/css">
	.headings{
		font-size: 1.3em;
	}
	h3{
		width: 15%;
		margin: 0 auto;
		margin-top: 5%;
		margin-bottom: 5%;

	}
	#main{
		display: flex;
		flex-direction: row;
		justify-content: space-around;
	}
	#form{
		flex: 1.4;
		margin-left: 15%;
	}
	#data{
		flex: 1;
	}
	form input{
		display: block;
		margin-top: 10%;
		margin-bottom: 10%;
	}
	input[type='text']{
		width: 230px;
		height: 20px;
	}
	input[type='submit']{
		width: 80px;
		height: 40px;
		margin-bottom: 0;
		margin-top: 5%;
	}
	#recent{
		overflow: auto;
		height: 65%;
		width: 50%;
		border-bottom: 2px solid black;
	}
	p{
		line-height: 30px;
	}
</style>
<body>
	<h3>User's Guest Book</h3>

	<div id="main">
		<div id="form">
			<h4 class="headings">Drop us a note</h4>

			<form action="/post" method="get" id="mainform">
				<input type="text" name="name" placeholder="Your Name" required>
				<textarea rows="10" cols="30" placeholder="Your Message" name="comment" required></textarea>
				<input type="submit" name="submit" value="Send">
			</form>
		</div>

		<div id="data">
			<h4 class="headings">Recent Entries</h4>

			@if($data)
			<div id="recent">
				@foreach($data as $entries)
				<p>{{ $entries->name }} <br> {{ $entries->comment }}</p>
				@endforeach
			</div>
			@else
			<div id="recent"></div>
			@endif
		</div>
	</div>
</body>
</html>