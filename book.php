<?php
      include("connection.php");

      if(isset($_POST["submit"]))
	{
	  $firstname = $_POST['firstname'];
	  $lastname = $_POST['lastname'];
	  $surname = $_POST['surname'];
	  $email = $_POST['email'];
	  $gender= $_POST['gender'];
      $age = $_POST['age'];
	  $phone = $_POST['phone'];
	  $passport = $_POST['passport'];
	  $from1 = $_POST['from1'];
	  $to1 = $_POST['to1'];
	  $class = $_POST['class'];
	  $date = $_POST['date'];
	  $time = $_POST['time'];
     
	
  
        $query="INSERT INTO book1(firstname, lastname,surname,email,gender,age,phone,passport,from1,to1,class,date,time) VALUES('$firstname', '$lastname','$surname','$email','$gender', '$age' ,'$phone','$passport','$from1','$to1','$class', '$date', '$time')";
		$result = mysqli_query($con,$query);
        if($result)
        {
            echo "<script type='text/javascript'> alert('Successful...')</script>";
            header("location: pay.php");
        }else{
            echo "<script type='text/javascript'> alert('Failed...')</script>";
        }
	  }	
	  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenya Airways</title>
    <link href="style.css" rel="stylesheet" media="screen">   
    <script type="text/javascript" src="validate.js"></script>
	<style>
		/* Reset some default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    display: flex ;
    
    min-height: 100vh;
    background-image: url("img/login.jpg");
    background-size: cover;
    background-repeat: no-repeat;
	margin-left: 50px;

}
.air-main{
    width: 700px;
    background: transparent;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    color: black;
    border-radius: 10px;
    padding: 30px 40px;
}

.air-main h1{
    text-align: center;
	color: aliceblue;
	font-size: 36px;
	font-weight: 800;
}
.air-main h2{
    text-align: center;
	color: black;
	font-weight: 600;
	font-size: 34px;
}
.air-main label{
	font-size: 28px;
}
.air-main input,
.air-main select{
    
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid black;
    border-radius: 40px;
    font-size: 28px;
    color: rgb(32, 34, 36);
    padding: 2px 15px 4px 15px;
}

.air-main input::placeholder{
    color: #081b29;
}
.air-main .btn{
	width: 100%;
  height: 45px;
  background: rgb(253, 213, 159);
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px  rgba(0,0,0, .1);
  cursor: pointer;
  font-size: 16px;
  color: #333;
  font-weight: 600;
}

/* Responsive styles */
@media only screen and (max-width: 768px) {
    .wrapper {
        width: 100%;
    }
}

	</style>
</head>
<body>
      <section id="content_area">
        <div class="xyz">
            <form>
                <div class="air-main">
                    <h1>Personal Info</h1><br><br>
                    <label>First Name: </label>
					<input type="text" name="firstname" required><br><br>
                    <label>Last Name:</label>
					<input type="text" name="lastname" required><br><br>
                    <label>Surname:</label>
					<input type="text" name="surname"><br><br>
                    <label>Email Address: </label>
					<input type="text" name="email" required><br><br>
                    <label>Gender: </label>
					<input type="radio" name="gender" value="male" >
					<label for=""> Male</label>
                        <input type="radio" name="gender" value="female"> 
						<label for="">Female</label><br><br>
                    <label>Age:  </label>
					<input type="radio" name="age" value="under_18" > 
					<label>Under 18</label>
                        <input type="radio" name="age" value="over_18"><label> Over 18</label>
                   <br><br>
                    
                    <label>Phone Number:</label>
					<input type="tel" name="phone" required><br><br>
                    <label>Passport Number:</label>
					<input type="text" name="passport" required><br><br>
               <hr>
                    <h2>Flight Info</h2>
                    <label>Departure: </label>
					<select name="from1">
                        <option value="">Source</option>
                        <option value="BLR">Bengaluru, India (BLR)</option>
                        <option value="BOM">Mumbai, India (BOM)</option>
                        <option value="DEL">New Delhi, India (DEL)</option>
                        <option value="HYD">Hyderabad, India (HYD)</option>
                        <option value="MAA">Chennai, India (MAA)</option>
                        <option value="PNQ">Pune, India (PNQ)</option>
                    </select>
                   <br><br>
                    <label>Destination: </label>
					<select name="to1">
                        <option value="">Destination</option>
                        <option value="BLR">Bengaluru, India (BLR)</option>
                        <option value="BOM">Mumbai, India (BOM)</option>
                        <option value="DEL">New Delhi, India (DEL)</option>
                        <option value="HYD">Hyderabad, India (HYD)</option>
                        <option value="MAA">Chennai, India (MAA)</option>
                        <option value="PNQ">Pune, India (PNQ)</option>
                    </select><br><br>
                    <label>Class: 
                        <input type="radio" name="class" value="economy"> 
						<label for="">Economy</label>
                        <input type="radio" name="class" value="business"> 
						<label for="">Bussiness</label>
						<input type="radio" name="class" value="first"> 
						<label for="">First Class</label>
                    </label><br><br>
                    <label>Date of Travel: <input type="date" name="date"></label><br><br>
                    <label>Time of Travel: <input type="time" name="time"></label><br><br>
                    <input type="submit" class="btn" name="submit" value="Book Now">
                </div>
            </form>
        </div>
    </section>
    
    
</body>
</html>
