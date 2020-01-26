<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/18/20
 * Time: 9:38 PM
 */

require_once "Model.php";

class AjaxModel
{

    /**
     * @var Database
     */
    private $db;


    function __construct( $database ) {
        $this->db = $database;
    }

    public function processAjax(){

        if (isset($_POST['custom'])) {
            if ($_POST['custom'] == "getCDData") {
                $this->processCDCalls();
            }else if ($_POST['custom'] == "addRating") {
                $this->processDashboardCalls();
            }

        }
        return false;


    }

    private function processCDCalls(){

        if (isset($_POST['custom'])){

            if ($_POST['custom']=="getCDData"){

                if (isset($_POST['title']) and $_POST['title']!="")
                    echo json_encode($this->getDataFromAPI($_POST['title']));

            }

        }
    }


    private function getDataFromAPI($title){

        $ch = curl_init("https://api.discogs.com/database/search?q=".$title."&key=RShlXmjyFvVjYUgORumm&secret=gVGryxLbSuWTkmZvnbWrQZVgnCWtJeOU");

        curl_setopt($ch, CURLOPT_USERAGENT,'cd.realroman.com');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if (curl_error($ch)) {
            echo curl_error($ch);
            return;
        } else {
            $result = curl_exec($ch);
            $albumCoverJSON = json_decode($result,true);
        }

        $arr = array();
        curl_close($ch);

        //TODO if searched for artist, it needs to go through the list and find the first release

        if (isset($albumCoverJSON['results'][0]['cover_image']) && substr($albumCoverJSON['results'][0]['cover_image'],-4,4)==".jpg") {
            $arr['image_link']=$albumCoverJSON['results'][0]['cover_image'];
        }

        if (isset($albumCoverJSON['results'][0]['title']) && strlen($albumCoverJSON['results'][0]['title'])>3) {
            $artist=explode(" - ",$albumCoverJSON['results'][0]['title']);
            $arr['artist']=$artist[0];
        }

        if (isset($albumCoverJSON['results'][0]['genre'][0]) && strlen($albumCoverJSON['results'][0]['genre'][0])>3) {
            $arr['genre']=$albumCoverJSON['results'][0]['genre'][0];
        }

        if (isset($albumCoverJSON['results'][0]['year']) && strlen($albumCoverJSON['results'][0]['year']>3)) {
            $arr['year']=$albumCoverJSON['results'][0]['year'];
        }


        if (!empty($arr))
            return $arr;
        return false;
    }

    private function processDashboardCalls(){
        if($_POST['custom']=="addRating"){
            if ((isset($_POST['cd_id']) and $_POST['cd_id']!="") and (isset($_POST['star']) and $_POST['star']!="")) {

                $this->db->addRating($_POST['cd_id'], $_POST['star']);

                echo json_encode($this->db->getCurrentRating($_POST['cd_id']));
            }
        }
    }


}