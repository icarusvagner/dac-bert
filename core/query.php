<?php

class Query {
  public function RegisterQuery() {
    return "insert into users_info (firstname, lastname, birthdate, address, compony_name, purpose, host, wifi) values (?,?,?,?,?,?,?,?)";
  }
}

?>
