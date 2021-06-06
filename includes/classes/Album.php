<?php

class Album {

    private $con;
    private $id;
    private $title;
    private $artistId;
    private $genre;
    private $artworkPath;

    public function __construct($con, $id) {
        $this->con = $con;
        $this->id = $id;
        
        // Fetch album details
        $query = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");
        $album = mysqli_fetch_array($query);


        //---Fixed!!--->>>---Warning: Undefined array key "artist" in C:\xampp\htdocs\ncludes\-----<<<---fix!!!
        $this->title = $album['title'] ??"";
        $this->artistId = $album['artist'] ??"";
        $this->genre = $album['genre'] ??"";
        $this->artworkPath = $album['artworkPath'] ??"";

    }
    
    
    public function getTitle() {
        return $this->title;        
    }

    
    public function getArtist() {
        return new Artist($this->con, $this->artistId);
    }

    public function getGenre() {
        return $this->genre;        
    }

    public function getArtWorkPath() {
        return $this->artworkPath;
    }

    public function getNumberOfSongs() {

        $query = mysqli_query($this->con, "SELECT COUNT(*) AS total FROM songs WHERE album='$this->id'");
        $result = mysqli_fetch_assoc($query);
        return $result['total'];      
    }

    public function getSongIds() {
        // Fetch song details
        $query = mysqli_query($this->con, "SELECT id FROM songs WHERE album ='$this->id' ORDER BY albumOrder ASC");
       
        $array = array();

        while($row = mysqli_fetch_assoc($query)) {
             array_push($array, $row['id']);
        }

        return $array;
    }
}
  
?>
