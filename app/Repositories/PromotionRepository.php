<?php

namespace App\Repositories;

use App\Models\Promotion;

/**
 * Class PromotionRepository.
 */
class PromotionRepository extends BaseRepository
{
    const TYPE_AUTO = 'auto';
    const TYPE_ADD = 'add';

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Promotion::class;
    }

    public function deleteAllCodeAuto()
    {
        $query = $this->model->query();

        return $query->where('type', self::TYPE_AUTO)->delete();
    }

    public function getCodeAuto() {
        $query = $this->model->query();

        return $query->where('type', self::TYPE_AUTO)->get();
    }

    public function getCodeAdd() {
        $query = $this->model->query();

        return $query->where('type', self::TYPE_ADD)->get();
    }

    public function updateStatusCodeAuto($status) {
        $query = $this->model->query();

        return $query->update(['status' => $status]);
    }

    public function updateStatusCodeAdd($status, $id) {
        $query = $this->model->query();

        return $query->where('id', $id)->update(['status' => $status]);
    }

    public function updateStatusCodeByCode($code, $status) {
        $query = $this->model->query();

        return $query->where('promotion_code', $code)->update(['status' => $status]);
    }

    public function getPromotionByCode($code) {
        $query = $this->model->query();

        return $query->where('promotion_code', $code)->first();
    }
}
