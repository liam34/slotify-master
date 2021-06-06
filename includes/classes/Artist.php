<?php

class Artist {

    private $con;
    private $id;    

    public function __construct($con, $id) {
        $this->con = $con;
        $this->id = $id;
    }
    
    // Return artist name
    public function getName() {
        // Fetch artist details, (changes*)$artist = mysqli_fetch_assoc($artistQuery);
        $artistQuery = mysqli_query($this->con, "SELECT name FROM artists WHERE id='$this->id'");
        $artist = mysqli_fetch_array($artistQuery);
        return $artist['name'];
    }
}
  
?>
