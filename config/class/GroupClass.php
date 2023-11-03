<?php
class Group extends Database
{
    protected $id;
    protected $created_at;
    protected $modified_at;
    protected $title;

    public function __construct($group)
    {
        parent::__construct();
        if (is_array($group)) {
            // $this->setId($group["id"]);
            // $this->setCreatedAt($group["created_at"]);
            // $this->setModifiedAt($group["modified_at"]);
            // $this->setTitle($group["title"]);
            $this->hydrate($group);
        } else {
            $i = (int) $group;
            $req = $this->prepare("SELECT * FROM promos WHERE id=:id");
            $req->execute([
                ":id" => $i
            ]);
            if ($req->rowCount() > 0) {
                $d = $req->fetch(PDO::FETCH_ASSOC);
                // $this->setId($d["id"]);
                // $this->setCreatedAt($d["created_at"]);
                // $this->setModifiedAt($d["modified_at"]);
                // $this->setTitle($d["title"]);
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
    public function setCreated_at($n)
    {
        if (!empty($n))
            $this->created_at = new DateTime($n);
    }
    public function setModified_at($n)
    {
        if (!empty($n))
            $this->modified_at = new DateTime($n);
    }
    public function setTitle($n)
    {
        $n = trim($n);
        if (!empty($n))
            $this->title = ucfirst(strtolower($n));
    }

    public function getId()
    {
        return $this->id;
    }
    public function getCreated_at()
    {
        // if (!empty($this->created_at))
        return $this->created_at->format("d/m/Y h:i:s");
    }
    public function getModified_at()
    {
        if (!empty($this->modified_at))
            return $this->modified_at->format("d/m/Y h:i:s");
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function __toString()
    {
        return "Le group a pour nom" . $this->getTitle();
    }

    public static function all()
    {
        $db = new Database;
        $req = $db->prepare("SELECT * FROM promos");
        $req->execute();
        $tabResult = [];
        $r = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($r as $value) {
            $tabResult[] = new Group($value);
        }
        return $tabResult;
    }

    public function isValid()
    {
        $isValid = true;
        if (empty($this->title)) {
            $isValid = false;
            flash_in("error", "Le titre est obligatoire");
        }
        if (strlen($this->title) > 50) {
            $isValid = false;
            flash_in("error", "Le titre doit être inférieur à 100 caractères");
        }
        return $isValid;
    }


    public function save()
    {
        $param = [
            ":t" => $this->getTitle(),
        ];
        if (empty($this->id)) {
            $req = $this->prepare("INSERT INTO promos (title) VALUES (:t)");
        } else {
            $req = $this->prepare("UPDATE promos SET title = :t WHERE id=:id");
            $param[":id"] = $this->getId();
        }
        $req->execute($param);
    }
}
