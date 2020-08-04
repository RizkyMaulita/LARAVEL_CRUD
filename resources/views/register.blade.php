<!DOCTYPE html>
<html>
<head>
	<<meta charset="utf-8">
	<!-- <title>SanberBook</title> -->
	<!-- <link rel="stylesheet" href="css/mystyle.css"></link> -->
</head>
<body>
	<H2> Buat Account Baru! </H2>
	<H3> Sign Up Form </H3>
    <form action="/welcome2" method="POST">
        @csrf
		<label for="First_Name"> First Name: </label><br> <br>
		<input type="text" id="firstname" name="firstname" required=""> <br> <br>
		<label for="Last_Name"> Last Name: </label> <br> <br>
		<input type="text" id="lastname" name="lastname" required="">

		<!-- GENDER -->
		<p> Gender: </p>
		<input type="radio" name="Gender" value="Male" required="">
		<label for="Male"> Male </label> <br>
		<input type="radio" name="Gender" value="Female" required="">
		<label for="Female"> Female </label> <br>
		<input type="radio" name="Gender" value="Other" required="">
		<label for="Other"> Other </label>
		
		<!-- NATIONALITY  -->
		<p> Nationality: </p>
		<select name = "Nationality" id="nationality" >
			<option value="Indonesian"> Indonesian </option>
			<option value="Singaporean"> Singaporean </option>
			<option value="Malaysian"> Malaysian </option>
			<option value="Australian"> Australian </option>
		</select>

		<!-- LANGUAGE -->
		<p> LANGUAGE </p>
		<input type="checkbox" name="Language1" id="Language1">
		<label for="Language1"> Bahasa Indonesia </label><br>
		<input type="checkbox" name="Language2" id="Language2">
		<label for="Language2"> English </label> <br>
		<input type="checkbox" name="Language3" id="Language3">
		<label for="Language3"> Other </label>

		<!-- BIO -->
		<p> Bio </p>
		<textarea name="biodata" id="bio" cols="30" rows="20" ></textarea> 

		<br>

		<!-- SUBMIT BUTTON -->
		<!-- <input type="submit" name="submit" value="Sign Up"> -->

 		<button type="submit"> Sign Up </button>
	</form>