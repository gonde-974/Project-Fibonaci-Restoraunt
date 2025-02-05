<?php
session_start();
class Customer extends QueryBuilder {

public function reservationCustomer(){
    // var_dump("Methoda rezervation");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reservationBtn'])) {
    // Податоци од формуларот
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $book_date = $_POST['book_date'];
    $book_time = $_POST['book_time'];
    $person = $_POST['person'];

    // Валидација (доколку е потребно)
    if (empty($name) || empty($email) || empty($phone) || empty($book_date) || empty($book_time) || empty($person)) {
        die("Сите полиња се задолжителни!");
    }

    try {
      

        // SQL изјава за внесување резервација
        $sql = "INSERT INTO reservations (name, email, phone, reservation_date, reservation_time, person_count) 
                VALUES (:name, :email, :phone, :reservation_date, :reservation_time, :person_count)";

        $stmt = $this->db->prepare($sql);

        // Извршување на изјавата со податоци
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':reservation_date' => $book_date,
            ':reservation_time' => $book_time,
            ':person_count' => $person
        ]);

        // Чување податоци во сесијата
        $_SESSION['reservation'] = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'book_date' => $book_date,
            'book_time' => $book_time,
            'person' => $person
        ];

        
    } catch (PDOException $e) {
        echo "<div class='alert alert-success'><h4>Грешка при внесување на резервацијата</div>; " . $e->getMessage();
    }
}



}
    }


?>
