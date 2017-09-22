<?php
namespace Katapoka\Kow\App\Models;

/**
 * @Entity
 * @Table(name="users")
 */
class User
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    public $id;
    /** @Column(type="string") */
    public $name;
}
