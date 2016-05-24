
@foreach ($email as $post)
<!--{{$post->business}}
</br></br>
You have had {{$post->items}} item(s) delivered today and are awaiting collection.
</br></br>
Thank You</br>
Office Flex
</br></br>-->

@endforeach


<head>
<!-- If you delete this tag, the sky will fall on your head -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Office Flex Mailbox</title>
	
<link rel="stylesheet" type="text/css" href="public/css/email.css" />

</head>
 
<body bgcolor="#FFFFFF">

<!-- HEADER -->
<table class="head-wrap" bgcolor="#999999">
	<tr>
		<td></td>
		<td class="header container">
			
				<div class="content">
					<table bgcolor="#fff">
					<tr>
						<td><img src="{{ $message->embed('/images/officeflexlogo.png')}}"></td>
						<!--<td align="right"><h6 class="collapse">Hero</h6></td>-->
					</tr>
				</table>
				</div>
				
		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->


<!-- BODY -->
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

			<div class="content">
			<table>
				<tr>
					<td>
						
						<h3>You have mail, {{$post->business}}</h3>
						
						
						<!-- A Real Hero (and a real human being) -->
						<p><img src="public/images/IMG_2568.jpg"></p><!-- /hero -->
						
						<!-- Callout Panel -->
						<p class="callout">
							You have had {{$post->items}} item(s) delivered today and are awaiting collection.
						</p><!-- /Callout Panel -->
						
						<h4>Thank you from Office Flex</h4>
						<!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<a class="btn">Click Me!</a>-->
												
						<br/>
						<br/>							
												
						<!-- social & contact -->
						<table class="social" width="100%">
							<tr>
								<td>
									
									<!--- column 1 -->
									<table align="left" class="column">
										<tr>
											<td>				
												
												<h5 class="">Connect with Us:</h5>
												<p class=""><a href="#" class="soc-btn fb">Facebook</a> <a href="#" class="soc-btn tw">Twitter</a> <a href="#" class="soc-btn gp">Google+</a></p>
						
												
											</td>
										</tr>
									</table><!-- /column 1 -->	
									
									<!--- column 2 -->
									<table align="left" class="column">
										<tr>Message sent at {{$post->created_at}}
											<td>				
																			
												<h5 class="">Contact Info:</h5>												
												<p>Phone: <strong>01243 929122</strong><br/>
                Email: <strong><a href="mailto:info@officeflexuk.com">info@officeflexuk.com</a></strong></p>
                
											</td>
										</tr>
									</table><!-- /column 2 -->
									
									<span class="clear"></span>	
									
								</td>
							</tr>
						</table><!-- /social & contact -->
					
					
					</td>
				</tr>
			</table>
			</div>
									
		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">
			
				<!-- content -->
				<!--<div class="content">
				<table>
				<tr>
					<td align="center">
						<p>
							<a href="#">Terms</a> |
							<a href="#">Privacy</a> |
							<a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>
						</p>
					</td>
				</tr>
			</table>
				</div><!-- /content -->
				
		</td>
		<td></td>
	</tr>
</table><!-- /FOOTER -->

</body>
</html>