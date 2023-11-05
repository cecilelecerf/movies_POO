<?php
class Movie extends Database
{
    protected $id;
    protected $createdAt;
    protected $modifiedAt;
    protected $title;
    protected $imdb;
    protected $gender_id;

    public function __construct($movies)
    {
        parent::__construct();
        if (is_array($movies)) {
            $this->hydrate($movies);
        } else {
            $i = (int) $movies;
            $req = $this->prepare("SELECT * FROM movies WHERE id=:id");
            $req->execute([
                ":id" => $i
            ]);
            if ($req->rowCount() > 0) {
                $d = $req->fetch(PDO::FETCH_ASSOC);
                $this->hydrate($d);
            }
        }
    }

    // setter
    public function setId($n)
    {
        if ((int)$n > 0)
            $this->id = (int)$n;
    }
    public function setCreatedAt($n)
    {
        if (!empty($n))
            $this->createdAt = new DateTime($n);
    }
    public function setModifiedAt($n)
    {
        if (!empty($n))
            $this->modifiedAt = new DateTime($n);
    }
    public function setTitle($n)
    {
        $n = trim($n);
        if (!empty($n))
            $this->title = ucfirst(strtolower($n));
    }
    public function setImdb($n)
    {
        $n = trim($n);
        if (!empty($n))
            $this->imdb = (string) $n;
    }

    public function setGender_id($n)
    {
        if (!empty($n))
            $this->gender_id = (int) $n;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getCreatedAt()
    {
        return $this->createdAt->format("d/m/Y h:i:s");
    }
    public function getModifiedAt()
    {
        return $this->modifiedAt->format("d/m/Y h:i:s");
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getImdb()
    {
        return $this->imdb;
    }


    public function getGender_id()
    {
        return $this->gender_id;
    }

    public  function getGender()
    {
        if (!empty($this->gender_id))
            return new Gender($this->gender_id);
        else
            return null;
    }

    public function __toString()
    {
        return "Le group a pour nom" . $this->getTitle();
    }

    public static function all()
    {
        $db = new Database;
        $req = $db->prepare("SELECT * FROM movies");
        $req->execute();
        $tabResult = [];
        $r = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($r as $value) {
            $tabResult[] = new Movie($value);
        }
        return $tabResult;
    }
    public static function allCondition($id)
    {
        $db = new Database;
        $req = $db->prepare("SELECT * FROM movies WHERE gender_id=:id");
        $req->execute([":id" => $id]);
        $tabResult = [];
        $r = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($r as $value) {
            $tabResult[] = new Movie($value);
        }
        return $tabResult;
    }

    public function isValid()
    {
        $isValid = true;
        if (empty($this->title)) {
            $isValid = false;
            flash_in("danger", "Le titre est obligatoire");
        }
        if (strlen($this->title) > 150) {
            $isValid = false;
            flash_in("danger", "Le prénom doit être inférieur à 150 caractères");
        }
        if (empty($this->imdb)) {
            $isValid = false;
            flash_in("danger", "L'imdb est obligatoire");
        }
        if (strlen($this->imdb) > 20) {
            $isValid = false;
            flash_in("danger", "Le nom de famille doit être inférieur à 20 caractères");
        }

        return $isValid;
    }


    public function save()
    {
        $param = [
            ":t" => $this->getTitle(),
            ":i" => $this->getImdb(),
            ":g" => $this->getGender_id(),
        ];
        if (empty($this->id)) {
            $req = $this->prepare("INSERT INTO movies (title, imdb, gender_id) VALUES (:t, :i, :g)");
        } else {
            $req = $this->prepare("UPDATE movies SET title = :t, imdb = :i WHERE id=:id");
            $param[":id"] = $this->getId();
        }
        $req->execute($param);
    }

    public function delete()
    {
        $req = $this->prepare("DELETE FROM movies WHERE id=:id");
        $req->execute(["id" => $this->getId()]);
    }
}
