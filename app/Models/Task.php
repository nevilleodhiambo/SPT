<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const PRIORITY_HIGH = 'high';
    const PRIORITY_MEDIUM = 'medium';
    const PRIORITY_LOW = 'low';

    public function getPriorityAttribute($value)
    {
        switch ($value) {
            case self::PRIORITY_HIGH:
                return 'High Priorit4';
            case self::PRIORITY_MEDIUM:
                return 'Medium Priority';
            case self::PRIORITY_LOW:
                return 'Low Priority';
            default:
                return 'Unknown Priority';
        }
    }

    const PRIORITY_COLORS = [
        'high' => '#FF6666',   // Red
        'medium' => '#FFD700', // Yellow
        'low' => '#98FB98',    // Light Green
    ];

    public function getPriorityColor()
    {
        return self::PRIORITY_COLORS[$this->priority] ?? '#FFFFFF'; // Default to white
    }
}
