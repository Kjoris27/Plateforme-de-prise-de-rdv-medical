<!DOCTYPE html>
<html>
<head>
    <title>Consultation Ticket</title>
</head>
<body>
    <h1>Consultation Ticket</h1>
    <p>Patient Name: {{ $patient->firstname }} {{ $patient->lastname }}</p>
    <p>Age: {{ $patient->age }} ans</p>
    <p>Consultation Code: {{ $patient->consultation_code }}</p>



    <p>-------------------------------------------------</p>
    <p>This ticket is for consultation purposes only.</p>
</body>
</html>
