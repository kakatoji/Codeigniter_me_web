<?php

namespace App\Models;
use CodeIgniter\Model;
class OrangModel extends Model
{
  protected $table = "orang";
  protected $useTimestamps = true;
  protected $allowedFields = ["nama", "alamat"];

  public function search($keyword)
  {
    $builder = $this->table("orang");
    $builder->like("nama", $keyword);
    $builder->orlike("alamat", $keyword);
    return $builder;
  }
}
