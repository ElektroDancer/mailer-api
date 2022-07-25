<?php
declare(strict_types=1);

namespace elektrodancer\mailer_api;

class Configuration
{
    private array $config;

    private function __construct(array $config)
    {
        $this->config = $config;
    }

    public static function fromArray(array $config): self
    {
        $config = self::setValueObject($config);

        return new self($config);
    }

    private static function setValueObject(array $config): array
    {
        return $config;
    }

    public function getHost(): array
    {
        return $this->config;
    }

    public function getUsername(): array
    {
        return $this->config;
    }

    public function getPassword(): array
    {
        return $this->config;
    }

    public function getPort(): array
    {
        return $this->config;
    }
}
