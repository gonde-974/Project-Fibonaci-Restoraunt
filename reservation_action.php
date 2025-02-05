
<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Резервација</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            background-image: url('https://media.istockphoto.com/id/1350543097/photo/top-view-of-white-calendar-and-sharpen-brown-pencil-on-green-background-schedule-timeline.jpg?s=612x612&w=0&k=20&c=3fUZ7lsa_g4fa3zFvt-i_g8fS0XdIGaFP08aH__n36g=');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
        }
        .custom-container {
            background: rgba(0, 0, 0, 0.8);
            /* border-radius: 10px; */
            padding: 30px ;            
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 500px;
            margin-top: 200px;
            color: #E22DA2;
       
        }
      
        .btn-custom {
            padding: 10px 20px;
            font-size: 16px;
            /* border-radius: 25px; */
            width: 180px;
            margin: 10px;
            background-color: #C9AA7E;
        }
    </style>
</head>
<body>
    
  <nav class="custom-navbar">
    <div class="container">
      <a href="index.html" class="navbar-brand">Fibonaci</a>
      <div class="navbar-toggler" id="navbar-toggler">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <ul class="navbar-links">
        <li><a href="./index.html" class="nav-link">Home</a></li>
        <li><a href="./about.html" class="nav-link">About</a></li>
        <li><a href="./menu.html" class="nav-link">Menu</a></li>
        <li><a href="./blog.html" class="nav-link">Stories</a></li>
        <li><a href="./contact.html" class="nav-link">Contact</a></li>
        <li><a href="./reservation.html" class="cta nav-link">Book a table</a></li>
      </ul>
    </div>
  </nav>
    <div class="container">
        <div class="custom-container">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['confirm'])) {
                    echo "<div class='alert alert-success text-center'>Вашата резервација е успешно потврдена!</div>";
                    echo "<div class='alert alert-success text-center'>Наскоро ќе бидете известени за детали!</div>";
                    // Можете да зачувате статус во база ако е потребно
                    unset($_SESSION['reservation']);
                } elseif (isset($_POST['cancel'])) {
                    echo "<div class='alert alert-warning text-center'>Вашата резервација е откажана.</div>";
                    // Можете да ажурирате статус во база ако е потребно
                    unset($_SESSION['reservation']);
                }
            }
            ?>
            <div class="text-center">
                <form method="POST">                    
                    <a href="index.html" class="btn btn-primary btn-custom">Назад</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
