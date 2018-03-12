<?php 

function escape_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$fields = array('yournames', 'email', 'message');
foreach($fields as $field) {
  $$field = '';
}

$errors = array(); //грешки, които се показват на потребителя.
$bad_fields = array(); //грешни полета
$system_msg = array(); // просто съобщения

if (isset($_POST['contact_submit'])) {
    
    // Създавам променливи с имената на полетата и им задавам _post резултатите почистени от гадни знаци.
    foreach($fields as $field) {
      $$field = escape_data( $_POST["$field"] );
    }  

    $required_fields = array('yournames', 'email', 'message');
    foreach($required_fields as $fieldname) {
      if (empty($_POST[$fieldname])) { 
        $bad_fields[] = $fieldname;
        //задава текст за грешка за всяко име на поле
        switch ($fieldname) { 
          case "yournames":
            $errors['yournames'] = 'Моля въведете вашето име! ';
            break;
          case "email":
            $errors['email'] = 'Моля въведете валиден имейл адрес! ';
            break;
          case "message":
            $errors['message'] = 'Въведете съобщение ';
            break;
        }

        }
      }

      if(empty($errors)){

        $to      = 'mitko4771@gmail.com';
        $subject = $yournames . ' ти пише от сайта';
        $body = 'Име: ' . $yournames . "\r\n" .
                   'Имейл: ' . $email . "\r\n" .
                   'Съобщение ' . $message ;
        $headers = 'From: webform@mitkocv.com' . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $body, $headers);

        //inform the user
        $system_msg[] = 'Вашето съобщение е изпратено!';
        //reset fields
        foreach($fields as $field) {
          $$field = '';
        }  
      }
}