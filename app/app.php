<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/adress_book.php";

    session_start();
    if(empty($_SESSION['contact_list'])) {
        $_SESSION['contact_list'] = array();
        $ophelie = new Contact("Ophelie Wilmotte", 971-133-4354, "Rue du Vigneron 109 - 6000 Ransart - Belgium");
        $vanessa = new Contact("Vanessa Trubiano", 503-554-8394, "Rue Bois du Sart 40B - 6180 Courcelles - Belgium");
        $valentina = new Contact("Valentina Olaru", 503-447-0081, "Rue Bois du Sart 40B - 6180 Courcelles - Belgium");
        $pascal = new Contact("Pascal Trubiano", 971-390-7373, "Rue Bois du Sart 40B - 6180 Courcelles - Belgium");
        $astrid = new Contact("Vanessa Trubiano", 503-468-2200, "Rue Nestor Falise 13 - 6180 Courcelles - Belgium");

        $contact_data = array($ophelie, $vanessa, $valentina, $pascal, $astrid);
        $contact_data->save();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('contact_form.php', array('contacts' => Contact::getAll()));
    });

    $app->post("/create_contact", function() use ($app) {

        $contact = new Contact($_POST['name'], $_POST['phone_number'], $_POST['adress']);
        $contact->save();

        return $app['twig']->render('create_contact.php', array('newcontact' => $contact));

    });

    $app->get("/result_page", function() use ($app) {

         foreach ($_SESSION['contact_list'] as $a_contact) {
            if ($a_contact->getName() == $_GET['name']) {
                array_push($matching_contact, $a_contact);
            }
        }
        return $app['twig']->render('result_page.php', array('matching_contact' => $matching_contact));

    });

    $app->post("/delete_contact", function() use ($app) {

        Car::deleteAll();
        return $app['twig']->render('delete_contact.php');

    });

    return $app;
?>
