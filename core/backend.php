<?php

require "./database.php";
require "./query.php";

class backend {
  public function register($firstname, $lastname, $birthdate, $address, $company_name, $purpose, $host, $requires_wifi) {
    try {
      $db = new Database();
      $query = new Query();

      if ($db->getStatus()) {
        $stmt = $db->getConnection()->prepare($query->RegisterQuery());
        $stmt->execute(array($firstname, $lastname, $birthdate, $address, $company_name, $purpose, $host, $requires_wifi));
        // $res = $stmt->fetch(PDO::FETCH_ASSOC);
        // $tes = "Register resut: ". $res;
        // error_log($tes);
        // if (!$res) {
          $db->closeConnection();
          return json_encode(['status' => 201, 'message' => 'Successfully register']);
        // } else {
        //   $db->closeConnection();
        //   return json_encode(['status' => 403]);
        // }
      } else {
        return json_encode(['status' => 403]);
      }
    } catch (PDOException $th) {
      return json_encode(['status' => 500, 'message' => $th->getMessage()]);
    }
  }
}


?>
