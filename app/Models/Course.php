<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;

/**
 * Class Course
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder create(array $attributes = [])
 * @method public Builder update(array $values)
 * @package App\Models
 */
class Course extends Model
{
    use HasFactory;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'accessibility_id' => \Constants\Accessibility::BY_LINK_ID,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'complexity_id',
        'accessibility_id',
        'author_id',
        'language_id'
    ];

    /**
     * Get the units of the course.
     * @return HasMany
     */
    public function units(): HasMany
    {
        return $this->hasMany( Unit::class );
    }
}
