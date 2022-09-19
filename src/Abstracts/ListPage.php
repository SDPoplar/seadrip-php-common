<?php
namespace SeaDrip\Abstracts;

abstract class ListPage implements
    \Countable
{
    public function __construct(
        public readonly int $page,
        public readonly int $page_size,
    ) {
        assert(($page > 0) && ($page_size > 0));
    }

    final public function getTotal(): int
    {
        return $this->total;
    }

    final public function getTotalPage(): int
    {
        return $this->page_count;
    }

    public function &setTotal(int $total): static
    {
        $this->total = $total;
        $this->page_count = ceil($total / $this->page_size);
        return $this;
    }

    final public function &getAll(): array
    {
        return $this->list_data;
    }

    final public function &setList(array $data_in_list): static
    {
        $this->list_data = $data_in_list;
        return $this;
    }

    final public function count(): int
    {
        return count($this->list_data);
    }

    private int $total = 0;
    private int $page_count = 0;
    private array $list_data = [];
}
