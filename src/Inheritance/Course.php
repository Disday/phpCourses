<?php

namespace App\Inheritance;

require __DIR__ . '/../../vendor/autoload.php';

class Course
{
    use Enumerable;

    private $lessons;

    public function __construct($lessons)
    {
        $this->lessons = $lessons;
    }

    public function getIterator(): iterable
    {
        // Для простоты возвращает массив, вместо итератора
        return $this->lessons;
    }
}
$lessons = [
    // Второй параметр это продолжительность урока в минутах
    // new Lesson('react start', 3),
    // new Lesson('react component', 9),
    // new Lesson('react lifecycle', 112),
    // new Lesson('redux', 14),
];

// use Enumerable;
$course = new Course($lessons);
$lesson = $course->maxBy(function ($l1, $l2) {
    return $l1->getDuration() <=> $l2->getDuration();
});
var_dump($lesson);
