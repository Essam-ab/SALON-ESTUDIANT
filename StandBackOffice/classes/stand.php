<?php
class Stand extends database
{
    public function __construct()
    {
        //
    }

    public function checkStandChef($username)
    {
        $query = $this->connect()->prepare(
            "SELECT *
            FROM stand_cheif
            WHERE use_username = ?;"
        );
        $query->execute([$username]);
        return $query;
    }

    public function getStand($lib)
    {
        $query = $this->connect()->prepare(
            "SELECT *
            FROM stand
            where art_lib = ?;"
        );
        $query->execute([$lib]);
        return $query;
    }
    public function getAllStand()
    {
        $query = $this->connect()->prepare(
            "SELECT *
            FROM stand"
        );
        $query->execute();
        return $query;
    }
    public function updateStand($art_lib, $art_desc, $art_brefDesc, $art_ref, $isActive, $art_id)
    {
        $query = $this->connect()->prepare(
            "UPDATE stand
            SET art_lib = ?, art_desc = ?, art_brefDesc = ?, art_ref = ?, art_active = ?
            WHERE art_id = ?;"
        );
        $query->execute([$art_lib, $art_desc, $art_brefDesc, $art_ref, $isActive, $art_id]);
        return $query;
    }

    public function addStand(
        $sta_name,
        $sta_desc,
        $sta_image,
        $sta_logo
    ) {
        $query = $this->connect()->prepare(
            "INSERT INTO stand
            (sta_nom,sta_description,sta_image,sta_logo) 
            VALUES (?,?,?,?);"
        );

        $query->execute([
            $sta_name, $sta_desc, $sta_image, $sta_logo
        ]);
        return $query;
    }


    //links between stand and its documentation
    public function addStandDocumentation($doc_name, $stand_id)
    {
        $query = $this->connect()->prepare(
            "INSERT INTO stand_documentation
            (doc_nom, sta_id)
            VALUES(?, ?);"
        );
        $query->execute([$doc_name, $stand_id]);
        return $query;
    }

    public function addNewStandChief($user, $stand_id)
    {
        $query = $this->connect()->prepare(
            "INSERT INTO stand_cheif
            (use_username, sta_id)
            VALUES(?, ?);"
        );
        $query->execute([$user, $stand_id]);
        return $query;
    }
    public function getStandChief($username)
    {
        $query = $this->connect()->prepare(
            "SELECT *
            FROM stand_cheif
            WHERE use_username = ?;"
        );
        $query->execute([$username]);
        return $query;
    }
}
