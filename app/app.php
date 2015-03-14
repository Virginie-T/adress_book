<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    session_start();
    if(empty($_SESSION['contacts_list'])) {
        $_SESSION['contacts_list'] = array();
        $ophelie = new Contact("Ophelie Wilmotte", 9711334354, "Rue du Vigneron 109 - 6000 Ransart - Belgium");
        $vanessa = new Contact("Vanessa Trubiano", 5035548394, "Rue Bois du Sart 40B - 6180 Courcelles - Belgium");
        $valentina = new Contact("Valentina Olaru", 5034470081, "Rue Bois du Sart 40B - 6180 Courcelles - Belgium");
        $pascal = new Contact("Pascal Trubiano", 9713907373, "Rue Bois du Sart 40B - 6180 Courcelles - Belgium");
        $astrid = new Contact("Astrid Verdois", 5034682200, "Rue Nestor Falise 13 - 6180 Courcelles - Belgium");

        $contacts_data = array($ophelie, $vanessa, $valentina, $pascal, $astrid);
        foreach ($contacts_data as $contact) {
            $contact->save(); 
        }
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('contact_form.twig', array('contacts' => Contact::getAll()));
    });

    $app->post("/create_contact", function() use ($app) {

        $contact = new Contact($_POST['name'], $_POST['phone_number'], $_POST['adress']);
        $contact->save();

        return $app['twig']->render('create_contact.twig', array('newcontact' => $contact));

    });

    $app->post("/result_page", function() use ($app) {

        $array_contacts_list = array($_SESSION['contacts_list']);

         foreach ($array_contacts_list as $a_contact) {
            if ($a_contact->getName() == $_GET['name']) {
                array_push($matching_contact, $a_contact);
            }
        }
        return $app['twig']->render('result_page.twig', array('matching_contact' => $matching_contact));

    });

    $app->post("/delete_contact", function() use ($app) {

        Contact::deleteAll();
        return $app['twig']->render('delete_contact.twig');

    });

    return $app;
?>
