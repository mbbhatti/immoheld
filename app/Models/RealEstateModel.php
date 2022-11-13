<?php

namespace App\Models;

use App\Entities\RealEstateEntity;
use CodeIgniter\Model;

class RealEstateModel extends Model
{
    protected $table            = 'real_estates';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = RealEstateEntity::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title',
        'image',
        'address',
        'price',
        'size'
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    /**
     * @param int $page
     *
     * @return array
     */
    public function getAll($page = 1): array
    {
        $limit = getenv('RECORD_LIMIT');
        $offset = ($page - 1) * $limit;

        return $this->db
            ->table($this->table)
            ->select('title, image, address, price, size')
            ->orderBy('id', 'DESC')
            ->get($limit, $offset)
            ->getResult();
    }
}
