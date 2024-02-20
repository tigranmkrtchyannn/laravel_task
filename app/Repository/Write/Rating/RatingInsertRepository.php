<?php

namespace App\Repository\Write\Rating;

use App\Models\Rating;

class RatingInsertRepository implements RatingInsertRepositoryInterface
{
 public function ratingInsert(array $data): bool
 {
     return Rating::insert($data);
 }

}
