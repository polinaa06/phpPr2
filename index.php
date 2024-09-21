<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pr2</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="form">
        <div class="title">
            <h2>Регистрация</h2>
        </div>

        <?php
        if (isset($_POST['reg'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];



            $userInfo = ['name' => "$name", 'email' => "$email", 'phone' => "$phone"];

            $result = validateForm($userInfo);


        }


        function validateForm($userInfo)
        {
            $errors = [
                '<p class="error">Заполните поле ввода</p>',
                '<p class="error">Имя должно состоять от 3 символов</p>',
                '<p class="error">Слишком короткое значение почты</p>',
                '<p class="error">Неправильный формат почты</p>',
                '<p class="error">Телефон должен состоять из 11 цифр</p>',
            ];

            if (empty($userInfo['name'])) {
                echo $errors[0];
            } elseif (strlen($userInfo['name']) < 3) {
                echo $errors[1];
            }

            if (empty($userInfo['email'])) {
                echo $errors[0];
            } elseif (strlen($userInfo['email']) < 7) {
                echo $errors[2];
            } elseif (!filter_var($userInfo['email'], FILTER_VALIDATE_EMAIL)) {
                echo $errors[3];
            }

            if (empty($userInfo['phone'])) {
                echo $errors[0];
            } elseif (strlen($userInfo['phone']) != 11) {
                echo $errors[4];
            }

            if (!empty($errors)) {
                return ['success' => false, 'errors' => $errors];
            }

            return ['success' => true];

            if (!$result['success']) {
        
                foreach ($result['errors'] as $error) {
                    echo $error . '<br>';
                }
            } 
        }

        ?>

        <form name="reg" method="POST">
            <div class="form-input">
                <label for="name" id="labelName">Введите имя*</label>
                <input type="text" name="name" placeholder="Имя">
            </div>

            <div class="form-input">
                <label for="email" id="labelEmail">Введите email*</label>
                <input type="text" name="email" placeholder="Email">
            </div>

            <div class="form-input">
                <label for="phone" id="labelPhone">Введите номер телефона*</label>
                <input type="text" name="phone" placeholder="Номер телефона">
            </div>

            <input type="submit" class="btn" name="reg" value="Отправить">
        </form>
    </div>

</body>

</html>