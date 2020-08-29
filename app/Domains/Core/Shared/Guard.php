<?php

namespace App\Domains\Core\Shared;

class Guard {
    private $argument;
    private string $argumentName;

    public function __construct(string $argumentName, $argument)
    {
        $this->argument = $argument;
        $this->argumentName = $argumentName;
    }

    public function againstNull(): self
    {
        if(is_null($this->argument)) {
            throw new \InvalidArgumentException('O argumento ' . $this->argumentName . ' está sem valor.');
        }
        return $this;
    }

    public function againstEmpty(): self
    {
        if(empty($argument)) {
            throw new \InvalidArgumentException('O argumento ' . $this->argumentName . ' está vazio.');
        }
        return $this;
    }

    public function againstGreaterThan($maxValue): self
    {
        (new Guard("valor máximo", $maxValue))->againstNonNumeric();

        if($this->argument > $maxValue)
        {
            throw new \InvalidArgumentException(
                "O Argumento \"$this->argumentName\" (valor: $this->argument) é > $maxValue (valor máximo permitido)");
        }

        return $this;
    }

    public function againstGreaterThanOrEqual($maxValue): self
    {
        (new Guard("valor máximo", $maxValue))->againstNonNumeric();

        if($this->argument > $maxValue)
        {
            throw new \InvalidArgumentException(
                "O Argumento \"$this->argumentName\" (valor: $this->argument) é >= $maxValue (valor máximo permitido)");
        }

        return $this;
    }

    public function againstLessThan($minValue): self
    {
        (new Guard("valor mínimo", $minValue))->againstNonNumeric();

        if($this->argument > $minValue)
        {
            throw new \InvalidArgumentException(
                "O Argumento \"$this->argumentName\" (valor: $this->argument) é < $minValue (valor máximo permitido)");
        }

        return $this;
    }

    public function againstNonNumeric() {
        if(is_numeric($this->argument) === false) {
            throw new \InvalidArgumentException("O argumento \"$this->argumentName\" não é um número.");
        }
    }

    public function againstNonInteger() {
        if(is_integer($this->argument) === false) {
            throw new \InvalidArgumentException("O argumento \"$this->argumentName\" não é um número inteiro.");
        }
    }

    public function againstLessThanOrEqual($minValue): self
    {
        (new Guard("valor mínimo", $minValue))->againstNonNumeric();

        if($this->argument > $minValue)
        {
            throw new \InvalidArgumentException(
                "O argumento \"$this->argumentName\" (valor: $this->argument) é <= $minValue (valor máximo permitido)");
        }

        return $this;
    }

    public function againtNonString(): self
    {
        if(is_string($this->argument) === false) {
            throw new \InvalidArgumentException("O argumento \"$this->argumentName\" não é um texto.");
        }
        return $this;
    }

    public function againstShortString(int $minLength): self
    {
        $this->againtNonString();

        $argumentLength = strlen($this->argument);

        if( $argumentLength < $minLength)
        {
            throw new \InvalidArgumentException(
                "Texto muito curto. O argumento \"$this->argumentName\" ($argumentLength caracteres) deve ter no mínimo $minLength caracteres.");
        }

        return $this;
    }

    public function againstLongString(int $maxLength): self
    {
        $this->againtNonString();

        $argumentLength = strlen($this->argument);

        if( $argumentLength > $maxLength)
        {
            throw new \InvalidArgumentException(
                "Texto muito longo. O argumento \"$this->argumentName\" ($argumentLength caracteres) deve ter no máximo $maxLength caracteres.");
        }

        return $this;
    }

}