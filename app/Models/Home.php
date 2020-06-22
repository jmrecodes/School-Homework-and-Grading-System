<?php namespace App\Models;

use CodeIgniter\Model;

class Home extends Model
{
    protected $DBGroup = 'default';

    protected $table      = 'user';
    protected $primaryKey = 'usr_id';

    protected $returnType     = 'array';

    protected $useTimestamps = false;
    protected $createdField  = 'usr_created_at';
    protected $updatedField  = 'usr_updated_at';

    private $username, $password;

    public function __construct($db, $username, $password) {
        parent::__construct($db);

        $this->username = $username;
        $this->password = $password;
    }

    public function login() {
        $user = $this->where(['usr_name' => $this->username, 'usr_pwd' => $this->password])
            ->first();
        
        return $user;
    }
}