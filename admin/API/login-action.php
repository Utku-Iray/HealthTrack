<?php
include "../../database/connection.php";


$email = trim(filter_input(INPUT_POST, 'userMailInput'));
$password = trim(filter_input(INPUT_POST, 'userPasswordInput'));


if (
    empty($email) && empty($password)
) {
    $errors['error'] = 'E-posta ve şifre boş bırakılamaz.';
} else {
    if (empty($email)) {
        $errors['error'] = "E-posta adresinizi giriniz.";
    } else {
        $email = trim($email);
    }

    if (empty($password)) {
        $errors['error'] = "Şifrenizi giriniz.";
    } else {
        $password = trim($password);
    }
}


if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {
    $sql = "SELECT * 
            FROM users 
            WHERE user_mail = :userMail 
            AND (user_role = 'admin' OR user_role = 'editor')";

    if ($stmt = $vt->prepare($sql)) {

        $stmt->bindParam(":userMail", $param_usermail, PDO::PARAM_STR);
        $param_usermail = trim($email);

        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                if ($row = $stmt->fetch()) {
                    $id = $row["user_id"];
                    $usermail = $row["user_mail"];
                    $userNameSurname = $row["user_name"];
                    $hashed_password = $row["user_pwd"];
                    if (password_verify($password, $hashed_password)) {
                        // Password is correct, so start a new session
                        session_start();

                        // Store data in session variables
                        setcookie("loginController", "1", time() + 3600 * 24 * 7, "/");
                        setcookie("user_id", $id, time() + 3600 * 24 * 7, "/");
                        setcookie("email", $usermail, time() + 3600 * 24 * 7, "/");
                        setcookie("fullname", $userNameSurname, time() + 3600 * 24 * 7, "/");

                        $form_data['status'] = true;
                        $form_data['successful'] = "Giriş işlemi başarılı. Panele yönlendiriliyorsunuz.";
                    } else {
                        // Display an error message if password is not valid
                        $errors['error'] = "Şifreniz yanlış.";
                        $form_data['status'] = false;
                        $form_data['errors'] = $errors;
                    }
                }
            } else {
                // Display an error message if usermail doesn't exist
                $errors['error'] = "Giriş yetkiniz bulunmamaktadır.";
                $form_data['status'] = false;
                $form_data['errors'] = $errors;
            }
        } else {
            $errors['error'] = "Oops! Birşeyler yanlış gidiyor. Lütfen daha sonra tekrar deneyiniz.";
            $form_data['status'] = false;
            $form_data['errors'] = $errors;
        }

        unset($stmt);
    }
}


echo json_encode($form_data);

unset($vt);
