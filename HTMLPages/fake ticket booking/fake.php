<?php include '../Globalheader/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <link rel="stylesheet" href="fake.css">
</head>
<body>
	<div class="container">
		<h2>Book a Flight</h2>
		<form>

			<div class="form-group">
				<label for="from-country" class="label">From Country:</label>
				<select id="from-country" class="input-field">
					<option value="Nepal">Nepal</option>
					<option value="Singapore">Singapore</option>
					<option value="UK">UK</option>
                    <option value="Switzerland">Switzerland</option>
					<option value="Spain">Spain</option>
					<option value="Dubai">Dubai</option>
                    <option value="Egypt">Egypt</option>
					<option value="Indonesia">Indonesia</option>
					
					<!-- Add more options here -->
				</select>
			</div>
			<div class="form-group">
				<label for="to-country" class="label">To Country:</label>
				<select id="to-country" class="input-field">
					<option value="Singapore">Singapore</option>
					<option value="Nepal">Nepal</option>
					<option value="UK">UK</option>
                    <option value="Switzerland">Switzerland</option>
					<option value="Spain">Spain</option>
					<option value="Dubai">Dubai</option>
                    <option value="Egypt">Egypt</option>
					<option value="Indonesia">Indonesia</option>
					<!-- Add more options here -->
				</select>
			</div>
			<div class="form-group">
				<label for="departure-date" class="label">Departure Date:</label>
				<input type="date" id="departure-date" class="input-field">
			</div>
			
			<div class="form-group">
				<label for="ticket-type" class="label">Ticket Type:</label>
				<select id="ticket-type" class="input-field">
					<option value="Economy">Economy</option>
					<option value="Premium Economy">Premium Economy</option>
					<option value="Business">Business</option>
					<!-- Add more options here -->
				</select>
			</div>
			<div class="form-group">
				<p class="ticket-price">$800</p>
				<button class="button">Book Now</button>
			</div>
          
		</form>
	</div>
</body>

</html>
