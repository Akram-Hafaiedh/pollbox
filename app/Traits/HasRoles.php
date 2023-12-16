<?php

namespace App\Traits;

trait HasRoles
{
    /**
     * Get the user's role.
     *
     * @return string
     */
    protected function getStoredRole(): string
    {
        return $this->role;
    }

    /**
     * Check if the user has a specific role.
     */
    public function hasRole(string $role): bool
    {
        if (is_array($role)) {
            return in_array($this->role, $role);
        }

        return $this->role === $role;
    }

    /**
     * Get the user's role.
     */
    public function getRole(): string
    {
        return $this->getStoredRole();
    }

    // ... You can add additional methods related to roles here
}
