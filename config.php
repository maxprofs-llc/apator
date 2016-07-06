        <?php
        class Connection {
          private $host="localhost";
          private $user="mietech_apa";
          private $password="6MrkviARD4";
          private $db_name="mietech_apator";
            
            function getHost(){
              return $this->host;
            }

            function setHost($host){
              $this->host=$host;
            }
            function getUser(){
              return $this->user;
            }

            function setUser($user){
              $this->user=$user;
            }
            function getPassword(){
              return $this->password;
            }

            function setPassword($password){
              $this->password=$password;
            }
            function getDbName(){
              return $this->db_name;
            }

            function setDbName($db_name){
              $this->db_name=$db_name;
            }
            function polacz(){

              $conn=mysqli_connect($this->getHost(),$this->getUser(),$this->getPassword(),$this->getDbName());
              if (mysqli_connect_errno())
              {
              echo "Nie udało się połączyć z bazą danych: " . mysqli_connect_error();
              }
              return $conn;

            // mysqli_close($conn);
            }

            function getConnection() {
              return $this->polacz();
            }

            function rozlacz(){
              mysqli_close($this->polacz());
            }
          
        }
        ?> 