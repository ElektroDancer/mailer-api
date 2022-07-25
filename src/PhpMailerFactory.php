<?php

declare(strict_types=1);

namespace elektrodancer\mailer_api;

use PHPMailer\PHPMailer\PHPMailer;

class PhpMailerFactory
{
    private PHPMailer $phpMailer;

    private Configuration $configuration;

    public function __construct(PHPMailer $phpMailer, Configuration $configuration)
    {
        $this->phpMailer = $phpMailer;
        $this->configuration = $configuration;
    }

    public function create(): PHPMailer
    {
        $this->phpMailer->isSMTP();
        $this->phpMailer->SMTPAuth = true;
        $this->phpMailer->Host = $this->configuration->getHost()->asString();
        $this->phpMailer->Port = $this->configuration->getPort()->asInt();
        $this->phpMailer->Username = $this->configuration->getUsername()->asString();
        $this->phpMailer->Password = $this->configuration->getPassword()->asString();
        $this->phpMailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //$this->phpMailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        $this->phpMailer->CharSet = PHPMailer::CHARSET_UTF8;
        $this->phpMailer->Encoding = PHPMailer::ENCODING_BASE64;

        $this->phpMailer->setFrom('berichtsheft@flyeralarm.com', 'Berichtsheft');
        $this->phpMailer->addReplyTo('berichtsheft@flyeralarm.com', 'Berichtsheft');

        $this->phpMailer->isHTML();

        return $this->phpMailer;
    }
}
