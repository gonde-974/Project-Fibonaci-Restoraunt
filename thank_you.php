<?php
require_once 'bootstrap.php';

if(isset($_POST['reservationBtn'])){
    // var_dump('Reservation');
    $customer->reservationCustomer();
}

?>

<?php

// Проверка дали постои активна резервација
if (isset($_SESSION['reservation'])) {
    $reservation = $_SESSION['reservation'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['confirm'])) {
            // Потврда на резервацијата
            $message = "<div class='alert alert-success text-center mt-4'>Вашата резервација е успешно потврдена! Наскоро ќе бидете известени за детали!</div>";
            unset($_SESSION['reservation']); 
        } elseif (isset($_POST['cancel'])) {
            // Откажување на резервацијата
            $message = "<div class='alert alert-warning text-center mt-4'>Вашата резервација е откажана.</div>";
            unset($_SESSION['reservation']); 
        }
    }
?>
    <!DOCTYPE html>
    <html lang="mk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Резервација</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                background-color: #C7A87D;
                font-family: 'Arial', sans-serif;                
                background-size: contain;
                background-position: center;
                color: #fff; /* Боја на текстот */
                
                height:100%;
                
            }
            .table-container {
                background: rgba(255, 255, 255, 0.8); /* Светлосен ефект на позадината */
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin-top: 20px;
            }
            .btn-custom {
                padding: 10px 20px;
                font-size: 16px;
                background-color: #6c757d;
                width: 150px;
                transition: background-color 0.3s ease;
                color:#fff;
            }

            .btn-custom-otkazi {
                padding: 10px 20px;
                font-size: 16px;              
                background-color: #6c757d;
                width: 150px;
                transition: background-color 0.3s ease;
                color:#fff;
            }
            .btn-custom:hover {
                background-color: #5cb85c;
            } 
            
            .btn-custom-otkazi:hover {
                background-color: #5cb85c;
            }
            .btn-return {
                width: 320px;
                background-color: #6c757d;
                border-color: #6c757d;
            }
            .btn-return:hover {
                background-color: #5a6268;
            }
            .btn-container {
                margin-top: 20px;
            }
            .header-text {
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
                color: #fff;
            }
            .message {
                margin-top: 30px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="text-center mb-4">
                <h2 class="header-text font-weight-bold">Детали за вашата резервација</h2>
                <p class="header-text">Проверете ги деталите и потврдете или откажете ја резервацијата.</p>
            </div>
            <?php if (isset($message)) echo $message; ?>
            <div class="table-container mx-auto">
                <table class="table table-bordered table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Име</th>
                            <th>Е-пошта</th>
                            <th>Телефон</th>
                            <th>Датум</th>
                            <th>Време</th>
                            <th>Број на лица</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars($reservation['name']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['email']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['phone']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['book_date']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['book_time']); ?></td>
                            <td><?php echo htmlspecialchars($reservation['person']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form action="reservation_action.php" method="POST" class="text-center mt-4">
                <button type="submit" name="confirm" class="btn btn-custom mr-3">Потврди</button>
                <button type="submit" name="cancel" class="btn  btn-custom-otkazi">Откажи</button>            
            </form>
            <div class="btn-container text-center">
                <a href="index.html" class="btn btn-return btn-custom">Врати се на Почетната страница</a>
            </div>
        </div>
    </body>
    </html>
<?php
} else {
    echo "<div class='container mt-5'><h4 class='text-center text-danger'>Нема активна резервација!</h4></div>";
}
?>
