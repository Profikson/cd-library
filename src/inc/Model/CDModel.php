<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/18/20
 * Time: 9:38 PM
 */

require_once "Model.php";

class CDModel extends Model
{


    private $link;

    function __construct( $database ) {
        parent::__construct($database);
    }

    public function processData($data)
    {

        $this->template['action'] = $data['action'];



        if ($data['httpmethod']!=null and (!isset($data['errors']) and empty($data['errors']))) {

            if ($data['action'] == "add-new-cd") {

                $newCD = $this->addNewCD($data['http-data']);

                if ($newCD) {
                    $this->addToSessionArray("notification","Your CD was added");
                    header("Location: /");

                }
            }elseif($data['action'] == "cd-detail"){


                if (isset($data['http-data']['cd-id-delete']) and $data['http-data']['cd-id-delete']!=""){
                    if ($this->db->deleteAlbum($data['http-data']['cd-id-delete'])) {


                        $this->addToSessionArray("notification", "Your album was deleted");
                        header("Location: /dashboard");
                        exit;
                    }
                }


                $this->loadCD($data);

            }
        }else{
            if (isset($data['errors']))
                $this->template['errors'] = $data['errors'];
            if (isset($data['http-data']))
                $this->template['http-data'] = $data['http-data'];
        }


    }

    private function addNewCD($data)
    {

        if (!isset($data['cd-cover'])) {
            if (isset($data['title']) && $data['title'] != "") {
                $formatTitle = str_replace(" ", "+", trim($data['title']));
                $data['cd-cover'] = $this->getImageFromAPI($data['title']);
            }
        }else{
            $data['cd-cover']="";
        }

        $newCD = $this->db->addNewCD($data['title'], $data['genre'],$data['year'],$data['price'],$data['artist'],$data['cd-cover']);

        if ( $newCD ) {
            return true;
        }else{
            $this->template['errors'][]="Failed to add new CD!";
            return false;
        }

    }

    private function getImageFromAPI($title){

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



        curl_close($ch);

        if (isset($albumCoverJSON['results'][0]['cover_image']) && substr($albumCoverJSON['results'][0]['cover_image'],-4,4)==".jpg") {
            return $albumCoverJSON['results'][0]['cover_image'];
        }else

        return false;
    }

    private function loadCD($data){
        if (isset($data['http-data']['id']) and $data['http-data']['id']>0){
            $result = $this->db->getCDByID($data['http-data']['id']);
            if ($result){
                $this->template['cd'] = $result;
            }

        }

    }


}