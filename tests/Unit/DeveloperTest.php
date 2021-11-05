<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Developer;

class DeveloperTest extends TestCase
{
    /** @test  */
    public function check_if_user_column_is_correct()
    {
        $developer = new Developer;
        $expected =[
            'nome',
            'idade',
            'hobby',
            'sexo',
            'datanascimento'
        ];

        $arrayCompared = array_diff($expected, $developer->getFillable());
        $this->assertEquals(0, count($arrayCompared));
    }
}
