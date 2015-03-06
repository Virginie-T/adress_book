<html>
<head>
    <title>New Contact</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>You created a new contact !</h1>
        <p>Name : {{ newcontact.getYear }}</p>
        <p>Phone Number : {{ newcontact.getMakeModel }}</p>
        <p>Adress : {{ newcontact.getPrice }}</p>
        <p><a href="/">Home</a></p>
    </div>
</body>
</html>
