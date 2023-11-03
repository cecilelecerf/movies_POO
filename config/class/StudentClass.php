<?php
class Student extends Database
{
    protected $id;
    protected $created_at;
    protected $modified_at;
    protected $firstname;
    protected $lastname;
    protected $birthday;
    protected $major;
    protected $promo_id;

    public function __construct($student)
    {
        parent::__construct();
        if (is_array($student)) {
            $this->hydrate($student);
        } else {
            $i = (int) $student;
            $req = $this->prepare("SELECT * FROM students WHERE id=:id");
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
    public function setFirstname($n)
    {
        $n = trim($n);
        if (!empty($n))
            $this->firstname = ucfirst(strtolower($n));
    }
    public function setLastname($n)
    {
        $n = trim($n);
        if (!empty($n))
            $this->lastname = ucfirst(strtolower($n));
    }
    public function setBirthday($n)
    {
        $this->birthday = date($n);
    }
    public function setMajor($n)
    {
        $n = trim($n);
        if (!empty($n))
            $this->major = ucfirst(strtolower($n));
    }

    public function setPromo_id($n)
    {
        if (!empty($n))
            $this->promo_id = (int) $n;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getCreated_at()
    {
        return $this->created_at->format("d/m/Y h:i:s");
    }
    public function getModified_at()
    {
        return $this->modified_at->format("d/m/Y h:i:s");
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getMajor()
    {
        return $this->major;
    }


    public function getPromo_id()
    {
        return $this->promo_id;
    }

    public  function getPromo()
    {
        if (!empty($this->promo_id))
            return new Group($this->promo_id);
        else
            return null;
    }

    public function getName()
    {
        return $this->lastname . " " . $this->firstname;
    }

    public function __toString()
    {
        return "Le group a pour nom" . $this->getFirstname();
    }

    public static function all()
    {
        $db = new Database;
        $req = $db->prepare("SELECT * FROM students");
        $req->execute();
        $tabResult = [];
        $r = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($r as $value) {
            $tabResult[] = new Student($value);
        }
        return $tabResult;
    }

    public function isValid()
    {
        $isValid = true;
        if (empty($this->firstname)) {
            $isValid = false;
            flash_in("danger", "Le prénom est obligatoire");
        }
        if (strlen($this->firstname) > 40) {
            $isValid = false;
            flash_in("danger", "Le prénom doit être inférieur à 40 caractères");
        }
        if (empty($this->lastname)) {
            $isValid = false;
            flash_in("danger", "Le nom de famille est obligatoire");
        }
        if (strlen($this->lastname) > 40) {
            $isValid = false;
            flash_in("danger", "Le nom de famille doit être inférieur à 40 caractères");
        }
        if (empty($this->birthday)) {
            $isValid = false;
            flash_in("danger", "La date est obligatoire");
        }
        if (strlen($this->major) > 40) {
            $isValid = false;
            flash_in("danger", "La spécialité doit être inférieur à 40 caractères");
        }

        return $isValid;
    }


    public function save()
    {
        $param = [
            ":f" => $this->getFirstname(),
            ":l" => $this->getLastname(),
            ":b" => $this->birthday,
            ":m" => $this->getMajor(),
        ];
        if (empty($this->id)) {
            $req = $this->prepare("INSERT INTO students (firstname, lastname, birthday, major) VALUES (:f, :l, :b, :m)");
        } else {
            $req = $this->prepare("UPDATE students SET firstname = :f, lastname = :n,  birthday = :b, major = :m WHERE id=:id");
            $param[":id"] = $this->getId();
        }
        $req->execute($param);
    }

    public function delete()
    {
        $req = $this->prepare("DELETE FROM students WHERE id=:id");
        $req->execute(["id" => $this->getId()]);
    }
}
