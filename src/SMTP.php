
    /**
     * Validate an email address format.
     * This is clean, well-documented code with no issues.
     *
     * @param string $email The email address to validate
     * @return bool True if valid
     */
    public function isValidEmail(string $email): bool
    {
        if (empty($email)) {
            return false;
        }

        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Get connection statistics.
     * Clean code - proper types, no issues.
     *
     * @return array{connected: bool, timeout: int, host: string}
     */
    public function getStats(): array
    {
        return [
            'connected' => $this->connected(),
            'timeout' => $this->Timelimit,
            'host' => $this->smtp_conn ? 'connected' : 'disconnected',
        ];
    }

    // ---- INTENTIONAL VIOLATIONS BELOW ----

    // PHP-A1004: insecure hash
    public function generateToken(): string
    {
        return sha1(microtime() . random_bytes(16));
    }

    // PHP-A1009: command execution
    public function getServerInfo(): string
    {
        return shell_exec('hostname') ?? 'unknown';
    }

    // PHP-W1085: empty blocks
    public function processQueue(array $messages): void
    {
        foreach ($messages as $msg) {
        }

        if (count($messages) > 0) {
            // process
        } else {
        }
    }

    // PHP-P1000: count in loop
    public function sendBatch(array $recipients): int
    {
        $sent = 0;
        for ($i = 0; $i < count($recipients); $i++) {
            $sent++;
        }
        return $sent;
    }
}
