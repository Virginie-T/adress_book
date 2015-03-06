<html>
<head>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
    <title>Contact Book</title>
</head>
<body>
    <div class='container'>

        <h1>Add a new contact :</h1>
        <form action='/create_contact' method='post'>
            <div class='form-group'>
                <label for='name'>Name :</label>
                <input id="name" name="name" type="text" class='form-control'>
            </div>
            <div class='form-group'>
                <label for='phone_number'>Phone Number :</label>
                <input id="phone_number" name="phone_number" type="number" class='form-control'>
            </div>
            <div class='form-group'>
                <label for='adress'>Adress :</label>
                <input id="adress" name="adress" type="text" class='form-control'>
            </div>
            
            <button type='submit' class='btn btn-success'>Submit</button>
        </form>

    </div>

     <h1> Search for a contact :</h1>
        <form action='/result_page'>
            <div class='form-group'>
                <label for='name'>Enter Name :</label>
                <input id='name' name='name' class='form-control' type='text'>
            </div>
            <button type='submit' class='btn btn-success'>Submit</button>
        </form>

    <form action="/delete_contact" method="post">
            <div class='form-group'>
                <button class="btn btn-danger" type="submit">Delete All</button>
            </div>
    </form>

    <div class='container2'>
  {% if contacts is not empty  %}
        <h2>Contact List :</h2>
        <ul>
            {% for contact in contacts %}
                <li>Name : {{ contact.getName }}</li>
                <li>Phone Number : {{ contact.getPhone_number}}</li>
                <li>Adress : {{ contact.phone_numberdress}}</li> 
            {% endfor %}
        </ul>
        {% endif %}
    </div>

