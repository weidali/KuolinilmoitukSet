<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
	<style type="text/css">
		
	</style>
	
	<table style="border: 1px solid grey;margin: 0px auto;" cellspacing="0" cellpadding="0" >
		<tbody>
			<tr>
				<td>
					<!-- START HEADER TABLE -->
					<table align="center" cellspacing="0" cellpadding="0" style="">
						<tbody>
							<tr>
								<td height="40" colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td border="1" width="10%">&nbsp;</td>
								<td width="80%" height="" valign="top" align="center">
									<!-- START TEXTS -->
									<img src="img/symbols/1001.png" alt="">
									<p style="color:#6c2a0e;font-size:24px;font-style:normal;font-family:Georgia;padding:0;margin:0;line-height:35px;">
										{{ $order->obituary_firstname_1 }} {{ $order->obituary_firstname_2 }} {{ $order->obituary_firstname_3 }}
									</p>
									<p style="color:#6c2a0e;font-size:32px;font-style:normal;font-family:Georgia;padding:0;margin:0;line-height:35px;">{{ $order->obituary_lastname }}</p>
									<p></p>
									<p style="color:#6c2a0e;font-size:17px;font-style:normal;font-family:Georgia;padding:0;margin:0;line-height:35px;">
										s. {{ date('d-m-Y', strtotime($order->obituary_birth_date)) }} {{ $order->obituary_birth_place }}<br>
										k. {{ date('d-m-Y', strtotime($order->obituary_date_of_death)) }} {{ $order->obituary_place_of_death }}<br>
									</p>
									<p style="color:#6c2a0e;font-size:20px;font-style:normal;font-family:Georgia;padding:10px 0 0 0;margin:0;line-height:35px;">Happy Holidays !</p>
									<!-- END TEXTS -->
								</td>
								<td width="10%">&nbsp;</td>
							</tr>
							<tr>
								<td height="75" colspan="3">&nbsp;</td>
							</tr>
							
						</tbody>
					</table>
					<!-- END CONTENT TABLE -->
				</td>
			</tr>
		</tbody>
	</table>
	<!-- END BACKGROUND TABLE -->
</body>
</html>