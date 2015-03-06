<?php
	class Contact {

		private $name;
		private $phone_number;
		private $adress;

		function __construct($name, $phone_number, $adress) {

            $this->name = $name;
            $this->phone_number = $phone_number;
            $this->adress = $adress;
          
        }

		function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function setPone_number($new_phone_number)
        {
            $float_phone_number = (float) $new_phone_number;
        if ($float_phone_number != 0) {
            $formatted_phone_number = number_format($float_phone_number, 0);
            $this->phone_number = $formatted_phone_number;
        }

        function setAdress($new_adress)
        {
        	$this->adress = (string) $new_adress;
        }

        function getName()
        {
        	return $this->name;
        }

        function getPhone_number()
        {
        	return $this->phone_number;
        }

        function getAdress()
        {
        	return $this->adress;
        }

		function save()
        {
            array_push($_SESSION['contact_list'], $this);
        }

        static function getAll()
        {
            return $_SESSION['contact_list'];
        }

        static function deleteAll()
        {
            $_SESSION['contact_list'] = array();
        }

	}

?>