<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 9/11/19
 * Time: 12:00 AM
 */


require_once "config/AppSettings.php";

class Database extends AppSettings
{

    private $server;
    private $db;
    private $user;
    private $password;

    private $con;

    function __construct(  ) {
        $this->init();

        $this->con = mysqli_connect($this->server,$this->user,$this->password,$this->db);

// Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    function init(){
        $appSetup = new AppSettings();
        $this->server = $appSetup->db_server;
        $this->db =$appSetup->db_name;
        $this->user =$appSetup->db_user;
        $this->password = $appSetup->db_password;
        $appSetup=null;

    }

    /**
     * @param $title
     * @param string $genre
     * @param int $year
     * @param int $price
     * @param string $artist
     * @param string $picture_link
     * @return bool|mixed
     */
    public function addNewCD($title,$genre="no category",$year=2020,$price=0,$artist="",$picture_link=""){

//        $query = $this->con->prepare("INSERT INTO cd(title,genre,year,price,artist_id,picture_link) VALUES (?,?,?,?,?,?)");
        $query = $this->con->prepare("INSERT INTO cd(title,genre,year,price,artist,picture_link) VALUES (?,?,?,?,?,?)");
//        INSERT INTO cd(title,genre,year,price,artist_id,picture_link) VALUES ("Album","Rock",1888,500,1,"sdfsd")

//        $query->bind_param("ssiiis", $title, $genre, $year, $price, $artist_id,$picture_link);
        $query->bind_param("ssiiss", $title, $genre, $year, $price, $artist,$picture_link);

        if ($query->execute()){
            return $this->con->insert_id;}
        else
            return false;

    }

    /**
     * @return array|bool
     */
    public function getArtists(){
        $query = $this->con->prepare("SELECT * FROM artist");

        /* execute query */
        $query->execute();

        $result = $query->get_result();
        if($result->num_rows === 0)
            return false;
        else {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    /**
     * @param string $orderBY
     * @param string $sortDirection
     * @return array|bool
     */
    public function getCDs($orderBY = "id", $sortDirection = "ASC"){
        $selectOptions = array("id","title","genre","year","price","picture_link","artist","ASC","DESC");

//        $sqlText = "SELECT * FROM cd JOIN artist ON cd.artist_id = artist.id";
        $sqlText = "SELECT cd.id as id, title, genre, year, price, picture_link, avg(stars) as rating, artist FROM cd LEFT JOIN rating on cd.id = rating.cd_id GROUP BY cd.id";
        if (in_array($orderBY,$selectOptions)){
            $sqlText.= " ".$orderBY;
            if (in_array($sortDirection,$selectOptions)){
                $sqlText.= " ".$sortDirection;
            }
        }


        $result = $this->con->query($sqlText);

        if($result->num_rows === 0)
            return false;
        else {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;

    }

    public function getCDByID($id){

        $query = $this->con->prepare("SELECT cd.id as id, title, price, avg(stars) as rating, genre, artist, picture_link, year FROM cd LEFT JOIN rating ON cd.id=rating.cd_id WHERE cd.id=? GROUP BY cd.id");
        /* bind parameters for markers */


        $query->bind_param("i", $id);

        /* execute query */
        $query->execute();

        $result = $query->get_result();
        if($result->num_rows === 0)
            return false;
        else
            return $result->fetch_assoc();

    }

    public function addRating($cd_id, $star){
        $query = $this->con->prepare("INSERT INTO rating(stars,cd_id) VALUES (?,?)");
        /* bind parameters for markers */
        $query->bind_param("ii", $star,$cd_id);

        if ($query->execute()){
            return $this->con->insert_id;}
        else
            return false;

    }

    public function getCurrentRating($cd_id){

        $query = $this->con->prepare("SELECT avg (stars) as stars FROM rating WHERE cd_id=?");
        /* bind parameters for markers */

        $query->bind_param("i", $cd_id);

        /* execute query */
        $query->execute();

        $result = $query->get_result();
        if($result->num_rows === 0)
            return false;
        else
            return $result->fetch_assoc();
    }

    public function deleteAlbum($id){
        $query = $this->con->prepare("DELETE FROM rating WHERE cd_id=?");

        /* bind parameters for markers */
        $query->bind_param("i", $id);

        if ($query->execute()){
            $query = $this->con->prepare("DELETE FROM cd WHERE id=?");
            $query->bind_param("i", $id);
            if ($query->execute())
                return true;
        }else
            $query = $this->con->prepare("DELETE FROM cd WHERE id=?");
        $query->bind_param("i", $id);
        if ($query->execute())
            return true;

            return false;

    }


}