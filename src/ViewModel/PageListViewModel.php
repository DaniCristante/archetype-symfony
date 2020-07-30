<?php

namespace App\ViewModel;

use Knp\Component\Pager\Pagination\PaginationInterface;

class PageListViewModel
{
    protected $pagination;
    protected $paginationData;

    public function getPagination(): ?PaginationInterface
    {
        return $this->pagination;
    }

    public function setPagination(PaginationInterface $pagination): self
    {
        $this->pagination = $pagination;
        $this->paginationData = $pagination->getPaginationData();

        return $this;
    }
    
    public function getPaginationData(string $data): ?int
    {
        return $this->paginationData[$data] ?? null;
    }

    public function getNextPage(): ?int
    {
        return $this->getPaginationData('next');
    }

    public function getPreviousPage(): ?int
    {
        return $this->getPaginationData('previous');
    }
}