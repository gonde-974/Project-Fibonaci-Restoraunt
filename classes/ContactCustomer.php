<?php 

class Contact extends QueryBuilder{
    public function contactCustomer(){
        // var_dump('Podatoci od methoda vo class Contact');  
        
        
        
        try {
           
        
            // Проверка дали е испратен формуларот
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sendMessageBtn'])) {
                // Примање на податоците од формуларот
                $contactName = $_POST['contact-name'];
                $contactEmail = $_POST['contact-email'];
                $contactSubject = $_POST['contact-subject'];
                $contactMessage = $_POST['contact-message'];
        
                // Проверка дали задолжителните полиња се пополнети
                
                    // SQL изјава за внесување на податоци
                    $sql = "INSERT INTO contact (contact_name, contact_email, contact_subject, contact_message) 
                            VALUES (:contact_name, :contact_email, :contact_subject, :contact_message)";
        
                    // Подготовка на SQL изјавата
                    $stmt = $this->db->prepare($sql);
        
                    // Извршување на SQL изјавата со внесените податоци
                    $stmt->execute([
                        ':contact_name' => $contactName,
                        ':contact_email' => $contactEmail,
                        ':contact_subject' => $contactSubject,
                        ':contact_message' => $contactMessage
                    ]);
        
                    // Порака за успех
                    echo "<p style='width: 150px; color:black;border:1px solid white;padding:20px 5px;margin-left:683px;margin-top:200px;margin-bottom:30px;background-color:silver;border-radius:8px'>Вашата порака е успешно испратена наскоро ке бидете контактирани!</p>";
                } else {
                    echo "Сите задолжителни полиња мора да бидат пополнети.";
                
            }
        } catch (PDOException $e) {
            // Обработка на грешки при поврзување или внесување
            echo "Грешка: " . $e->getMessage();
        }
        
        
        
}

   
}
?>