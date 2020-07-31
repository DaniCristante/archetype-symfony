<?php

namespace App\ViewModel;

class PageViewModel implements PageViewModelInterface
{
    protected $content;

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }
}
