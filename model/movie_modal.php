<?php
    class movie{
        public $id;
        public $link;
        public $id_anime;
        function __construct($id,$link,$id_anime)
        {
            $this->id=$id;
            $this->link = $link;
            $this->id_anime = $id_anime;
        }
        public function getInsert(){
            $conn  = new mySql(null,null,null,null);
            $conned = $conn ->getConnect();
            try {
                $sql = "INSERT INTO movie (link,id_anime) VALUES (?,?)";
                $stmt= $conned->prepare($sql);
                $stmt->execute([$this->link, $this->id_anime]);
                echo 'insert successfully !!';
            } catch (Throwable $th) {
                echo $th;
            }
           // $conn->disConnect($conned);
        }
        public function getMovie(){
            $conn  = new mySql(null,null,null,null);
            $conned = $conn ->getConnect();
            try {
                $stmt = $conned->prepare("SELECT * FROM movie WHERE id=?");
                $stmt->execute([$this->id]); 
                $anime = $stmt->fetch();
                return $anime;
                echo 'get anime successfully !!';
            } catch (Throwable $th) {
                echo ' fail !!';
            }

           // $conn->disConnect($conned);
        }
        public function getAllAnime(){
            $conn  = new mySql(null,null,null,null);
            $conned = $conn ->getConnect();
            try {
                $stmt = $conned->query("SELECT * FROM movie");
                $user = $stmt->fetchAll();
                return $user;
                echo 'get user successfully !!';
            } catch (Throwable $th) {
                echo ' fail !!';
            }
           // $conn->disConnect($conned);
        }
        public function getListMovieByAnimeId(){
            $conn  = new mySql(null,null,null,null);
            $conned = $conn ->getConnect();
            try {
                $stmt = $conned->prepare("SELECT * FROM movie WHERE id_anime=?");
                $stmt->execute([$this->id_anime]); 
                $anime = $stmt->fetchAll();
                return $anime;
                echo 'get anime successfully !!';
            } catch (Throwable $th) {
                echo ' fail !!';
            }
        }
    }
?>