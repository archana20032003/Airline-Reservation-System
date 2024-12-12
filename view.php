<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ticket</title>
   <style>
   body {
    font-family: Arial, sans-serif;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

h2 {
    
    text-align: center;

}

.container .ticket {
    max-width: 1000px;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    border: 10px solid blue;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.ticket p {
    margin-bottom: 10px;
}

.ticket p strong {
    font-weight: bold;
}

/* Add space between Departure and Destination */
.ticket p:nth-child(1) strong:last-child {
    margin-left: 240px;
}
.ticket p:nth-child(4) strong:last-child {
    margin-left: 150px;
}



   </style>
</head>
<body>
    <div class="container">
        <h2>View Ticket</h2>
        <?php
            // Assume $ticketData is retrieved from the database
            $ticketData = array(
                'ticket_number' => 'T123456',
                'passenger_name' => 'John Doe',
                'departure' => 'Nairobi',
                'destination' => 'New York',
                'departure_date' => '2024-03-15',
                'departure_time' => '08:00 AM',
                'class' => 'Economy'
            );
        ?>
        <div class="ticket">
        <p><strong>Departure:</strong> <?php echo $ticketData['departure']; ?><strong>Destination:</strong> <?php echo $ticketData['destination']; ?></p>
            <p><strong>Ticket Number:</strong> <?php echo $ticketData['ticket_number']; ?></p>
            <p><strong>Passenger Name:</strong> <?php echo $ticketData['passenger_name']; ?></p>
           
            <p><strong>Departure Date:</strong> <?php echo $ticketData['departure_date']; ?> <strong>Departure Time:</strong> <?php echo $ticketData['departure_time']; ?></p>
            <p><strong>Class:</strong> <?php echo $ticketData['class']; ?></p>
        </div>
    </div>
</body>
</html>
