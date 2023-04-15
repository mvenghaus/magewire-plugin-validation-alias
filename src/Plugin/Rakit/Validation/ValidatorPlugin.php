<?php

declare(strict_types=1);

namespace MVenghaus\MagewirePluginValidationAlias\Plugin\Rakit\Validation;

use MVenghaus\MagewirePluginValidationAlias\Model\ValidationAlias;
use Rakit\Validation\Validation;
use Rakit\Validation\Validator;

class ValidatorPlugin
{
    public function __construct(
        private readonly ValidationAlias $validationAlias
    ) {
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterMake(
        Validator $subject,
        Validation $validation,
        array $inputs,
        array $rules,
        array $messages = []
    ): Validation {
        $aliases = $this->validationAlias->getAll();
        if (count($aliases) === 0) {
            return $validation;
        }

        $validation->setAliases($aliases);

        $validation->setTranslations([
            'or' => __('or'),
            'and' => __('and')
        ]);

        foreach (array_keys($rules) as $attributeName) {
            foreach ($validation->getAttribute($attributeName)->getRules() as $rule) {
                $rule->setMessage((string)__($rule->getMessage()));
            }
        }

        return $validation;
    }
}
