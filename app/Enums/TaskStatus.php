<?php

namespace App\Enums;

enum TaskStatus: string
{
    case TODO = 'todo';
    case DOING = 'doing';
    case DONE = 'done';

    public function label(): string
    {
        return match($this) {
            self::TODO => '未着手',
            self::DOING => '進行中',
            self::DONE => '完了',
        };
    }
}