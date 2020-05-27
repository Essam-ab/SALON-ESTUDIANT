<?php
class Videotheque extends database
{
    public function __construct()
    {
        //
    }
    public function getVideotheque($id)
    {
        $query = $this->connect()->prepare(
            "SELECT *
            FROM videotheque
            where sta_id = ? and vie_type=?;"
        );
        $query->execute([$id, 'path']);
        return $query;
    }

    public function getYoutubeUrls($id)
    {
        $query = $this->connect()->prepare(
            "SELECT *
            FROM videotheque
            where sta_id = ? and vie_type=?;"
        );
        $query->execute([$id, 'url']);
        return $query;
    }

    public function getLiveStream($id)
    {
        $query = $this->connect()->prepare(
            "SELECT *
            FROM live_stream
            where sta_id = ?;"
        );
        $query->execute([$id]);
        return $query;
    }

    public function getAllVideotheque($type)
    {
        $query = $this->connect()->prepare(
            "SELECT *
            FROM videotheque
            WHERE vie_type = ?"
        );
        $query->execute([$type]);
        return $query;
    }

    public function getAllPaths($type)
    {
        $query = $this->connect()->prepare(
            "SELECT *
            FROM videotheque
            WHERE vie_type = ?;"
        );
        $query->execute([$type]);
        return $query;
    }

    public function updateVideotheque($art_lib, $art_desc, $art_brefDesc, $art_ref, $isActive, $art_id)
    {
        $query = $this->connect()->prepare(
            "UPDATE videotheque
            SET art_lib = ?, art_desc = ?, art_brefDesc = ?, art_ref = ?, art_active = ?
            WHERE art_id = ?;"
        );
        $query->execute([$art_lib, $art_desc, $art_brefDesc, $art_ref, $isActive, $art_id]);
        return $query;
    }

    public function addVideotheque(
        $Videotheque_name,
        $path,
        $stand
    ) {
        $query = $this->connect()->prepare(
            "INSERT INTO videotheque
            (vie_nom, vie_video, sta_id) 
            VALUES (?, ?, ?);"
        );

        $query->execute([
            $Videotheque_name,
            $path,
            $stand
        ]);
        return $query;
    }

    public function getLastAddedVideotheque()
    {
        $query = $this->connect()->prepare(
            "SELECT *
            FROM videotheque
            ORDER BY vie_id desc
            LIMIT 1;"
        );
        $query->execute();
        return $query;
    }

    public function updateVideothequeVideo($id, $video)
    {
        $query = $this->connect()->prepare(
            "UPDATE videotheque
            SET vie_video=?
            WHERE vie_id = ?;"
        );
        $query->execute([$video, $id]);
        return $query;
    }



    //type url youtube video handling
    public function addNewVideothequeUrl($name, $url, $stand)
    {
        $query = $this->connect()->prepare(
            "INSERT INTO videotheque
            (vie_nom, vie_video, vie_type, sta_id) 
            VALUES (?, ?, ?, ?);"
        );

        $query->execute([
            $name,
            $url,
            'url',
            $stand
        ]);
        return $query;
    }

    public function addNewVideoStream($name, $url, $stand)
    {
        $query = $this->connect()->prepare(
            "INSERT INTO live_stream
            (live_nom, live_video, sta_id) 
            VALUES (?, ?, ?);"
        );

        $query->execute([
            $name,
            $url,
            $stand
        ]);
        return $query;
    }
}
