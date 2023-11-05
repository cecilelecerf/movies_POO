<?php
class Gender extends Database
{
    protected $id;
    protected $createdAt;
    protected $modifiedAt;
    protected $name;

    public function __construct($gender)
    {
        parent::__construct();
        if (is_array($gender)) {
            $this->hydrate($gender);
        } else {
            $i = (int) $gender;
            $req = $this->prepare("SELECT * FROM genders WHERE id=:id");
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
    public function setName($n)
    {
        $n = trim($n);
        if (!empty($n))
            $this->name = ucfirst(strtolower($n));
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
    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return "Le gender a pour nom" . $this->getName();
    }

    public static function all()
    {
        $db = new Database;
        $req = $db->prepare("SELECT * FROM genders");
        $req->execute();
        $tabResult = [];
        $r = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($r as $value) {
            $tabResult[] = new Gender($value);
        }
        return $tabResult;
    }

    public function isValid()
    {
        $isValid = true;
        if (empty($this->name)) {
            $isValid = false;
            flash_in("danger", "Le nom du genre est obligatoire");
        }
        if (strlen($this->name) > 150) {
            $isValid = false;
            flash_in("danger", "Le nom du genre doit être inférieur à 150 caractères");
        }
        return $isValid;
    }


    public function save()
    {
        $param = [
            ":n" => $this->getName(),
        ];
        if (empty($this->id)) {
            $req = $this->prepare("INSERT INTO genders (name) VALUES (:n)");
        } else {
            $req = $this->prepare("UPDATE genders SET name = :n WHERE id=:id");
            $param[":id"] = $this->getId();
        }
        $req->execute($param);
    }
}
