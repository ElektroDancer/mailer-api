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
        $config['host'] = Host::fromString($config['host']);
        $config['username'] = Username::fromString($config['username']);
        $config['password'] = Password::fromString($config['password']);
        $config['port'] = Port::fromInt($config['host']);

        return $config;
    }

    public function getHost(): Host
    {
        return $this->config['host'];
    }

    public function getUsername(): Username
    {
        return $this->config['username'];
    }

    public function getPassword(): Password
    {
        return $this->config['password'];
    }

    public function getPort(): Port
    {
        return $this->config['port'];
    }
}
