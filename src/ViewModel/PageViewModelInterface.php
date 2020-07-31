<?php

namespace App\ViewModel;

interface PageViewModelInterface
{
    public function setContent($content): void;

    public function getContent();
}
