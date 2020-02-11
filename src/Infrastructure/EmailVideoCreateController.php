<?php

namespace App\Infrastructure;

use App\Application\VideoCreate;
use App\Application\Adapters\EmailOutputRepository;

final class EmailVideoCreateController
{
    private $to;
    private $subject;

    function __construct(String $to, String $subject)
    {
        $this->to = $to;
        $this->subject = $subject;
    }

    function __invoke($id, $title)
    {
        $output = new EmailOutputRepository($this->to, $this->subject);

        $videoCreate = new VideoCreate($output);
        $videoCreate($id, $title);
    }
}